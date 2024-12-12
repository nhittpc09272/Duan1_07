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
    ?>
    <!--Begin display -->
    <div class="container">
        <form action="/createOrders" method="post">
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
    <input type="hidden" name="vnp_PayDate" value="<?php echo $_GET['vnp_PayDate']; ?>"></footer>
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