<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;
use App\Views\Client\Components\Category;

class Index extends BaseView
{
    public static function render($data = null)
    {

?>
        <?php if (isset($_SESSION['notification'])): ?>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                Swal.fire({
                    icon: '<?= $_SESSION['notification']['type'] ?>',
                    title: '<?= $_SESSION['notification']['message'] ?>',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    // Chuyển hướng về trang sản phẩm sau khi hiển thị thông báo
                    window.location.href = "/products";
                });
            </script>
            <?php unset($_SESSION['notification']); // Xóa thông báo sau khi hiển thị 
            ?>
        <?php endif; ?>

        <div class="container mt-5">
            <div class="row">
                <!-- Sidebar Categories -->
                <div class="col-xl-3 col-lg-4 col-md-5 mb-5">
                    <div class="sidebar-categories">
                        <?php
                        // Gọi phương thức render của lớp Category để hiển thị danh mục sản phẩm từ dữ liệu $data['categories'].
                        Category::render($data['categories']);
                        ?>
                    </div>
                </div>



                <!-- Product Display Area -->
                <div class="col-xl-9 col-lg-8 col-md-7">
                    <!-- Transparent Wrapper -->
                    <div class="p-3 border rounded mb-4"
                        style="background-color: rgba(255, 255, 255, 0.7); border: 1px solid rgba(248, 187, 208, 0.5);">
                        <!-- Filter Bar -->
                        <div class="filter-bar shadow-sm"
                            style="background-color: #FFA87A; border: 1px solid #F8BBD0;">
                            <div class="d-flex gap-3">
                                <!-- Sorting Dropdown -->
                                <div class="sorting">
                                    <select class="form-select mt-3" style="flex: 1; background-color: #FFF6F6; color: #555; border: 1px solid #FEC5E5; height: 40px; border-radius: 5px; margin-right: 10px;">

                                        <option value="1">Sắp xếp theo mặc định</option>
                                        <option value="2">Sắp xếp theo giá: Thấp đến Cao</option>
                                        <option value="3">Sắp xếp theo giá: Cao đến Thấp</option>
                                        <option value="4">Sắp xếp theo đánh giá</option>
                                        <option value="5">Sắp xếp theo phổ biến</option>
                                    </select>
                                </div>
                                <!-- Products per Page Dropdown -->
                                <div class="sorting">
                                    <select class="form-select mt-3" style="flex: 1; background-color: #FFF6F6; color: #555; border: 1px solid #FEC5E5; height: 40px; border-radius: 5px; margin-right: 10px;">

                                        <option value="12">12 sản phẩm</option>
                                        <option value="24">24 sản phẩm</option>
                                        <option value="36">36 sản phẩm</option>
                                    </select>
                                </div>
                                <div class="search-bar">
                                    <form class="d-flex mt-4" style="flex: 1;" action="/search" method="GET">
                                        <input type="text"
                                            placeholder="Tìm kiếm sản phẩm..."
                                            name="query"
                                            style="flex: 1; background-color: #FFF6F6; color: #555; border: 1px solid #FEC5E5; height: 40px; padding: 5px 10px; border-radius: 5px; margin-right: 10px;">
                                        <input type="submit"
                                            name="submit"
                                            value="Tìm kiếm"
                                            style="background-color: #F48FB1; color: white; border: none; height: 40px; padding: 5px 20px; border-radius: 5px; cursor: pointer;">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Start Product List -->
                    <div class="row">
                        <?php
                        if (count($data) && count($data['products'])) :
                            foreach ($data['products'] as $item) :
                        ?>
                                <div class="col-md-4 mb-4">
                                    <div class="card border-0 rounded-lg shadow-sm"
                                        style="transition: transform 0.3s ease; overflow: hidden;"
                                        onmouseover="this.style.transform='scale(1.05)';"
                                        onmouseout="this.style.transform='scale(1)';">
                                        <!-- Hình ảnh sản phẩm -->
                                        <img class="img-fluid card-img-top"
                                            src="<?= APP_URL ?>/public/assets/client/img/image/<?= $item['image'] ?>"
                                            alt="<?= $item['product_name'] ?>"
                                            style="height: 250px; object-fit: cover;">

                                        <!-- Nội dung sản phẩm -->
                                        <div class="card-body">
                                            <h5 class="card-title text-dark font-weight-bold"><?= $item['product_name'] ?></h5>
                                            <div class="price">
                                                <?php if (isset($item['discount_price']) && $item['discount_price'] > 0): ?>
                                                    <p>
                                                        <span class="text-danger font-weight-bold"><?= number_format($item['price'] - $item['discount_price']) ?> đ</span>
                                                        <del class="text-muted"><?= number_format($item['price']) ?> đ</del>
                                                    </p>
                                                <?php else: ?>
                                                    <p class="text-success font-weight-bold">Giá: <?= number_format($item['price']) ?> đ</p>
                                                <?php endif; ?>
                                            </div>

                                            <!-- Nút hành động -->
                                            <div class="prd-bottom d-flex justify-content-between align-items-center mt-3">
                                                <a href="#"
                                                    class="btn rounded-circle d-flex align-items-center justify-content-center shadow-sm"
                                                    style="background-color: #A7C7E7; width: 45px; height: 45px;"
                                                    onmouseover="this.style.transform='scale(1.2)';"
                                                    onmouseout="this.style.transform='scale(1)';">
                                                    <i class="bi bi-bag-fill"></i>
                                                </a>
                                                <a href="#"
                                                    class="btn rounded-circle d-flex align-items-center justify-content-center shadow-sm"
                                                    style="background-color: #F1A7B6; width: 45px; height: 45px;"
                                                    onmouseover="this.style.transform='scale(1.2)';"
                                                    onmouseout="this.style.transform='scale(1)';">
                                                    <i class="bi bi-heart"></i>
                                                </a>
                                                <a href="/products/<?= $item['product_id'] ?>"
                                                    class="btn rounded-circle d-flex align-items-center justify-content-center shadow-sm"
                                                    style="background-color: #A8D8B9; width: 45px; height: 45px;"
                                                    onmouseover="this.style.transform='scale(1.2)';"
                                                    onmouseout="this.style.transform='scale(1)';">
                                                    <i class="bi bi-eye"></i>
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