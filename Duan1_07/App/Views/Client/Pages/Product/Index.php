<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;
use App\Views\Client\Components\Category;

class Index extends BaseView
{
    public static function render($data = null)
    {
?>


        <!-- Start Banner Area -->
        <section class="banner-area organic-breadcrumb">
            <div class="container">
                <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-start">
                    <h1 class="text-white font-weight-bold">Trang Danh Mục Sản Phẩm</h1>
                </div>
            </div>
        </section>
        <!-- End Banner Area -->

        <div class="container mt-5">
            <div class="row">
                <!-- Sidebar Categories -->
                <div class="col-xl-3 col-lg-4 col-md-5 mb-5">
                    <div class="sidebar-categories">

                        <!-- <ul class="list-group"> -->
                        <?php
                        // Gọi phương thức render của lớp Category để hiển thị danh mục sản phẩm từ dữ liệu $data['categories'].
                        Category::render($data['categories']);
                        ?>
                        </ul>
                    </div>
                </div>


                <!-- Product Display Area -->
                <div class="col-xl-9 col-lg-8 col-md-7">
                    <div class="filter-bar d-flex justify-content-between align-items-center mb-4">
                        <div class="sorting">
                            <select class="form-control">
                                <option value="1">Sắp xếp theo mặc định</option>
                                <option value="2">Sắp xếp theo giá: Thấp đến Cao</option>
                                <option value="3">Sắp xếp theo giá: Cao đến Thấp</option>
                                <option value="4">Sắp xếp theo đánh giá</option>
                                <option value="5">Sắp xếp theo phổ biến</option>
                            </select>
                        </div>
                        <div class="sorting">
                            <select class="form-control">
                                <option value="12">Hiển thị 12 sản phẩm</option>
                                <option value="24">Hiển thị 24 sản phẩm</option>
                                <option value="36">Hiển thị 36 sản phẩm</option>
                            </select>
                        </div>
                    </div>

                    <!-- Start Product List -->
                    <div class="row">
                        <?php
                        if (count($data) && count($data['products'])) :
                            foreach ($data['products'] as $item) :
                        ?>
                                <div class="col-md-4 mb-4">
                                    <div class="card shadow border-0 rounded-lg">
                                        <img class="img-fluid card-img-top" src="<?= APP_URL ?>/public/assets/client/img/image/<?= $item['image'] ?>" alt="<?= $item['product_name'] ?>" style="height: 250px; object-fit: cover;">
                                        <div class="card-body">
                                            <h5 class="card-title text-dark"><?= $item['product_name'] ?></h5>
                                            <div class="price">
                                                <?php
                                                if (isset($item['discount_price']) && $item['discount_price'] > 0) :
                                                ?>
                                                    <p><span class="text-danger font-weight-bold"><?= number_format($item['price'] - $item['discount_price']) ?> đ</span> <del class="text-muted"><?= number_format($item['price']) ?> đ</del></p>
                                                <?php else : ?>
                                                    <p class="text-success font-weight-bold">Giá: <?= number_format($item['price']) ?> đ</p>
                                                <?php endif; ?>
                                            </div>
                                            <div class="prd-bottom d-flex justify-content-between align-items-center mt-3">
                                                <!-- Round Buttons -->
                                                <a href="#" class="btn btn-primary btn-sm rounded-circle" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                                    <span class="ti-bag" style="font-size: 20px;"></span>
                                                </a>
                                                <a href="#" class="btn btn-outline-danger btn-sm rounded-circle" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                                    <span class="lnr lnr-heart" style="font-size: 20px;"></span>
                                                </a>
                                                <a href="/products/<?= $item['product_id'] ?>" class="btn btn-outline-info btn-sm rounded-circle" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                                    <span class="lnr lnr-move" style="font-size: 20px;"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            endforeach;
                        else :
                            ?>
                            <h3 class="text-center text-danger">Không có sản phẩm</h3>
                        <?php endif; ?>
                    </div>
                    <!-- End Product List -->

                </div>
            </div>
        </div>

<?php
    }
}
?>