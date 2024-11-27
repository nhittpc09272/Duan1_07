<?php

namespace App\Views\Client\Pages\Cart;

use App\Helpers\AuthHelper;
use App\Views\BaseView;

class Index extends BaseView
{
    public static function render($data = null)
    {
        $is_login = AuthHelper::checkLogin();
        ?>
        <div class="container mt-5 mb-5">
            <h1 class="text-center fw-bold py-3"
                style="margin-top: 100px; background-color: #f8f9fa; color: #6c757d; border-radius: 8px;">
                Giỏ hàng của bạn
            </h1>
            <table class="table table-bordered table-hover align-middle mt-4">
                <thead class="text-center" style="background-color: #ADD8E6; color: #333;">
                    <tr>
                        <th>STT</th>
                        <th>Mã sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá tiền</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody style="background-color: #f4f4f4;">
                    <?php
                    $total_price = 0;
                    $i = 0;
                    foreach ($data as $cart):
                        if ($cart['data']):
                            $unit_price = $cart['quantity'] * ($cart['data']['price'] - $cart['data']['discount_price']);
                            $total_price += $unit_price;
                            $i++;
                            ?>
                            <tr class="text-center">
                                <td><?= $i ?></td>
                                <td><?= $cart['data']['id'] ?></td>
                                <td>
                                    <img src="<?= APP_URL ?>/public/assets/client/images/<?= $cart['data']['image'] ?>"
                                        alt="<?= $cart['data']['name'] ?>" class="img-thumbnail" width="100px">
                                </td>
                                <td><?= $cart['data']['name'] ?></td>
                                <td class="text-danger fw-bold">
                                    <?php if ($cart['data']['discount_price'] > 0): ?>
                                        <strike><?= number_format($cart['data']['price']) ?>đ</strike><br>
                                        <?= number_format($cart['data']['price'] - $cart['data']['discount_price']) ?>đ
                                    <?php else: ?>
                                        <?= number_format($cart['data']['price']) ?>đ
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <form action="/cart/update" method="post" class="d-flex justify-content-center align-items-center">
                                        <input type="hidden" name="method" value="PUT">
                                        <!-- Nút giảm số lượng -->
                                        <button type="button" class="btn btn-outline-secondary btn-sm p-0"
                                            style="width: 30px; height: 30px; font-size: 16px;"
                                            onclick="this.parentNode.querySelector('input[name=quantity]').stepDown()">&#8722;</button>
                                        <!-- Trường nhập số lượng -->
                                        <input type="number" name="quantity" value="<?= $cart['quantity'] ?>"
                                            class="form-control text-center mx-1" style="width: 50px; height: 31px; margin-top: 17px;"
                                            min="1" max="99" onchange="this.form.submit()">
                                        <!-- Nút tăng số lượng -->
                                        <button type="button" class="btn btn-outline-secondary btn-sm p-0"
                                            style="width: 30px; height: 30px; font-size: 16px;"
                                            onclick="this.parentNode.querySelector('input[name=quantity]').stepUp()">&#43;</button>
                                        <input type="hidden" name="id" value="<?= $cart['data']['id'] ?>">
                                        <input type="hidden" name="update-cart-item">
                                    </form>
                                </td>

                                <td class="fw-bold"><?= number_format($unit_price) ?>đ</td>
                                <td>
                                    <form action="cart/delete" method="post">
                                        <input type="hidden" name="method" value="DELETE">
                                        <input type="hidden" name="id" value="<?= $cart['data']['id'] ?>">
                                        <button class="btn btn-danger btn-sm" type="submit"
                                            style="width: 60px; height: 30px">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                        endif;
                    endforeach;
                    ?>
                </tbody>
            </table>

            <div class="mt-4">
                <h3 class="text-end text-success fw-bold">Tổng cộng: <?= number_format($total_price) ?>đ</h3>
            </div>

            <div class="mt-5 d-flex justify-content-between align-items-center">
                <form action="/cart/delete-all" method="post">
                    <input type="hidden" name="method" value="DELETE">
                    <button class="btn btn-danger" name="delete-cart" type="submit">Xóa giỏ hàng</button>
                </form>

                <?php if ($is_login): ?>
                    <a href="/checkout" class="btn btn-primary">Tiến hành thanh toán</a>
                <?php else: ?>
                    <div class="text-center">
                        <span class="text-danger">Vui lòng đăng nhập để thanh toán</span><br>
                        <a href="/login" class="btn btn-outline-dark mt-2">Đăng nhập</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <br><br>
        <?php
    }
}
