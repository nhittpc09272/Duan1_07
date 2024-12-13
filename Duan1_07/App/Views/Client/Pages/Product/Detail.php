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
                        <?php foreach ($data['colors'] as $color): ?>
                            <button
                                type="button"
                                class="btn color-btn"
                                style="background-color: <?= $color ?>; outline: none; box-shadow: none;"
                                title="<?= $color ?>"
                                data-color="<?= $color ?>"></button>
                        <?php endforeach; ?>
                    </div>

                    <!-- Hiển thị hình ảnh cho mỗi màu sắc -->
                    <div class="color-image mt-3">
                        <?php foreach ($data['colors'] as $color): ?>
                            <div class="color-option" data-color="<?= strtolower($color) ?>"
                                style="background-image: url('<?= APP_URL ?>/public/assets/client/img/image/<?= $data['product']['image'] ?>'); 
                                       background-size: cover; 
                                       background-position: center;
                                       width: 70px; height: 70px; display: none;">
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Hiển thị nút kích thước -->
                    <h5 class="mt-3">Chọn kích thước:</h5>
                    <div class="size-buttons">
                        <?php foreach ($data['sizes'] as $size): ?>
                            <button type="button" class="btn btn-outline-dark size-btn"><?= $size ?></button>
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

                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const colorButtons = document.querySelectorAll('.color-buttons .btn');
                const sizeButtons = document.querySelectorAll('.size-buttons .btn');
                const selectedColorInput = document.getElementById('selected_color');
                const selectedSizeInput = document.getElementById('selected_size');
                const form = document.getElementById('add-to-cart-form');
                const submitButton = form.querySelector('button[type="submit"]');
                const colorImages = document.querySelectorAll('.color-image .color-option');

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
                        const selectedColor = button.getAttribute('data-color');
                        selectedColorInput.value = selectedColor;

                        colorImages.forEach(image => {
                            image.style.display = (image.getAttribute('data-color') === selectedColor.toLowerCase()) ? 'block' : 'none';
                        });

                        colorButtons.forEach(btn => btn.style.border = '2px solid transparent');
                        button.style.border = '2px solid black'; // Đổi viền nút khi chọn

                        checkSelections();
                    });
                });

                // Xử lý chọn kích thước
                sizeButtons.forEach(button => {
                    button.addEventListener('click', () => {
                        const selectedSize = button.textContent.trim();
                        selectedSizeInput.value = selectedSize;

                        sizeButtons.forEach(btn => btn.classList.remove('btn-dark'));
                        button.classList.add('btn-dark'); // Đổi màu nút khi chọn kích thước

                        checkSelections();
                    });
                });

                // Đảm bảo kiểm tra trước khi gửi form
                form.addEventListener('submit', function(event) {
                    if (!selectedColorInput.value || !selectedSizeInput.value) {
                        alert('Vui lòng chọn màu sắc và kích thước trước khi thêm vào giỏ hàng.');
                        event.preventDefault(); // Ngừng gửi form nếu không có màu sắc hoặc kích thước
                    }
                });

                submitButton.disabled = true; // Vô hiệu hóa nút "Thêm vào giỏ hàng" khi chưa chọn đủ
            });
        </script>

<?php
    }
}
