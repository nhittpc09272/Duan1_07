<?php

namespace App\Views\Admin\Pages\Product;

use App\Views\BaseView;

class Edit extends BaseView
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
                        <h4 class="page-title">QUẢN LÝ SẢN PHẨM</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Sửa loại sản phẩm</li>
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
                            <form class="form-horizontal" action="/admin/products/<?= $data['products']['product_id'] ?>" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">Sửa sản phẩm</h4>
                                    <input type="hidden" name="method" id="" value="PUT">

                                    <div align="center">
                                        <img src="<?= APP_URL ?>/public/uploads/products/<?= $data['products']['image'] ?>" alt="" width="300px">
                                    </div>
                                    <div class="form-group">
                                        <label for="id">ID</label>
                                        <input type="text" class="form-control" id="id" name="id" value="<?= $data['products']['product_id'] ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="product_name">Tên*</label>
                                        <input type="text" class="form-control" id="product_name" placeholder="Nhập tên loại sản phẩm..." name="product_name" value="<?= $data['products']['product_name'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Hình ảnh</label>
                                        <input type="file" class="form-control" id="image" placeholder="Chọn hình sản phẩm..." name="image">
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Giá tiền*</label>
                                        <input type="number" class="form-control" id="price" placeholder="Nhập giá sản phẩm..." name="price" value="<?= $data['products']['price'] ?>" require>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="discount_price">Giá giảm*</label>
                                        <input type="number" class="form-control" id="discount_price" placeholder="Nhập giá giảm sản phẩm..." name="discount_price" value="<= $data['product']['discount_price'] ?>" require>
                                    </div> -->
                                    <div class="form-group">
                                        <label for="description">Mô tả</label>
                                        <textarea class="form-control" id="description" placeholder="Nhập mô tả sản phẩm..." name="description"><?= $data['products']['description'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">Loại sản phẩm*</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="categories_id" name="categories_id" require>
                                            <option value="" selected disabled>Vui lòng chọn...</option>
                                            <?php
                                            foreach ($data['categories'] as $item) :
                                            ?>
                                                <option value="<?= $item['categories_id'] ?>" <?= ($item['categories_id'] == $data['products']['category_id']) ? 'selected' : '' ?>><?= $item['category_name'] ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>

                                    <!-- <div class="form-group">
                                        <label for="is_feature">Nổi bậc*</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="is_feature" name="is_feature" require>
                                            <option value="" selected disabled>Vui lòng chọn...</option>
                                            <option value="1" <= ($data['products']['is_feature'] == 1 ? 'selected' : '') ?>>Nổi bậc</option>
                                            <option value="0" <= ($data['products']['is_feature'] == 0 ? 'selected' : '') ?>>Không</option>

                                        </select> -->
                                </div>
                                <div class="form-group">
                                    <label for="status">Trạng thái*</label>
                                    <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="status" name="status" value="<?= $data['status'] ?>" required>
                                        <option value="" selected disabled>Vui lòng chọn...</option>
                                        <option value="1" <?= ($data['products']['status'] == 1 ? 'selected' : '') ?>>Hiển thị</option>
                                        <option value="0" <?= ($data['products']['status'] == 0 ? 'selected' : '') ?>>Ẩn</option>

                                    </select>
                                </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="reset" class="btn btn-danger text-white" name="">Làm lại</button>
                                <button type="submit" class="btn btn-primary" name="">Cập nhật</button>
                            </div>
                        </div>
                        </form>
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

                <!-- ============================================================== -->
                <!-- End Container fluid  -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->

        <?php
    }
}
