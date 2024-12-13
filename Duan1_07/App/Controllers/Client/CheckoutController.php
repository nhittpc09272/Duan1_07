<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Pages\Checkouts\Checkout;
use App\vnpay_php\vnpay_pay;
use App\vnpay_php\vnpay_create_payment;
use App\vnpay_php\vnpay_return;
use App\Models\Order;
use App\Validations\OrderValidation;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Account\Order\Orders;
use App\Views\Client\Pages\Pay\Pay;

class CheckoutController
{
    // Display the products in the checkout page
    public static function checkout()
    {
        // Check if there is POST data
        if (empty($_POST)) {
            header('Location: /cart');
            NotificationHelper::error("Error", "No product data received");
            exit;
        }

        // Check if products are selected
        if (empty($_POST['check'])) {
            header('Location: /cart');
            NotificationHelper::error("Error", "Please select products");
            exit;
        }

        // Check required fields
        $requiredFields = ['id', 'name', 'price', 'quantity'];
        foreach ($requiredFields as $field) {
            if (empty($_POST[$field]) || !is_array($_POST[$field])) {
                header('Location: /cart');
                NotificationHelper::error("Error", "Invalid product data");
                exit;
            }
        }

        // Process selected products
        $data = $_POST;
        $products = [];
        $pro = [];

        foreach ($data['check'] as $check_id) {
            $index = array_search($check_id, $data['id']);

            if ($index !== false) {
                $products[] = [
                    'name' => $data['name'][$index],
                    'variant2' => $data['variant2'][$index] ?? '',
                    'variant' => $data['variant'][$index] ?? '',
                    'price' => $data['price'][$index],
                    'quantity' => $data['quantity'][$index],
                ];

                $pro[] = [
                    'name' => $data['name'][$index],
                    'product_code' => $data['id'][$index],
                    'price' => $data['price'][$index],
                    'weight' => 1,
                    'quantity' => $data['quantity'][$index],
                ];
            }
        }

        // Get address information
        $order = new Order;
        $dataAddress = $order->getAddressAll();

        // Save products to session
        $_SESSION['product'] = $pro;

        // Prepare shipping data
        $transportData = [
            "pick_province" => "TP. Hồ Chí Minh",
            "pick_district" => "Quận 1",
            "province" => $dataAddress[0]['province'],
            "district" => $dataAddress[0]['district'],
            "address" => $dataAddress[0]['address'],
            "weight" => 1000,
            "value" => 3000000,
            "transport" => "fly",
            "deliver_option" => "xteam",
            "tags" => [1, 7]
        ];

        // Call shipping API
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://services.giaohangtietkiem.vn/services/shipment/fee?" . http_build_query($transportData),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_HTTPHEADER => [
                "Token: BZwk0Qw9eflakBLJCWexEZYrq6zLMLcxMuVcQu",
            ],
        ]);

        $response = curl_exec($curl);
        curl_close($curl);

        $transport = json_decode($response);
        $fee = $transport->fee->fee;

        // Prepare checkout data
        $checkoutData = [
            "code_order" => $_SESSION['order']['id'] ?? '',
            'user_id' => $_SESSION['user']['user_id'],
            'address' => ($_SESSION['order']['province'] ?? '') . ($_SESSION['order']['district'] ?? ''),
            'phone' => $_SESSION['order']['tel'] ?? '',
            'products' => $products,
            'transport' => $fee,
            'addressModel' => $dataAddress,
        ];

        // Render checkout page
        Header::render();
        Checkout::render($checkoutData);
        Footer::render();
    }

    // Place the order
    public function placeOrder()
    {
        // Set notification in session
        $_SESSION['notification'] = [
            'type' => 'success',
            'message' => 'Order placed successfully!',
        ];

        // Redirect to products page
        header('Location: /products');
        exit();
    }

    // Create the order and send to GHTK API
    public function createOrder()
    {
        // Retrieve form data
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $province = $_POST['province'];
        $district = $_POST['district'];
        $ward = $_POST['ward'];
        $products = $_POST['products'];
        $totalPrice = $_POST['totalprice'];

        // Prepare data for GHTK API
        $data = [
            'pick_name' => 'Kho 5TV',
            'pick_address' => '123 Đường ABC',
            'pick_province' => 'Hồ Chí Minh',
            'pick_district' => 'Quận 1',
            'pick_tel' => '0909123456',
            'name' => $name,
            'address' => "$address, $ward, $district, $province",
            'province' => $province,
            'district' => $district,
            'ward' => $ward,
            'tel' => $phone,
            'note' => 'Delivery during business hours',
            'is_freeship' => 1,
            'pick_money' => $totalPrice,
            'products' => [],
        ];

        // Add products to the order data
        foreach ($products as $product) {
            $data['products'][] = [
                'name' => $product['name'],
                'weight' => 200, // Product weight (customizable)
                'quantity' => $product['quantity'],
                'price' => $product['price'],
            ];
        }

        // Send request to GHTK API
        $apiUrl = 'https://services.giaohangtietkiem.vn/services/shipment/order';
        $apiToken = ''; // Replace with your API token

        $headers = [
            "Content-Type: application/json",
            "Token: $apiToken",
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $responseData = json_decode($response, true);

        // Check API response
        if ($httpcode === 200 && isset($responseData['success']) && $responseData['success']) {
            $_SESSION['notification'] = [
                'type' => 'success',
                'message' => 'Order created successfully!',
            ];
        } else {
            $_SESSION['notification'] = [
                'type' => 'error',
                'message' => 'An error occurred while creating the order!',
            ];
        }

        // Redirect to checkout page
        header('Location: /checkout');
    }
}

