<?php

namespace App\Views\Client\Pages\Cart;

use App\Helpers\AuthHelper;
use App\Views\BaseView;

class Index extends BaseView
{
    public static function render($data = null)
    {
        $is_login = AuthHelper::checkLogin();
        $total_price = 0;
        $item_count = 0;

        // Calculate total price and item count
        foreach ($data as $cart) {
            if ($cart['data']) {
                $unit_price = $cart['quantity'] * ($cart['data']['price'] - $cart['data']['discount_price']);
                $total_price += $unit_price;
                $item_count += $cart['quantity'];
            }
        }
?>
        <style>
            .delete-icon {
                color: gray;
                /* Màu xám khi không rê chuột */
                transition: color 0.3s;
                /* Hiệu ứng chuyển màu mượt mà */
            }

            .delete-icon:hover {
                color: black;
                /* Màu đen khi rê chuột */
            }

            .payment-info {
                background: orange;
                /* Thay đổi màu nền thành cam */
                padding: 10px;
                border-radius: 6px;
                color: #fff;
                font-weight: bold;
            }

            .product-details {
                padding: 10px;
            }

            body {
                background: #eee;
            }

            .cart {
                background: #fff;
            }

            .p-about {
                font-size: 12px;
            }

            .table-shadow {
                -webkit-box-shadow: 5px 5px 15px -2px rgba(0, 0, 0, 0.42);
                box-shadow: 5px 5px 15px -2px rgba(0, 0, 0, 0.42);
            }

            .type {
                font-weight: 400;
                font-size: 10px;
            }

            label.radio {
                cursor: pointer;
            }

            label.radio input {
                position: absolute;
                top: 0;
                left: 0;
                visibility: hidden;
                pointer-events: none;
            }

            label.radio span {
                padding: 1px 12px;
                border: 2px solid #ada9a9;
                display: inline-block;
                color: #8f37aa;
                border-radius: 3px;
                text-transform: uppercase;
                font-size: 11px;
                font-weight: 300;
            }

            label.radio input:checked+span {
                border-color: #fff;
                background-color: blue;
                color: #fff;
            }

            .credit-inputs {
                background: rgb(102, 102, 221);
                color: #fff !important;
                border-color: rgb(102, 102, 221);
            }

            .credit-inputs::placeholder {
                color: #fff;
                font-size: 13px;
            }

            .credit-card-label {
                font-size: 9px;
                font-weight: 300;
            }

            .form-control.credit-inputs:focus {
                background: rgb(102, 102, 221);
                border: rgb(102, 102, 221);
            }

            .line {
                border-bottom: 1px solid rgb(102, 102, 221);
            }

            .information span {
                font-size: 12px;
                font-weight: 500;
            }

            .information {
                margin-bottom: 5px;
            }

            .items {
                -webkit-box-shadow: 5px 5px 4px -1px rgba(0, 0, 0, 0.25);
                box-shadow: 5px 5px 4px -1px rgba(0, 0, 0, 0.08);
            }

            .spec {
                font-size: 11px;
            }

            .btn-primary {
                background-color: blue;
                /* Đổi màu nút thanh toán thành xanh */
                border-color: blue;
                /* Đổi màu viền nút thanh toán thành xanh */
            }
        </style>
        <style>
            .delete-icon {
                color: gray;
                /* Màu xám khi không rê chuột */
                transition: color 0.3s;
                /* Hiệu ứng chuyển màu mượt mà */
            }

            .delete-icon:hover {
                color: black;
                /* Màu đen khi rê chuột */
            }
        </style>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <div class="container mt-5 p-3 rounded cart">
            <div class="row no-gutters">
                <h2>Giỏ hàng của bạn</h2>
                <div class="col-md-8">
                    <div class="product-details mr-2">
                        <div class="d-flex flex-row align-items-center">
                            <i class="fa fa-long-arrow-left"></i>
                            <span class="ml-2">Tiếp tục mua sắm</span>
                        </div>
                        <hr>
                        <h6 class="mb-0">Giỏ hàng</h6>
                        <div class="d-flex justify-content-between">
                            <span>Bạn có <?= $item_count ?> sản phẩm trong giỏ hàng</span>
                            <div class="d-flex flex-row align-items-center">
                                <span class="text-black-50">Sắp xếp theo:</span>
                                <div class="price ml-2">
                                    <span class="mr-1">giá</span>
                                    <i class="fa fa-angle-down"></i>
                                </div>
                            </div>
                        </div>

                        <?php
                        $i = 0;
                        foreach ($data as $cart):
                            if ($cart['data']):
                                $unit_price = $cart['quantity'] * ($cart['data']['price'] - $cart['data']['discount_price']);
                                $i++;
                        ?>
                                <div class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded">
                                    <div class="d-flex flex-row">
                                        <img class="rounded" src="<?= APP_URL ?>/public/assets/client/img/image/<?= $cart['data']['image'] ?>" width="40">
                                        <div class="ml-2">
                                            <span class="font-weight-bold d-block"><?= $cart['data']['product_name'] ?></span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center">
                                        <button class="btn btn-secondary btn-sm" style="margin-right: 5px;">-</button>
                                        <span class="d-block mx-2"><?= $cart['quantity'] ?></span>
                                        <button class="btn btn-secondary btn-sm" style="margin-left: 5px;">+</button>
                                        <span class="d-block ml-5 font-weight-bold"><?= number_format($unit_price) ?>đ</span>
                                        <i class="fa fa-trash-o ml-3 text-black-50 delete-icon" style="cursor: pointer;" title="Xóa sản phẩm"></i>
                                    </div>
                                </div>
                        <?php
                            endif;
                        endforeach;
                        ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="payment-info">
                        <div class="d-flex justify-content-between align-items-center">
                            <span>Thông tin thẻ</span>
                            <!-- <img class="rounded" src="https://i.imgur.com/WU501C8.jpg" width="30"> -->
                        </div>
                        <span class="type d-block mt-3 mb-1">Loại thẻ</span>
                        <label class="radio">
                            <input type="radio" name="card" value="payment" checked>
                            <span><img width="30" src="https://img.icons8.com/color/48/000000/mastercard.png" /></span>
                        </label>
                        <label class="radio">
                            <input type="radio" name="card" value="payment">
                            <span><img width="30" src="https://img.icons8.com/officel/48/000000/visa.png" /></span>
                        </label>
                        <label class="radio">
                            <input type="radio" name="card" value="payment">
                            <span><img width="30" src="https://img.icons8.com/ultraviolet/48/000000/amex.png" /></span>
                        </label>
                        <label class="radio">
                            <input type="radio" name="card" value="payment">
                            <span><img width="30" src="https://img.icons8.com/officel/48/000000/paypal.png" /></span>
                        </label>
                        <div>
                            <label class="credit-card-label">Tên trên thẻ</label>
                            <input type="text" class="form-control credit-inputs" placeholder="Tên">
                        </div>
                        <div>
                            <label class="credit-card-label">Số thẻ</label>
                            <input type="text" class="form-control credit-inputs" placeholder="0000 0000 0000 0000">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="credit-card-label">Ngày hết hạn</label>
                                <input type="text" class="form-control credit-inputs" placeholder="12/24">
                            </div>
                            <div class="col-md-6">
                                <label class="credit-card-label">CVV</label>
                                <input type="text" class="form-control credit-inputs" placeholder="342">
                            </div>
                        </div>
                        <hr class="line">
                        <!-- <div class="d-flex justify-content-between information">
                    <span>Tổng phụ</span>
                    <span><?= number_format($total_price) ?>đ</span>
                </div> -->
                        <!-- <div class="d-flex justify-content-between information">
                    <span>Phí vận chuyển</span>
                    <span>$20.00</span>
                </div> -->
                        <div class="d-flex justify-content-between information">
                            <span>Tổng cộng (bao gồm thuế)</span>
                            <span><?= number_format($total_price + 20) ?>đ</span>
                        </div>
                        <button class="btn btn-primary btn-block d-flex justify-content-between mt-3" type="button">
                            <span><?= number_format($total_price + 20) ?>đ</span>
                            <span>Thanh toán<i class="fa fa-long-arrow-right ml-1"></i></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
