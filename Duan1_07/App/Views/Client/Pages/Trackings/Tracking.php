<?php

namespace App\Views\Client\Pages\Trackings;

use App\Views\BaseView;

class Tracking extends BaseView
{
    public static function render($data = null)
    {

?>

        <!DOCTYPE html>
        <html lang="vi">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Theo Dõi Đơn Hàng</title>
            <!-- Link Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

            <style>
                /* CSS tùy chỉnh */
                .tracking-title {
                    text-align: center;
                    margin: 30px 0;
                    font-size: 28px;
                    color: #ff6600;
                    font-weight: bold;
                }

                .order-status {
                    text-align: center;
                    margin-bottom: 30px;
                }

                .order-status span {
                    font-size: 16px;
                    font-weight: bold;
                    color: #ff9900;
                }

                .progress {
                    height: 20px;
                    background-color: #f2f2f2;
                }

                .progress-bar {
                    background-color: #ff6600;
                }

                .details_table {
                    margin-top: 30px;
                }

                .btn-custom {
                    display: inline-block;
                    background-color: #ff9900;
                    color: #fff;
                    padding: 12px 25px;
                    border: none;
                    border-radius: 5px;
                    text-align: center;
                    text-decoration: none;
                    font-size: 16px;
                    font-weight: bold;
                    transition: background 0.3s ease;
                }

                .btn-custom:hover {
                    background-color: #cc7a00;
                }
            </style>
        </head>

        <body>

            <!--================Order Tracking Area =================-->
            <div class="container">
                <h1 class="tracking-title">Theo Dõi Đơn Hàng</h1>

                <div class="order-status">
                    <p>Mã đơn hàng: <span>#60235</span></p>
                    <p>Trạng thái: <span>Đang vận chuyển</span></p>
                </div>

                <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                </div>

                <div class="details_table">
                    <h3>Chi tiết đơn hàng</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Sản phẩm</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Tổng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Pixelstore fresh Blackberry</td>
                                    <td>x2</td>
                                    <td>8,400,000 VND</td>
                                    <td>16,800,000 VND</td>
                                </tr>
                                <tr>
                                    <td>Pixelstore fresh Strawberry</td>
                                    <td>x3</td>
                                    <td>7,500,000 VND</td>
                                    <td>22,500,000 VND</td>
                                </tr>
                                <tr>
                                    <td><strong>Tổng cộng</strong></td>
                                    <td></td>
                                    <td></td>
                                    <td><strong>39,300,000 VND</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="order-actions text-center mt-4">
                    <a href="/products" class="btn-custom">Tiếp tục mua hàng</a>
                    <a href="/contact" class="btn-custom">Liên hệ hỗ trợ</a>
                </div>
            </div>
            <!--================End Order Tracking Area =================-->

            <!-- Link Bootstrap JS -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        </body>

        </html>

<?php
    }
}
?>