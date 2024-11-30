<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;
use App\Views\Client\Components\Category;

class Index extends BaseView
{
    public static function render($data = null)
    {
?>
<div class="container mt-5">
  <div class="row">
    <!-- Sidebar Categories -->
    <div class="col-xl-3 col-lg-4 col-md-5 mb-5">
      <div class="sidebar-categories">
        <?php
        // Hiển thị danh mục sản phẩm
        if (isset($data['categories'])) {
          Category::render($data['categories']);
        }
        ?>
      </div>
    </div>

    <!-- Product Display Area -->
    <div class="col-xl-9 col-lg-8 col-md-7">

      <!-- Product List -->
      <div class="row">
        <?php
        if (isset($data['products']) && count($data['products'])) {
          foreach ($data['products'] as $item) {
        ?>
            <div class="col-md-4 mb-4">
              <div class="card border-0 rounded-lg shadow-sm h-100">
                <!-- Product Image -->
                <img class="img-fluid card-img-top" 
                     src="<?= APP_URL ?>/public/assets/client/img/image/<?= $item['image'] ?>" 
                     alt="<?= $item['product_name'] ?>" 
                     style="height: 250px; object-fit: cover;">

                <!-- Product Details -->
                <div class="card-body">
                  <h5 class="card-title text-dark"><?= $item['product_name'] ?></h5>
                  <div class="price">
                    <?php if (isset($item['discount_price']) && $item['discount_price'] > 0) { ?>
                      <p>
                        <span class="text-danger fw-bold"><?= number_format($item['price'] - $item['discount_price']) ?> đ</span>
                        <del class="text-muted"><?= number_format($item['price']) ?> đ</del>
                      </p>
                    <?php } else { ?>
                      <p class="text-success fw-bold">Giá: <?= number_format($item['price']) ?> đ</p>
                    <?php } ?>
                  </div>
                </div>

                <!-- Action Buttons -->
                <div class="card-footer bg-white border-0 d-flex justify-content-around">
                  <a href="#" class="btn btn-outline-primary rounded-circle shadow-sm">
                    <i class="bi bi-bag-fill"></i>
                  </a>
                  <a href="#" class="btn btn-outline-danger rounded-circle shadow-sm">
                    <i class="bi bi-heart"></i>
                  </a>
                  <a href="/products/<?= $item['product_id'] ?>" class="btn btn-outline-success rounded-circle shadow-sm">
                    <i class="bi bi-eye"></i>
                  </a>
                </div>
              </div>
            </div>
        <?php
          }
        } else {
          echo '<h3 class="text-center text-danger">Không có sản phẩm</h3>';
        }
        ?>
      </div>
    </div>
  </div>
</div>
<?php
    }
}
?>