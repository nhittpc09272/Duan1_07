<?php

namespace App\Views\Client\Pages\Pay;

use App\Views\BaseView;

class Pay extends BaseView
{
    public static function render($data = null)
    {
        echo $_GET['vnp_ResponseCode'];
        die();
?>
        <!DOCTYPE html>
        <html lang="vi">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Thanh toán thành công</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f9f9f9;
                    margin: 0;
                    padding: 0;
                }

                .container {
                    max-width: 600px;
                    margin: 50px auto;
                    background: #fff;
                    border-radius: 8px;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                    padding: 20px;
                }

                .success-message {
                    text-align: center;
                    color: #4CAF50;
                }

                .success-message h1 {
                    margin: 0;
                    font-size: 24px;
                }

                .order-details {
                    margin: 20px 0;
                }

                .order-details h2 {
                    font-size: 18px;
                    margin-bottom: 10px;
                }

                .order-details table {
                    width: 100%;
                    border-collapse: collapse;
                }

                .order-details table th,
                .order-details table td {
                    border: 1px solid #ddd;
                    padding: 10px;
                    text-align: left;
                }

                .order-details table th {
                    background: #f5f5f5;
                }

                .total {
                    font-weight: bold;
                    color: #333;
                }

                .action-buttons {
                    text-align: center;
                    margin-top: 20px;
                }

                .action-buttons a {
                    text-decoration: none;
                    background: #4CAF50;
                    color: #fff;
                    padding: 10px 20px;
                    border-radius: 5px;
                    transition: background 0.3s;
                }

                .action-buttons a:hover {
                    background: #45a049;
                }
            </style>
        </head>

        <body>
            <div class="container">
                <div class="success-message">
                    <h1>Thanh toán thành công!</h1>
                    <p>Cảm ơn bạn đã mua hàng. Đơn hàng của bạn đã được xác nhận.</p>
                </div>
                <div class="order-details">
                    <h2>Chi tiết đơn hàng</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Sản phẩm A</td>
                                <td>1</td>
                                <td>500,000 đ</td>
                            </tr>
                            <tr>
                                <td>Sản phẩm B</td>
                                <td>2</td>
                                <td>300,000 đ</td>
                            </tr>
                            <tr>
                                <td class="total" colspan="2">Tổng cộng</td>
                                <td class="total">1,100,000 đ</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="action-buttons">
                    <a href="/">Về trang chủ</a>
                    <a href="/don-hang">Xem đơn hàng</a>
                </div>
            </div>
        </body>

        </html>

<?php


    }
}
