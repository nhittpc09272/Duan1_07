<?php

namespace App\Views\Client\Pages\Product;

use App\Helpers\AuthHelper;
use App\Views\BaseView;

class Detail extends BaseView
{
    public static function render($data = null)
    {
        $is_login = AuthHelper::checkLogin();
        ?>
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-6">
                    <img src="<?= APP_URL ?>/public/assets/client/img/image/<?= isset($data['product']['image']) ? $data['product']['image'] : 'default.jpg' ?>" alt="" width="100%">
                </div>
                <div class="col-md-6">
                    <h5><?= isset($data['product']['product_name']) ? $data['product']['product_name'] : 'Tên sản phẩm không có' ?></h5>
                    <p>
                        <?= isset($data['product']['description']) ? $data['product']['description'] : 'Mô tả sản phẩm không có' ?>
                    </p>
                    <?php
                    if (isset($data['product']['discount_price']) && $data['product']['discount_price'] > 0) :
                    ?>
                        <h6>Giá gốc: <strike><?= isset($data['product']['price']) ? number_format($data['product']['price']) : 'Chưa có giá tiền' ?> đ</strike></h6>
                        <h6>Giá giảm: <strong class="text-danger"><?= isset($data['product']['price'], $data['product']['discount_price']) ? number_format($data['product']['price'] - $data['product']['discount_price']) : 'Chưa có giá' ?> đ</strong></h6>
                    <?php
                    else :
                    ?>
                        <h6>Giá tiền: <?= isset($data['product']['price']) ? number_format($data['product']['price']) : 'Chưa có giá tiền' ?> đ</h6>
                    <?php
                    endif;
                    ?>
                    <h6>Số lượt xem: <?= isset($data['product']['view']) ? $data['product']['view'] : 'Chưa có lượt xem' ?></h6>
                    <h6>Danh mục: <?= isset($data['product']['category_name']) ? $data['product']['category_name'] : 'Chưa có danh mục' ?></h6>

                    <!-- Hiển thị nút màu sắc -->
                    <h5>Màu sắc:</h5>
                    <div class="color-buttons">
                        <?php foreach ($data['color'] as $color): ?>
                            <button type="button" class="btn" style="background-color: <?= $color ?>; border: 2px solid transparent;" title="<?= $color ?>"></button>
                        <?php endforeach; ?>
                    </div>

                    <!-- Hiển thị nút kích thước -->
                    <h5 class="mt-3">Chọn kích thước:</h5>
                    <div class="size-buttons">
                        <?php foreach ($data['size'] as $size): ?>
                            <button type="button" class="btn btn-outline-dark"><?= $size ?></button>
                        <?php endforeach; ?>
                    </div>

                    <!-- Form thêm vào giỏ hàng -->
                    <form action="/cart/add" method="post" class="mt-3" id="add-to-cart-form">
                        <input type="hidden" name="method" value="POST">
                        <input type="hidden" name="id" value="<?= isset($data['product']['product_id']) ? $data['product']['product_id'] : '' ?>" required>
                        <input type="hidden" name="selected_color" id="selected_color" required>
                        <input type="hidden" name="selected_size" id="selected_size" required>
                        <button type="submit" class="btn btn-primary" disabled>Thêm vào giỏ hàng</button>
                    </form>

                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            const colorButtons = document.querySelectorAll('.color-buttons .btn');
                            const sizeButtons = document.querySelectorAll('.size-buttons .btn');
                            const selectedColorInput = document.getElementById('selected_color');
                            const selectedSizeInput = document.getElementById('selected_size');
                            const form = document.getElementById('add-to-cart-form');
                            const submitButton = form.querySelector('button[type="submit"]');

                            // Hàm kiểm tra nếu cả màu và kích thước đã được chọn
                            function checkSelections() {
                                if (selectedColorInput.value && selectedSizeInput.value) {
                                    submitButton.disabled = false; // Kích hoạt nút "Thêm vào giỏ hàng"
                                } else {
                                    submitButton.disabled = true; // Vô hiệu hóa nếu thiếu lựa chọn
                                }
                            }

                            // Xử lý chọn màu sắc
                            colorButtons.forEach(button => {
                                button.addEventListener('click', () => {
                                    const selectedColor = button.getAttribute('title'); // Lấy thuộc tính title làm giá trị màu
                                    selectedColorInput.value = selectedColor; // Lưu giá trị màu được chọn

                                    // Thêm hiệu ứng nút được chọn
                                    colorButtons.forEach(btn => btn.style.border = '2px solid transparent');
                                    button.style.border = '2px solid black';

                                    checkSelections(); // Kiểm tra sau khi chọn màu
                                });
                            });

                            // Xử lý chọn kích thước
                            sizeButtons.forEach(button => {
                                button.addEventListener('click', () => {
                                    const selectedSize = button.textContent.trim(); // Lấy giá trị text của nút làm kích thước
                                    selectedSizeInput.value = selectedSize; // Lưu giá trị kích thước được chọn

                                    // Thêm hiệu ứng nút được chọn
                                    sizeButtons.forEach(btn => btn.classList.remove('btn-dark'));
                                    button.classList.add('btn-dark');

                                    checkSelections(); // Kiểm tra sau khi chọn kích thước
                                });
                            });

                            // Đảm bảo kiểm tra trước khi gửi form
                            form.addEventListener('submit', function (event) {
                                if (!selectedColorInput.value || !selectedSizeInput.value) {
                                    alert('Vui lòng chọn màu sắc và kích thước trước khi thêm vào giỏ hàng.');
                                    event.preventDefault(); // Ngăn không cho form gửi đi
                                }
                            });

                            // Vô hiệu hóa nút submit khi tải trang
                            submitButton.disabled = true;
                        });
                    </script>
                </div>
            </div>
        </div>
        <?php
    }
}
