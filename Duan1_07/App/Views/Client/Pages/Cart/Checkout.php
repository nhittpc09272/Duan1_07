<?php

namespace App\Views\Client\Pages\Cart;

use App\Helpers\AuthHelper;
use App\Views\BaseView;

class Checkout extends BaseView
{
    public static function render($data = null)
    {
        $is_login = AuthHelper::checkLogin();

?>


        <div class="container mt-5 mb-5">
            <h1 class="text-center mb-5" style="margin-top: 100px;">Thanh toán</h1>

            <div class="row">
                <div class="col-md-6">
                    <h4 class="text-center">Thông tin đơn hàng</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Giá tiền</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total_price = 0;
                            $i = 0;
                            foreach ($data as $cart) :
                                if ($cart['data']) :

                                    $unit_price = $cart['quantity'] * ($cart['data']['price'] - $cart['data']['discount_price']);
                                    $total_price += $unit_price;
                                    $i++;
                            ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $cart['data']['name'] ?></td>
                                        <?php
                                        if ($cart['data']['discount_price'] > 0) :
                                        ?>
                                            <td>
                                                <strike><?= number_format($cart['data']['price']) ?></strike>
                                                <br>
                                                <?= number_format($cart['data']['price'] - $cart['data']['discount_price']) ?>
                                            </td>

                                        <?php
                                        else :
                                        ?>
                                            <td>
                                                <?= number_format($cart['data']['price']) ?>
                                            </td>
                                        <?php

                                        endif;
                                        ?>
                                        <td>
                                            <?= $cart['quantity'] ?>
                                        </td>
                                        <td><?= number_format($unit_price) ?></td>
                                    </tr>
                            <?php
                                endif;
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                    <h2 style="font-weight:bolder;">Tổng tất cả: <?= number_format($total_price)  ?>đ</h2>
                </div>
                <div class="col-md-6">

                    <h4 class="text-center">Thông tin tài khoản</h4>

                    <div class="card card-body">
                        <?php
                        if ($is_login) :
                        ?>
                            <form class="form" action="/" method="post" class="needs-validation">
                                <div class="form-group">
                                    <label for="username">Tên đăng nhập</label>
                                    <input type="username" class="form-control" name="username" id="username" value="<?= $_SESSION['user']['username'] ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" value="<?= $_SESSION['user']['email'] ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Số điện thoại</label>
                                    <input type="text" class="form-control" name="phone" id="phone" value="<?= $_SESSION['user']['phone'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Tên</label>
                                    <input type="text" class="form-control" name="name" id="name" value="<?= $_SESSION['user']['name'] ?>" required>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="name">Email</label>
                                    <input type="text" class="form-control" name="email" id="email" value="<?= $_SESSION['order']['email'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Địa chỉ nhận hàng</label>
                                    <input type="text" class="form-control" name="address" id="address" value="<?= $_SESSION['order']['address'] ?>" required>
                                </div> -->

                                <h5>Phương thức thanh toán</h5>
                                <!-- COD -->
                                <div class="payment-option">
                                    <img src="https://via.placeholder.com/24?text=COD" alt="COD">
                                    <span>Thanh toán khi nhận hàng</span>
                                    <input type="radio" name="payment" value="COD" checked>
                                </div>

                                <!-- ZaloPay -->
                                <div class="payment-option">
                                    <img src="https://via.placeholder.com/24?text=ZP" alt="ZaloPay">
                                    <span>ZaloPay (****9731)</span>
                                    <input type="radio" name="payment" value="ZaloPay">
                                </div>

                                <!-- MoMo -->
                                <div class="payment-option">
                                    <img src="https://via.placeholder.com/24?text=MoMo" alt="MoMo">
                                    <span>Ví điện tử MoMo</span>
                                    <small class="text-muted ms-2">Liên kết tài khoản Ví điện tử MoMo của bạn với TikTok Shop và thanh toán trực tiếp</small>
                                    <input type="radio" name="payment" value="MoMo">
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-outline-dark mt-3 mb-3">Đặt hàng</button>
                                </div>
                            </form>
                        <?php
                        else :
                        ?>
                            <h4 class="text-center text-danger">
                                Vui lòng đăng nhập để thanh toán
                            </h4>
                        <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
<?php

    }
}
