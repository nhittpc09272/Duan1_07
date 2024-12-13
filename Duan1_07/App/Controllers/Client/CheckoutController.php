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
    // hiển thị danh sách
    public static function checkout()
    {

        // Kiểm tra xem có dữ liệu POST không
        if (!$_POST) {
            header('Location: /cart');
            NotificationHelper::error("Lỗi", "Không có dữ liệu sản phẩm");
            exit;
        }

        // Kiểm tra checkbox
        if (!isset($_POST['check']) || empty($_POST['check'])) {
            header('Location: /cart');
            NotificationHelper::error("Lỗi", "Vui lòng chọn sản phẩm");
            exit;
        }

        // Kiểm tra các mảng con
        $requiredFields = ['id', 'name', 'price', 'quantity'];
        foreach ($requiredFields as $field) {
            if (!isset($_POST[$field]) || !is_array($_POST[$field])) {
                header('Location: /cart');
                NotificationHelper::error("Lỗi", "Dữ liệu sản phẩm không hợp lệ");
                exit;
            }
        }

        // Phần code còn lại giữ nguyên như phiên bản trước
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
        // Kiểm tra xem có sản phẩm được chọn không
        if (!isset($_POST['check']) || empty($_POST['check'])) {
            header('Location: /cart');
            NotificationHelper::success("Errorcar", "Vui lòng chọn sản phẩm");
            exit;
        }

        // Lấy dữ liệu từ form
        $data = $_POST;

        // Lọc và tập hợp các sản phẩm được chọn
        $products = [];
        $pro = [];

        // Duyệt qua các sản phẩm được chọn
        foreach ($data['check'] as $check_id) {
$index = array_search($check_id, $data['id']);

            if ($index !== false) {
                // Thêm sản phẩm vào mảng products
                $products[] = [
                    'name' => $data['name'][$index],
                    'variant2' => $data['variant2'][$index] ?? '',
                    'variant' => $data['variant'][$index] ?? '',
                    'price' => $data['price'][$index],
                    'quantity' => $data['quantity'][$index],
                ];

                // Thêm sản phẩm vào mảng pro (phục vụ cho việc vận chuyển)
                $pro[] = [
                    'name' => $data['name'][$index],
                    'product_code' => $data['id'][$index],
                    'price' => $data['price'][$index],
                    'weight' => 1,
                    'quantity' => $data['quantity'][$index],
                ];
            }
        }

        // Lấy địa chỉ
        $addres = new Order;
        $dataAddress = $addres->getAddressAll();

        // Lưu sản phẩm vào session
        $_SESSION['product'] = $pro;

        // Chuẩn bị dữ liệu vận chuyển
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

        // Gọi API vận chuyển
        // $curl = curl_init();

        // curl_setopt_array($curl, [
        //     CURLOPT_URL => "https://services.giaohangtietkiem.vn/services/shipment/fee?" . http_build_query($transportData),
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_HTTPHEADER => [
        //         "Token: BZwk0Qw9eflakBLJCWexEZYrq6zLMLcxMuVcQu",
        //     ],
        // ]);

        // $response = curl_exec($curl);
        // curl_close($curl);

        // $transpot = json_decode($response);
        // $fee = $transpot->fee->fee;
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://services.giaohangtietkiem.vn/services/shipment/fee?" . http_build_query($transportData),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_HTTPHEADER => [
                "Token: BZwk0Qw9eflakBLJCWexEZYrq6zLMLcxMuVcQu",
            ],
            CURLOPT_SSL_VERIFYPEER => false, // Tắt xác thực SSL (không khuyến nghị)
            CURLOPT_SSL_VERIFYHOST => false, // Tắt xác thực hostname (không khuyến nghị)
        ]);

        $response = curl_exec($curl);

        // Kiểm tra lỗi cURL
        if ($response === false) {
$error = curl_error($curl);
            NotificationHelper::error("Lỗi", "Không thể kết nối đến dịch vụ vận chuyển: " . $error);
            header('Location: /cart');
            exit;
        }

        curl_close($curl);

        $transpot = json_decode($response);
        

        // Kiểm tra xem $transpot có phải là null không
        if ($transpot === null || !isset($transpot->fee)) {
            NotificationHelper::error("Lỗi", "Dữ liệu phí vận chuyển không hợp lệ.");
            header('Location: /cart');
            exit;
        }

        $fee = $transpot->fee->fee;

        // Chuẩn bị dữ liệu cho trang checkout
        $checkoutData = [
            "code_order" => $_SESSION['order']['id'] ?? '',
            'user_id' => $_SESSION['user']['user_id'],
            'address' => ($_SESSION['order']['province'] ?? '') . ($_SESSION['order']['district'] ?? ''),
            'phone' => $_SESSION['order']['tel'] ?? '',
            'products' => $products,
            'transport' => $fee,
            'addressModel' => $dataAddress,
        ];

        // Render trang checkout
        Header::render();
        Checkout::render($checkoutData);
        Footer::render();
    }

    public function placeOrder()
    {
        // Set thông báo vào session
        $_SESSION['notification'] = [
            'type' => 'success',
            'message' => 'Đặt hàng thành công!',
        ];

        // Chuyển hướng về trang sản phẩm
        header('Location: /products');
        exit();
    }
    public static function returnPay()
    {
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Checkout::render();
        Footer::render();
    }

    public static function pay()
    {
        $is_valid = OrderValidation::create();
        if (!$is_valid) {
            NotificationHelper::error("Error", "Vui lòng nhập đầy du thông tin");
            header('Location: /cart');
            exit;
        }
        $data = [
            'price' => $_POST['totalprice']
        ];
        $_SESSION['luuaddress'] = $_POST;
        function generateRandomString($length = 10)
        {
            $characters = '0123456789';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        };

        $_SESSION['order'] = [
            "id" => generateRandomString(),
            "pick_name" => "HCM-nội thành",
            "pick_address" => "590 CMT8 P.11",
            "pick_province" => "TP. Hồ Chí Minh",
            "pick_district" => "Quận 3",
            "pick_ward" => "Phường 1",
            "pick_tel" => "09112223091",
            "booking_id" => "18315287",
            "tel" => $_POST['phone'],
            "name" => $_POST['name'],
"address" => $_POST['address'],
            "province" => $_POST['province'],
            "district" => $_POST['district'],
            "ward" => $_POST['ward'],
            "hamlet" => $_POST['hamlet'],
            "is_freeship" => "1",
            "pick_money" => $_POST['totalprice'],
            "note" => "Khối lượng tính cước tối đa=> 1.00 kg",
            "value" => $_POST['totalprice'],
            "pick_session" => 2
        ];
        $_SESSION['giaohang'] = [
            'products' => $_SESSION['product'],
            'order' => $_SESSION['order'],
        ];
        $_SESSION['orders'] = json_encode($_SESSION['giaohang'], JSON_UNESCAPED_UNICODE);




        $_SESSION['total_price'] = $_POST['totalprice'];

        Header::render();
        vnpay_pay::render(data: $data);
        Footer::render();
    }

    public static function createpay()
    {
        $data = $_POST;
        Header::render();
        vnpay_create_payment::render($data);
        Footer::render();
    }

    public static function returnPayment()
    {
        $order = $_SESSION['orders'];
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://services.giaohangtietkiem.vn/services/shipment/order",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $order,
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Token: DUziXhjxOf6OWOq6sUCHnlYlJQpk7ghgnSp21u",
            ),
        ));
        $response = curl_exec($curl);
        if (curl_errno($curl)) {
            echo 'Error:' . curl_error($curl);
        } else {
            echo 'Response: ' . $response;
        }
        $response = json_decode($response, true);
        if (isset($response['order']['tracking_id'])) {
            $data = [
                "code_order" => $_SESSION['order']['id'],
                'total' => $_SESSION['total_price'],
                'user_id' => $_SESSION['users']['id'],
                'address' => $_SESSION['order']['province'] .= $_SESSION['order']['district'],
                'phone' => $_SESSION['order']['tel'],
                'tracking_id' => $response['order']['tracking_id']
            ];

            $orders = new Order();
            $order = $orders->createOrders($data);
            $idOrder = $orders->getOrder();
            $datadetai = [
                'name_product' => $_SESSION['product'][0]['name'],
                'product_id' => $_SESSION['product'][0]['product_code'],
                'quantity' => $_SESSION['product'][0]['quantity'],
                'total_amount' => $_SESSION['total_price'],
                'order_id' => $idOrder[0]['id'],
            ];
            $orderDetail = $orders->createOrderDetail($datadetai);
        } else {
            echo "Tracking ID không tồn tại.";
        }
// $_SESSION['idcheckorder'] [] = $id;
        $response = curl_exec($curl);
        curl_close($curl);

        header("location: /");
    }
}