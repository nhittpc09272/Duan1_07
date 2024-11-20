<?php

namespace App\Views\Client\Pages\Confirms;

use App\Views\BaseView;

class Confirm extends BaseView
{
    public static function render($data = null)
    {

?>

        <!DOCTYPE html>
        <html lang="vi">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Thanh Toán</title>
            <!-- Link Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

            <style>
                /* CSS tùy chỉnh */
                .title_confirmation {
                    text-align: center;
                    margin: 20px 0;
                    font-size: 24px;
                    color: #ff6600;
                    font-weight: bold;
                }

                .details_item h4 {
                    color: #ff6600;
                    font-weight: bold;
                }

                .details_item ul {
                    list-style: none;
                    padding: 0;
                }

                .details_item ul li {
                    padding: 5px 0;
                    font-size: 15px;
                }

                .order_details_table h2 {
                    color: #ff6600;
                    margin-bottom: 20px;
                }

                .table thead th {
                    background-color: #ff9900;
                    color: #fff;
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
                    margin: 15px;
                }

                .btn-custom:hover {
                    background-color: #cc7a00;
                }

                .order_actions {
                    text-align: center;
                    margin-top: 30px;
                }
            </style>
        </head>

        <body>

            <!--================Order Details Area =================-->
            <section class="order_details section_gap">
                <div class="container">
                    <h3 class="title_confirmation">Cảm ơn bạn. Đơn hàng của bạn đã được nhận.</h3>
                    <div class="row order_d_inner">
                        <div class="col-lg-4">
                            <div class="details_item">
                                <h4>Thông tin đơn hàng</h4>
                                <ul class="list">
                                    <li><a href="#"><span>Mã đơn hàng</span>: 60235</a></li>
                                    <li><a href="#"><span>Ngày</span>: Hà Nội</a></li>
                                    <li><a href="#"><span>Tổng tiền</span>: 50,000,000 VND</a></li>
                                    <li><a href="#"><span>Phương thức thanh toán</span>: Chuyển khoản ngân hàng</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="details_item">
                                <h4>Địa chỉ thanh toán</h4>
                                <ul class="list">
                                    <li><a href="#"><span>Đường</span>: 56/8 Phố Trần Duy Hưng</a></li>
                                    <li><a href="#"><span>Thành phố</span>: Hà Nội</a></li>
                                    <li><a href="#"><span>Quốc gia</span>: Việt Nam</a></li>
                                    <li><a href="#"><span>Mã bưu chính</span>: 100000</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="details_item">
                                <h4>Địa chỉ giao hàng</h4>
                                <ul class="list">
                                    <li><a href="#"><span>Đường</span>: 56/8 Phố Trần Duy Hưng</a></li>
                                    <li><a href="#"><span>Thành phố</span>: Hà Nội</a></li>
                                    <li><a href="#"><span>Quốc gia</span>: Việt Nam</a></li>
                                    <li><a href="#"><span>Mã bưu chính</span>: 100000</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="order_details_table">
                        <h2>Chi tiết đơn hàng</h2>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Sản phẩm</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col">Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <p>Pixelstore fresh Blackberry</p>
                                        </td>
                                        <td>
                                            <h5>x 02</h5>
                                        </td>
                                        <td>
                                            <p>16,800,000 VND</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>Tổng phụ</h4>
                                        </td>
                                        <td></td>
                                        <td>
                                            <p>50,400,000 VND</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>Phí vận chuyển</h4>
                                        </td>
                                        <td></td>
                                        <td>
                                            <p>1,200,000 VND</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>Tổng cộng</h4>
                                        </td>
                                        <td></td>
                                        <td>
                                            <p>51,600,000 VND</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="order_actions">
                        <a href="/products" class="btn-custom">Tiếp tục mua hàng</a>
                        <a href="/tracking" class="btn-custom">Theo dõi đơn hàng</a>
                    </div>
                </div>
            </section>
            <!--================End Order Details Area =================-->

            <!-- Link Bootstrap JS -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        </body>

        </html>

<?php
    }
}
?>
