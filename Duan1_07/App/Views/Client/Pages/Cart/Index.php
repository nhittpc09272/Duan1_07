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

        // Tính tổng giá và số lượng sản phẩm
        foreach ($data as $cart) {
            if ($cart['data']) {
                $unit_price = $cart['quantity'] * ($cart['data']['price'] - $cart['data']['discount_price']);
                $total_price += $unit_price;
                $item_count += $cart['quantity'];
            }
        }
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Giỏ hàng</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
        </head>

        <body>
            <div class="container py-5">
                <h1 class="text-center mb-4">Giỏ hàng (<?= $item_count ?> sản phẩm)</h1>
                <div class="d-flex justify-content-between mb-4">
                    <a href="/products" class="btn btn-primary">Tiếp tục mua sắm</a>
                </div>

                <div class="row">
                    <!-- Danh sách sản phẩm -->
                    <div class="col-lg-8">
                        <?php foreach ($data as $cart): ?>
                            <?php if ($cart['data']): ?>
                                <div class="card mb-3">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="<?= APP_URL ?>/public/assets/client/img/image/<?= $cart['data']['image'] ?>"
                                                class="img-fluid rounded-start"
                                                alt="<?= $cart['data']['product_name'] ?>">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title"><?= $cart['data']['product_name'] ?></h5>
                                                <p class="card-text">Mã sản phẩm: <?= $cart['data']['product_id'] ?></p>

                                                <!-- Cập nhật số lượng -->
                                                <form action="/cart/update" method="post" class="d-flex align-items-center">
                                                    <input type="hidden" name="method" value="PUT">
                                                    <input type="number" name="quantity" value="<?= $cart['quantity'] ?>"
                                                        min="1" max="99" class="form-control mx-2" style="width: 70px;"
                                                        onchange="this.form.submit()">
                                                    <input type="hidden" name="id" value="<?= $cart['data']['product_id'] ?>">
                                                </form>

                                                <!-- Xóa sản phẩm -->
                                                <form action="/cart/delete" method="post" class="mt-2">
                                                    <input type="hidden" name="method" value="DELETE">
                                                    <input type="hidden" name="id" value="<?= $cart['data']['product_id'] ?>">
                                                    <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                                </form>

                                                <!-- Giá sản phẩm -->
                                                <div class="mt-3">
                                                    <?php if ($cart['data']['discount_price'] > 0): ?>
                                                        <div class="text-muted text-decoration-line-through">
                                                            <?= number_format($cart['data']['price']) ?>đ
                                                        </div>
                                                        <div class="text-success fw-bold">
                                                            <?= number_format($cart['data']['price'] - $cart['data']['discount_price']) ?>đ
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="fw-bold"><?= number_format($cart['data']['price']) ?>đ</div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>

                    <!-- Tóm tắt đơn hàng -->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Tóm tắt đơn hàng</h5>
                                <div class="d-flex justify-content-between">
                                    <span>Tạm tính:</span>
                                    <span><?= number_format($total_price) ?>đ</span>
                                </div>
                                <div class="d-flex justify-content-between mt-2">
                                    <span>Phí vận chuyển:</span>
                                    <span>30,000đ</span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between fw-bold">
                                    <span>Tổng cộng:</span>
                                    <span><?= number_format($total_price + 30000) ?>đ</span>
                                </div>
                                <div class="mt-4">
                                    <form action="/cart/delete-all" method="post">
                                        <input type="hidden" name="method" value="DELETE">
                                        <button class="btn btn-danger w-100 mb-2">Xóa giỏ hàng</button>
                                    </form>
                                    <?php if ($is_login): ?>
                                        <a href="/checkout" class="btn btn-success w-100">Tiến hành thanh toán</a>
                                    <?php else: ?>
                                        <div class="text-center text-danger">
                                            <p>Vui lòng đăng nhập để thanh toán</p>
                                            <a href="/login" class="btn btn-outline-dark">Đăng nhập</a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
        </body>

        </html>
<?php
    }
}
