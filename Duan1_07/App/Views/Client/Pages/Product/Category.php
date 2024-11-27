<?php
// sản phẩm theo loại

namespace App\Views\Client\Pages\Product;


use App\Views\BaseView;
use App\Views\Client\Components\Category as ComponentsCategory;


class Category extends BaseView
{
    public static function render($data = null)
    {

?>


        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-3">
                    <?php
                    // Gọi phương thức render từ lớp ComponentsCategory để hiển thị danh sách các danh mục.
                    ComponentsCategory::render($data['categories']);
                    ?>
                </div>
                <div class="col-md-9">
                    <!-- <h1 class="text-center mb-3">Sản phẩm</h1> -->

                    <?php
                    // Kiểm tra nếu dữ liệu và danh sách sản phẩm tồn tại
                    if (isset($data) && isset($data['products']) && $data && $data['products']) :
                    ?>
                    <!-- Hiển thị tên danh mục sản phẩm từ dữ liệu đầu vào -->
                        <h1 class="text-center mb-3"><?= $data['products'][0]['category_name'] ?></h1> 

                        <div class="row">
                            <?php
                            // Lặp qua từng sản phẩm trong danh sách sản phẩm.
                            foreach ($data['products'] as $item) :
                                $price = $item['price'] ?? 0;
                                $discountPrice = $item['discount_price'] ?? 0;
                            ?>
                                <div class="col-md-4">
                                    <div class="card mb-4 shadow-sm">
                                        <img src="<?= APP_URL ?>/public/assets/client/img/image/<?= $item['image'] ?? 'default.jpg' ?>" class="card-img-top" alt="" style="width: 100%; display: block;" data-holder-rendered="true">
                                        <div class="card-body">
                                            <p class="card-text"><?= $item['category_name'] ?? 'Danh mục không xác định' ?></p>
                                            <?php if ($discountPrice > 0) : ?>
                                                <p>Giá gốc: <strike><?= number_format($price) ?> đ</strike></p>
                                                <p>Giá giảm: <strong class="text-danger"><?= number_format($price - $discountPrice) ?> đ</strong></p>
                                            <?php else : ?>
                                                <p>Giá tiền: <?= number_format($price) ?> đ</p>
                                            <?php endif; ?>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
<a href="/products/<?= $item['product_id'] ?>" type="button" class="btn btn-sm btn-outline-info h-50">Chi tiết</a>
                                                    <form action="#" method="post">
                                                        <input type="hidden" name="method" value="POST">
                                                        <button type="submit" class="btn btn-sm btn-outline-success">Thêm vào giỏ hàng</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            

                            ?>
                        </div>
                    <?php
                    else : //else: Nếu không có sản phẩm, hiển thị thông báo "Không có sản phẩm"
                    ?>
                        <h3 class="text-center text-danger">Không có sản phẩm</h3>

                    <?php
                    endif;
                    ?>
                </div>
            </div>



        </div>



<?php

    }
}