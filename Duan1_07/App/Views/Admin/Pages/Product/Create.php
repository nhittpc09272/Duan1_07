<?php

namespace App\Views\Admin\Pages\Product;

use App\Views\BaseView;

class Create extends BaseView
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

        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">QUẢN LÝ Sản Phẩm</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Thêm Sản Phẩm</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form class="form-horizontal" action="/admin/products" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">Thêm Sản Phẩm</h4>
                                    <input type="hidden" name="method" id="" value="POST">
                                    <div class="form-group">
                                        <label for="product_name">Tên*</label>
                                        <input type="text" class="form-control" id="product_name" placeholder="Nhập tên Sản Phẩm..." name="product_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Hình Ảnh</label>
                                        <input type="file" class="form-control" id="image" placeholder="Nhập Chọn hình ảnh..." name="image">
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Giá Tiền*</label>
                                        <input type="number" class="form-control" id="price" placeholder="Nhập Giá Tiền..." name="price">
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="discount_price">Giá Giảm*</label>
                                        <input type="number" class="form-control" id="discount_price" placeholder="Nhập Giá Giảm..." name="discount_price" >
                                    </div> -->
                                    <div class="form-group">
                                        <label for="description">Mô tả </label>
                                        <textarea class="form-control" id="description" placeholder="Nhập Mô tả..." name="description"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="stock_quantity">số lượng *</label>
                                        <input type="number" class="form-control" id="stock_quantity" placeholder="Nhập Giá Tiền..." name="stock_quantity">
                                    </div>
                                    <div class="form-group">
                                        <label for="categories_id">Loại Sản Phẩm *</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="categories_id" name="categories_id">
                                            <?php
                                            foreach ($data as $item):
                                            ?>
                                                <option value="<?= $item['categories_id'] ?>"> <?= $item['category_name'] ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                            <!-- <option value="1">Loại...</option> -->
                                            <!-- <option value="0">Ẩn</option> -->

                                        </select>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="is_feature">Nổi Bậc*</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="is_feature" name="is_feature" >
                                            <option value="" selected disabled>Vui lòng chọn...</option>
                                            <option value="1">Nổi Bậc</option>
                                            <option value="0">Bình Thường</option>

                                        </select>
                                    </div> -->

                                    <div class="form-group">
                                        <label for="status">Trạng thái*</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="status" name="status">
                                            <option value="" selected disabled>Vui lòng chọn...</option>
                                            <option value="1">Hiển thị</option>
                                            <option value="0">Ẩn</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="reset" class="btn btn-danger text-white" name="">Làm lại</button>
                                        <button type="submit" class="btn btn-primary" name="">Thêm</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->

    <?php
    }
}
