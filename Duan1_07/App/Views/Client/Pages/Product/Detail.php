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
                            <button type="button" class="btn" style="background-color: <?= $color ?>;" title="<?= $color ?>"></button>
                        <?php endforeach; ?>
                    </div>



                    <div class="color-image">
                        <?php foreach ($data['colors'] as $color): ?>
                            <label selectid="color"
                                data-option="<?= strtolower($color) ?>"
                                selectedtext="<?= $color ?>"
                                style="background-image: url('<?= APP_URL ?>/public/assets/client/img/image/<?= $data['product']['image'] ?>'); 
                                       background-size: cover; 
                                       background-position: center;
                                       width: 70px; height: 70px;"
                                title="<?= $color ?>">
                            </label>
                        <?php endforeach; ?>
                    </div>


                    <!-- Hiển thị nút kích thước -->
                    <h5 class="mt-3">Chọn kích thước:</h5>
                    <div class="size-buttons">
                        <?php foreach ($data['sizes'] as $size): ?>
                            <button type="button" class="btn btn-outline-dark"><?= $size ?></button>
                        <?php endforeach; ?>
                    </div>


                    <!-- Form thêm vào giỏ hàng -->
                    <form action="/cart/add" method="post" class="mt-3">
                        <input type="hidden" name="method" value="POST">
                        <input type="hidden" name="id" value="<?= isset($data['product']['product_id']) ? $data['product']['product_id'] : '' ?>" required>
                        <button type="submit" class="btn btn-primary">Thêm vào giỏ hàng</button>
                    </form>


                    <!-- Bảng size giày -->
                    <div class="container mt-5">
                        <h2 class="text-center mb-4">Shoe Size Chart</h2>
                        <table class="table table-bordered table-hover text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">US Size</th>
                                    <th scope="col">EU Size</th>
                                    <th scope="col">UK Size</th>
                                    <th scope="col">Foot Length (cm)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Dữ liệu bảng size giày
                                $shoe_sizes = [
                                    ['us' => 6, 'eu' => 39, 'uk' => 5.5, 'length' => 24.1],
                                    ['us' => 7, 'eu' => 40, 'uk' => 6.5, 'length' => 24.8],
                                    ['us' => 8, 'eu' => 41, 'uk' => 7.5, 'length' => 25.4],
                                    ['us' => 9, 'eu' => 42, 'uk' => 8.5, 'length' => 26.0],
                                    ['us' => 10, 'eu' => 43, 'uk' => 9.5, 'length' => 26.7],
                                    ['us' => 11, 'eu' => 44, 'uk' => 10.5, 'length' => 27.3],
                                ];

                                // Lặp qua mảng và hiển thị dữ liệu
                                foreach ($shoe_sizes as $size) {
                                    echo "
                                <tr>
                                <td>{$size['us']}</td>
                                <td>{$size['eu']}</td>
                                <td>{$size['uk']}</td>
                                <td>{$size['length']}</td>
                                </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="row d-flex justify-content-center mt-100 mb-100">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body text-center">
                        <h4 class="card-title">Bình luận mới nhất</h4>
                    </div>
                    <div class="comment-widgets">
                        <?php
                        // Kiểm tra nếu có dữ liệu bình luận.
                        if (isset($data) && isset($data['comments']) && $data['comments']) :
                            // Lặp qua từng bình luận trong danh sách.
                            foreach ($data['comments'] as $item) :
                        ?>

                                <!-- Comment Row -->
                                <div class="d-flex flex-row comment-row m-t-0">
                                    <div class="p-2">
                                        <?php
                                        if ($item['avatar']) :
                                        ?>
                                            <img src="<?= APP_URL ?>/public/uploads/users/<?= $item['avatar'] ?>" alt="user" width="50" class="rounded-circle">
                                        <?php
                                        else :
                                        ?>
                                            <img src="<?= APP_URL ?>/public/uploads/users/default-user.jpg" alt="user" width="50" class="rounded-circle">
                                        <?php
                                        endif;
                                        ?>
                                    </div>

                                    <div class="comment-text w-100">
                                        <h6 class="font-medium"><?= $item['username'] ?> - <?= $item['username'] ?></h6>
                                        <span class="m-b-15 d-block"><?= $item['content'] ?></span>
                                        <div class="comment-footer">
                                            <span class="text-muted float-right"><?= $item['date'] ?></span>
                                        </div>
                                    </div>
                                </div>

                            <?php
                            endforeach;
                        else :
                            ?>
                            <h6 class="text-center text-danger">Chưa có bình luận</h6>
                        <?php
                        endif;
                        ?>

                        <?php
                        // Kiểm tra nếu người dùng đã đăng nhập.
                        if (isset($data) && $is_login) :
                        ?>

                            <div class="d-flex flex-row comment-row">

                                <div class="p-2">

                                    <?php
                                    if ($_SESSION['user']['avatar']) :
                                    ?>
                                        <!-- Hiển thị hình ảnh của người dùng hiện tại nếu có, nếu không có thì hiển thị ảnh mặc định -->
                                        <img src="<?= APP_URL ?>/public/uploads/users/<?= $_SESSION['user']['avatar'] ?>" alt="user" width="50" class="rounded-circle">

                                    <?php
                                    else :
                                    ?>
                                        <img src="<?= APP_URL ?>/public/uploads/users/default-user.jpg" alt="user" width="50" class="rounded-circle">
                                    <?php
                                    endif;
                                    ?>
                                </div>
                                <div class="comment-text w-100">
                                    <h6 class="font-medium"><?= $_SESSION['user']['username'] ?> - <?= $_SESSION['user']['username'] ?></h6>
                                    <form action="/comments" method="post">
                                        <!-- Xác định phương thức HTTP là POST. -->
                                        <input type="hidden" name="method" value="POST" id="" required>
                                        <!-- Lưu ID của sản phẩm mà bình luận liên quan -->
                                        <input type="hidden" name="product_id" id="product_id" value="<?= $data['product']['product_id'] ?>">
                                        <!-- Lưu ID của người dùng hiện tại. -->
                                        <input type="hidden" name="user_id" id="user_id" value="<?= $_SESSION['user']['user_id'] ?>">
                                        <div class="form-group">
                                            <label for="content">Bình luận</label>
                                            <textarea class="form-control rounded-0" name="content" id="" rows="3" placeholder="Nhập bình luận..."></textarea>
                                        </div>
                                        <div class="comment-footer">
                                            <button type="submit" class="btn btn-cyan btn-sm">Gửi</button>
                                        </div>
                                    </form>

                                </div>
                            </div>


                        <?php
                        else :
                        ?>

                            <h6 class="text-center text-danger">Vui lòng đăng nhập để bình luận</h6>

                        <?php
                        endif;
                        ?>
                    </div>


                </div>
            </div>
        </div>
        </div>



<?php

    }
}
