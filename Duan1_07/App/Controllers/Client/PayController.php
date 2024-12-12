<?php

namespace App\Controllers\Client;

use App\Views\Client\Layouts\Header;
use App\Views\Client\Layouts\Footer;
use App\vnpay_php\vnpay_pay;
use App\vnpay_php\vnpay_create_payment;
use App\vnpay_php\vnpay_return;
use App\Views\Client\Components\Notification;
use App\Helpers\NotificationHelper;
use App\Models\Order;
use App\Validations\OrderValidation;
use App\Views\Client\Pages\Checkouts\Checkout;
use App\Views\Client\Pages\Account\Order\Orders;
use App\Views\Client\Pages\Pay\Pay;


class PayController
{

    public static function returnPay()
    {
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Checkout::render();
        Footer::render();
    }
    public static function checkOut()
    {
        if (!isset($_POST['check'])) {
            header('Location: /cart');
            NotificationHelper::success("Errorcar", "Vui lòng chọn sản phẩm");
            exit;
        }

        $data = $_POST;

        $products = [];
        foreach ($data['check'] as $check_id) {
            foreach ($data['id'] as $index => $id) {
                if ($id === $check_id) {
                    $products[] = [
                        'name' => $data['name'][$index],
                        'variant2' => $data['variant2'][$index],
                        'variant' => $data['variant'][$index],
                        'price' => $data['price'][$index],
                        'quantity' => $data['quantity'][$index],
                    ];
                    break;
                }
            }
        }

        $pro = [];
        foreach ($data['check'] as $check_id) {
            foreach ($data['id'] as $index => $id) {
                if ($id === $check_id) {
                    $pro[] = [
                        'name' => $data['name'][$index],
                        'product_code' => $data['id'][$index],
                        'price' => $data['price'][$index],
                        'weight' => 1,
                        'quantity' => $data['quantity'][$index],
                    ];
                    break;
                }
            }
        }


        $addres = new Order;
        $dataAddress = $addres->getAddressAll();
        $_SESSION['product'] = $pro;

        $data = array(
            "pick_province" => "TP. Hồ Chí Minh",
            "pick_district" => "Quận 1",
            "province" => $dataAddress[0]['province'],
            "district" => $dataAddress[0]['district'],
            "address" => $dataAddress[0]['address'],
            "weight" => 1000,
            "value" => 3000000,
            "transport" => "fly",
            "deliver_option" => "xteam",
            "tags"  => [1, 7]
        );
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://services.giaohangtietkiem.vn/services/shipment/fee?" . http_build_query($data),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_HTTPHEADER => array(
                "Token: BZwk0Qw9eflakBLJCWexEZYrq6zLMLcxMuVcQu",
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        $transpot = json_decode($response);
        $fee = $transpot->fee;
        $fee = $fee->fee;
        $data = [
            "code_order" => $_SESSION['order']['id'],
            // 'total' => $_POST['totalprice'],
            'user_id' => $_SESSION['users']['id'],
            'address' => $_SESSION['order']['province'] .= $_SESSION['order']['district'],
            'phone' => $_SESSION['order']['tel'],
            'products' => $products,
            'transport' =>$fee,
            'addressModel' =>$dataAddress,
        ];

        Header::render();
        Checkout::render($data);
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
        vnpay_pay::render($data);
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

    public function createOrder() 
    {
        // Lấy dữ liệu từ POST request
        $data = [
            'vnp_TxnRef' => $_POST['vnp_TxnRef'],
            'vnp_Amount' => $_POST['vnp_Amount'],
            'vnp_OrderInfo' => $_POST['vnp_OrderInfo'],
            'vnp_ResponseCode' => $_POST['vnp_ResponseCode'],
            'vnp_TransactionNo' => $_POST['vnp_TransactionNo'],
            'vnp_BankCode' => $_POST['vnp_BankCode'],
            'vnp_PayDate' => $_POST['vnp_PayDate']
        ];

        // Kiểm tra tính hợp lệ của dữ liệu
        if ($data['vnp_ResponseCode'] == '00') { // GD thành công
            // Gọi model để lưu thông tin đơn hàng
            $orderModel = new Order();
            $orderId = $orderModel->createOrders($data);

            if ($orderId) {
                echo "Lưu đơn hàng thành công! Mã đơn hàng của bạn là: " . $orderId;
                header("Location: /order-success?order_id=$orderId"); // Chuyển hướng người dùng
            } else {
                echo "Lỗi: Không thể lưu đơn hàng vào cơ sở dữ liệu.";
            }
        } else {
            echo "Giao dịch không thành công. Mã lỗi: " . $data['vnp_ResponseCode'];
        }
    }
    

    
}
