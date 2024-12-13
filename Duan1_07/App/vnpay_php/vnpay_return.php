<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $vnp_TxnRef = $_POST['vnp_TxnRef'];
    $vnp_Amount = $_POST['vnp_Amount'];
    $vnp_OrderInfo = $_POST['vnp_OrderInfo'];
    $vnp_ResponseCode = $_POST['vnp_ResponseCode'];
    $vnp_TransactionNo = $_POST['vnp_TransactionNo'];
    $vnp_BankCode = $_POST['vnp_BankCode'];
    $vnp_PayDate = $_POST['vnp_PayDate'];

    // Thông tin người gửi (bạn cần điều chỉnh theo thông tin cụ thể của bạn)
    $sender_info = [
        "name" => "Tên Cửa Hàng",
        "tel" => "0123456789",
        "address" => "Địa chỉ cửa hàng",
        "ward" => "Phường",
        "district" => "Quận/Huyện",
        "province" => "Tỉnh/Thành phố"
    ];

    // Thông tin người nhận (bạn cần lấy từ thông tin đơn hàng)
    $receiver_info = [
        "name" => "Tên Khách Hàng", // Bạn cần lấy từ CSDL hoặc form
        "tel" => "0987654321", // Bạn cần lấy từ CSDL hoặc form
        "address" => "Địa chỉ giao hàng", // Bạn cần lấy từ CSDL hoặc form
        "ward" => "Phường",
        "district" => "Quận/Huyện",
        "province" => "Tỉnh/Thành phố"
    ];

    // Dữ liệu đơn hàng để gửi lên GHTK
    $data = [
        "order" => [
            "id" => $vnp_TxnRef, // Mã đơn hàng
            "pick_name" => $sender_info["name"],
            "pick_tel" => $sender_info["tel"],
            "pick_address" => $sender_info["address"],
            "pick_ward" => $sender_info["ward"],
            "pick_district" => $sender_info["district"],
            "pick_province" => $sender_info["province"],
            "name" => $receiver_info["name"],
            "tel" => $receiver_info["tel"],
            "address" => $receiver_info["address"],
            "ward" => $receiver_info["ward"],
            "district" => $receiver_info["district"],
            "province" => $receiver_info["province"],
            "total_weight" => 500, // Trọng lượng (gram)
            "value" => $vnp_Amount / 100, // Giá trị đơn hàng
            "transport" => "road", // Phương thức vận chuyển
            "pick_session_id" => "session_id", // Nếu có
            "pick_type" => 1 // Loại lấy hàng
        ]
    ];

    // Gọi API GHTK để tạo đơn
    $url = 'https://services.giaohangtietkiem.vn/services/shipment/order';
    $token = 'BZwk0Qw9eflakBLJCWexEZYrq6zLMLcxMuVcQu'; // Token GHTK của bạn

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Token: ' . $token
    ]);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // Xử lý phản hồi từ GHTK
    $result = json_decode($response, true);

    if ($httpCode == 200 && isset($result['success']) && $result['success'] === true) {
        // Đơn hàng được tạo thành công
        $tracking_code = $result['order']['tracking_id'];
        echo "Tạo đơn hàng thành công. Mã vận đơn: " . $tracking_code;
        
        // Lưu mã vận đơn vào CSDL nếu cần
    } else {
        // Lỗi khi tạo đơn
        echo "Tạo đơn hàng thất bại. Chi tiết: " . $response;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>VNPAY RESPONSE</title>
    <!-- Bootstrap core CSS -->
    <link href="/vnpay_php/assets/bootstrap.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="/vnpay_php/assets/jumbotron-narrow.css" rel="stylesheet">
    <script src="/vnpay_php/assets/jquery-1.11.3.min.js"></script>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #ffffff;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            padding: 20px;
        }

        .header {
            text-align: center;
            background-color: #007bff;
            color: #fff;
            padding: 20px 0;
            border-radius: 10px 10px 0 0;
        }

        .header h3 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }

        /* Table and Form Styles */
        .table-responsive {
            margin-top: 20px;
        }

        .form-group {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        .form-group:last-child {
            border-bottom: none;
        }

        .form-group label {
            font-weight: bold;
            font-size: 14px;
            color: #555;
        }

        .form-group label:last-child {
            font-weight: normal;
            color: #007bff;
        }

        /* Result Messages */
        .form-group .text-muted {
            color: #6c757d;
        }

        span {
            font-size: 16px;
            font-weight: bold;
        }

        span[style*='color:blue'] {
            color: #28a745 !important;
        }

        span[style*='color:red'] {
            color: #dc3545 !important;
        }

        /* Footer Styles */
        .footer {
            text-align: center;
            background-color: #007bff;
            color: #fff;
            padding: 15px 0;
            border-radius: 0 0 10px 10px;
            font-size: 14px;
            position: relative;
        }

        .footer p {
            margin: 0;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                width: 90%;
                margin: 20px auto;
            }

            .form-group {
                flex-direction: column;
                align-items: flex-start;
            }

            .form-group label {
                margin-bottom: 5px;
            }
        }
    </style>
