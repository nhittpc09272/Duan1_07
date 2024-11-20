<?php

namespace App\Views\Client\Pages\Checkouts;

use App\Views\BaseView;

class Checkout extends BaseView
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
                .section_gap {
                    padding: 60px 0;
                }

                .checkout_area h2 {
                    color: #333;
                    font-weight: bold;
                    margin-bottom: 30px;
                }

                .order_box {
                    background: #fff;
                    padding: 20px;
                    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                    border-radius: 8px;
                }

                .order_box h2 {
                    font-size: 24px;
                    margin-bottom: 20px;
                    text-transform: uppercase;
                    font-weight: bold;
                }

                .order_box ul {
                    list-style: none;
                    padding: 0;
                }

                .order_box ul li {
                    display: flex;
                    justify-content: space-between;
                    padding: 10px 0;
                    border-bottom: 1px solid #eee;
                }

                .order_box ul li:last-child {
                    border-bottom: none;
                }

                .order_box .btn {
                    background: #ff9900;
                    color: #fff;
                    display: block;
                    text-align: center;
                    margin-top: 20px;
                    padding: 12px;
                    border-radius: 5px;
                    text-decoration: none;
                    font-size: 16px;
                    font-weight: bold;
                    transition: background 0.3s ease;
                }

                .order_box .btn:hover {
                    background: #cc7a00;
                }

                .qr-code img {
                    max-width: 100%;
                    height: auto;
                    border-radius: 8px;
                    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
                }
            </style>
        </head>

        <body>

            <!-- Checkout Section -->
            <section class="checkout_area section_gap">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <h2>Chi tiết thanh toán</h2>
                            <form class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Họ và tên</label>
                                    <input type="text" class="form-control" id="name" placeholder="Nhập họ và tên">
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Nhập email">
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Số điện thoại</label>
                                    <input type="text" class="form-control" id="phone" placeholder="Nhập số điện thoại">
                                </div>
                                <div class="col-md-6">
                                    <label for="address" class="form-label">Địa chỉ</label>
                                    <input type="text" class="form-control" id="address" placeholder="Nhập địa chỉ">
                                </div>
                                <div class="col-md-12">
                                    <label for="note" class="form-label">Ghi chú</label>
                                    <textarea class="form-control" id="note" rows="3" placeholder="Thêm ghi chú nếu có"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-4">
                            <div class="order_box">
                                <h2>Đơn hàng của bạn</h2>
                                <ul>
                                    <li><span>Sản phẩm 1</span><span>₫500,000</span></li>
                                    <li><span>Sản phẩm 2</span><span>₫300,000</span></li>
                                    <li><span>Vận chuyển</span><span>₫50,000</span></li>
                                    <li><strong>Tổng cộng</strong><strong>₫850,000</strong></li>
                                </ul>
                                <div class="qr-code text-center mt-4">
                                    <h5>Quét mã QR để thanh toán</h5>
                                    <img src="https://via.placeholder.com/200" alt="QR Code">
                                </div>
                                <a href="/confirm" class="btn">Xác nhận và thanh toán</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Link Bootstrap JS -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        </body>

        </html>








<?php

    }
}
