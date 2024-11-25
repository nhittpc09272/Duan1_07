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
                    <!-- Kiểm tra nếu có hình ảnh sản phẩm -->
                    <img src="<?= APP_URL ?>/public/assets/client/img/image/<?= $data['product']['image'] ?>" alt="" width="100%">
                </div>
                <div class="col-md-6">
                    <!-- Kiểm tra nếu có tên sản phẩm -->
                    <h5><?= isset($data['product']['product_name']) ? $data['product']['product_name'] : 'Tên sản phẩm không có' ?></h5>
                    <p>
                        <!-- Kiểm tra nếu có mô tả sản phẩm -->
                        <?= isset($data['product']['description']) ? $data['product']['description'] : 'Mô tả sản phẩm không có' ?>
                    </p>
                    <?php
                    // Kiểm tra nếu có giá giảm
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
                    <!-- Kiểm tra số lượt xem -->
                    <h6>Số lượt xem: <?= isset($data['product']['view']) ? $data['product']['view'] : 'Chưa có lượt xem' ?></h6>
                    <!-- Kiểm tra tên danh mục sản phẩm -->
                    <h6>Danh mục: <?= isset($data['product']['category_name']) ? $data['product']['category_name'] : 'Chưa có danh mục' ?></h6>
                    <!-- Form thêm vào giỏ hàng -->
                    <form action="#" method="post">
                        <input type="hidden" name="method" value="POST">
                        <input type="hidden" name="id" value="<?= isset($data['product']['id']) ? $data['product']['id'] : '' ?>" required>
                        <button type="submit" class="btn btn-sm btn-outline-success">Thêm vào giỏ hàng</button>
                    </form>
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
                            if (isset($data) && isset($data['comments']) && $data && $data['comments']) :
                                // Lặp qua từng bình luận trong danh sách.
                                foreach ($data['comments'] as $item) :
                            ?>

                                    <!-- Comment Row -->
                                    <div class="d-flex flex-row comment-row m-t-0">
                                        <div class="p-2">
                                            <?php
                                            if ($item['avatar']) :
                                            ?>
                                                <!-- Hiển thị hình ảnh của người dùng nếu có, nếu không có thì hiển thị ảnh mặc định. -->
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
                                            <!-- Hiển thị tên và tên người dùng của người bình luận -->
                                            <h6 class="font-medium"><?= $item['name'] ?> - <?= $item['username'] ?></h6>
                                            <!-- Hiển thị nội dung bình luận. -->
                                            <span class="m-b-15 d-block"><?= $item['content'] ?></span>
                                            <div class="comment-footer">
                                                <!-- Hiển thị ngày bình luận. -->
                                                <span class="text-muted float-right"><?= $item['date'] ?></span>

                                                <?php

                                                if (isset($data) && $is_login && ($_SESSION['user']['id'] == $item['user_id'])) :
                                                ?>

                                                    <button type="button" class="btn btn-cyan btn-sm" data-toggle="collapse" data-target="#<?= $item['username'] ?><?= $item['id'] ?>" aria-expanded="false" aria-controls="<?= $item['username'] ?><?= $item['id'] ?>">Sửa</button>
                                                    <form action="/comments/<?= $item['id'] ?>" method="post" onsubmit="return confirm('Chắc chưa?')" style="display: inline-block">
                                                        <input type="hidden" name="method" value="DELETE" id="">
                                                        <input type="hidden" name="product_id" value="<?= $data['product']['id'] ?>" id="">
                                                        <button type="submit" class="btn btn-danger btn-sm">Xoá</button>

                                                    </form>
                                                    <div class="collapse" id="<?= $item['username'] ?><?= $item['id'] ?>">
                                                        <div class="card card-body mt-5">
                                                            <form action="/comments/<?= $item['id'] ?>" method="post">
                                                                <input type="hidden" name="method" value="PUT" id="">
                                                                <input type="hidden" name="product_id" value="<?= $data['product']['id'] ?>" id="">
                                                                <div class="form-group">
                                                                    <label for="">Bình luận</label>
                                                                    <textarea class="form-control rounded-0" name="content" id="" rows="3" placeholder="Nhập bình luận..."><?= $item['content'] ?></textarea>
                                                                </div>
                                                                <div class="comment-footer">
                                                                    <button type="submit" class="btn btn-cyan btn-sm">Gửi</button>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                <?php
                                                endif;
                                                ?>

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
                                        <h6 class="font-medium"><?= $_SESSION['user']['name'] ?> - <?= $_SESSION['user']['username'] ?></h6>
                                        <form action="/comments" method="post">
                                            <!-- Xác định phương thức HTTP là POST. -->
                                            <input type="hidden" name="method" value="POST" id="" required>
                                            <!-- Lưu ID của sản phẩm mà bình luận liên quan -->
                                            <input type="hidden" name="product_id" id="product_id" value="<?= $data['product']['id'] ?>">
                                            <!-- Lưu ID của người dùng hiện tại. -->
                                            <input type="hidden" name="user_id" id="user_id" value="<?= $_SESSION['user']['id'] ?>">
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

