<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;
use App\Views\Client\Components\Category;

class Index extends BaseView
{
    public static function render($data = null)
    {
?>
        <!-- Kiểm tra và hiển thị thông báo -->
        <?php if (isset($_SESSION['notification'])): ?>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                Swal.fire({
                    icon: '<?php echo $_SESSION['notification']['type']; ?>',
                    title: '<?php echo $_SESSION['notification']['message']; ?>',
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>
            <?php unset($_SESSION['notification']); // Xóa thông báo sau khi hiển thị 
            ?>
        <?php endif; ?>
        <style>
            .sidebar-categories {
                background-color: white;
                border-radius: 12px;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
                padding: 20px;
            }

            .category-list {
                list-style: none;
                padding: 0;
                margin: 0;
            }

            .category-item {
                margin-bottom: 10px;
            }

            .category-link {
                display: flex;
                align-items: center;
                padding: 12px 15px;
                border-radius: 8px;
                color: #333;
                text-decoration: none;
                transition: all 0.3s ease;
                font-weight: 500;
            }

            .category-link:hover,
            .category-link.active {
                background-color: #3498db;
                color: white;
                transform: translateX(10px);
            }

            .category-link i {
                margin-right: 12px;
                color: #3498db;
                font-size: 18px;
            }

            .category-link:hover i,
            .category-link.active i {
                color: white;
            }

            .category-count {
                margin-left: auto;
                background-color: #e8f4f8;
                color: #3498db;
                padding: 4px 8px;
                border-radius: 15px;
                font-size: 12px;
                font-weight: bold;
            }

            .category-link:hover .category-count,
            .category-link.active .category-count {
                background-color: white;
                color: #3498db;
            }

            @media (max-width: 768px) {
                .sidebar-categories {
                    margin-bottom: 20px;
                }
            }
        </style>

        <div class="container mt-5">
            <div class="row">
                <!-- Sidebar Categories -->
                <di<div class="sidebar-categories">
                    <h5 class="mb-4" style="font-weight: 600; color: #333;">
                        <i class="fas fa-tags me-2" style="color: #3498db;"></i>Danh Mục Sản Phẩm
                    </h5>
                    <ul class="category-list">
                        <?php
                        // Giả sử $data['categories'] chứa danh sách danh mục
                        if (!empty($data['categories'])):
                            foreach ($data['categories'] as $category):
                        ?>
                                <li class="category-item">
                                    <a href="/category/<?= $category['category_id'] ?>"
                                        class="category-link <?= isset($data['current_category']) && $data['current_category'] == $category['category_id'] ? 'active' : '' ?>">
                                        <i class="<?= $category['icon'] ?? 'fas fa-folder' ?>"></i>
                                        <?= $category['category_name'] ?>
                                        <span class="category-count">
                                            <?= $category['product_count'] ?? 0 ?>
                                        </span>
                                    </a>
                                </li>
                            <?php
                            endforeach;
                        else:
                            ?>
                            <li class="text-center text-muted">
                                Không có danh mục
                            </li>
                        <?php endif; ?>
                    </ul>
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
​