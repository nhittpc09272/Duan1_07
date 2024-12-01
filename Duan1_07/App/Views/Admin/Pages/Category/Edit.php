<?php

namespace App\Views\Admin\Pages\Category;

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
                        <h4 class="page-title">QUẢN LÝ LOẠI SẢN PHẨM</h4>
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
            <div class="page-wrapper">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="page-breadcrumb">
                    <div class="row">
                        <div class="col-12 d-flex no-block align-items-center">
                            <h4 class="page-title">QUẢN LÝ LOẠI SẢN PHẨM</h4>
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
                                <form class="form-horizontal" action="/admin/categories/<?= $data['categories_id'] ?>" method="POST">
                                    <div class="card-body">
                                        <h4 class="card-title">Sửa loại sản phẩm</h4>
                                        <input type="hidden" name="method" id="" value="PUT">
                                        <div class="form-group">
                                            <label for="id">ID</label>
                                            <input type="text" class="form-control" id="id" name="id" value="<?= $data['categories_id'] ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Tên*</label>
                                            <input type="text" class="form-control" id="name" placeholder="Nhập tên loại sản phẩm..." name="name" value="<?= $data['category_name'] ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Trạng thái*</label>
                                            <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="status" name="status" value="<?= $data['status'] ?>" required>
                                                <option value="" selected disabled>Vui lòng chọn...</option>
                                                <option value="1" <?= ($data['status'] == 1 ? 'selected' : '') ?>>Hiển thị</option>
                                                <option value="0" <?= ($data['status'] == 0 ? 'selected' : '') ?>>Ẩn</option>

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