</head>

<body>
    <?php
    require_once("./config.php");
    $vnp_SecureHash = $_GET['vnp_SecureHash'];
    $inputData = array();
    foreach ($_GET as $key => $value) {
        if (substr($key, 0, 4) == "vnp_") {
            $inputData[$key] = $value;
        }
    }

    unset($inputData['vnp_SecureHash']);
    ksort($inputData);
    $i = 0;
    $hashData = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
    }

    $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
    var_dump($secureHash);
    
    ?>
    <!--Begin display -->
    <div class="container">
        <form action="/createOrders" method="post">
        <input type="hidden" name="method" value="POST">

            <div class="header clearfix">
                <h3 class="text-muted">VNPAY RESPONSE</h3>
            </div>
            <div class="table-responsive">
                <div class="form-group">
                    <label>Mã đơn hàng:</label>

                    <label><?php echo $_GET['vnp_TxnRef'] ?></label>
                </div>
                <div class="form-group">

                    <label>Số tiền:</label>
                    <label><?php echo $_GET['vnp_Amount'] ?></label>
                </div>
                <div class="form-group">
                    <label>Nội dung thanh toán:</label>
                    <label><?php echo $_GET['vnp_OrderInfo'] ?></label>
                </div>
                <div class="form-group">
                    <label>Mã phản hồi (vnp_ResponseCode):</label>
                    <label><?php echo $_GET['vnp_ResponseCode'] ?></label>
                </div>
                <div class="form-group">
                    <label>Mã GD Tại VNPAY:</label>
                    <label><?php echo $_GET['vnp_TransactionNo'] ?></label>
                </div>
                <div class="form-group">
                    <label>Mã Ngân hàng:</label>
                    <label><?php echo $_GET['vnp_BankCode'] ?></label>
                </div>
                <div class="form-group">
                    <label>Thời gian thanh toán:</label>
                    <label><?php echo $_GET['vnp_PayDate'] ?></label>
                </div>
                <div class="form-group">
                    <label>Kết quả:</label>
                    <label>
                        <?php
                        if ($secureHash == $vnp_SecureHash) {
                            if ($_GET['vnp_ResponseCode'] == '00') {
                                echo "<span style='color:blue'>GD Thanh cong</span>";
                            } else {
                                echo "<span style='color:red'>GD Khong thanh cong</span>";
                            }
                        } else {
                            echo "<span style='color:red'>Chu ky khong hop le</span>";
                        }
                        ?>

                    </label>
                </div>
            </div>
            <input type="hidden" name="vnp_TxnRef" value="<?php echo $_GET['vnp_TxnRef']; ?>">
            <input type="hidden" name="vnp_Amount" value="<?php echo $_GET['vnp_Amount']; ?>">
            <input type="hidden" name="vnp_OrderInfo" value="<?php echo $_GET['vnp_OrderInfo']; ?>">
            <input type="hidden" name="vnp_ResponseCode" value="<?php echo $_GET['vnp_ResponseCode']; ?>">
            <input type="hidden" name="vnp_TransactionNo" value="<?php echo $_GET['vnp_TransactionNo']; ?>">
            <input type="hidden" name="vnp_BankCode" value="<?php echo $_GET['vnp_BankCode']; ?>">
            <input type="hidden" name="vnp_PayDate" value="<?php echo $_GET['vnp_PayDate']; ?>">
            <button type="submit">Theo dõi đơn hàng</button>
        </form>
        <p>
            &nbsp;
        </p>
        <footer class="footer">
            <p>&copy; VNPAY <?php echo date('Y') ?></p>
        </footer>
    </div>
</body>

</html>