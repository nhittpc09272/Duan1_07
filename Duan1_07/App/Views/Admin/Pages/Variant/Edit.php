<?php

namespace App\Views\Admin\Pages\Variant;

use App\Views\BaseView;

class Edit extends BaseView
{
    public static function render($data = null)
    {
?>

        <!-- Page wrapper  -->
        <div class="page-wrapper" style="width: 100%;">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">QUẢN LÝ BIẾN THỂ</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Sửa biến thể</li>
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
            <!-- Container fluid -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form class="form-horizontal" action="/admin/variants/<?= $data['variant_id'] ?>" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">Sửa biến thể</h4>
                                    <input type="hidden" name="method" value="PUT">

                                    <!-- ID sản phẩm -->
                                    <div class="form-group">
                                        <label for="variant_id">ID</label>
                                        <input type="text" class="form-control" id="variant_id" name="variant_id" value="<?= $data['variant_id'] ?>" disabled>
                                    </div>
                                    <!-- ID sản phẩm -->
                                    <div class="form-group">
                                        <label for="product_id">ID Sản phẩm*</label>
                                        <input type="text" class="form-control" id="product_id" name="product_id" value="<?= $data['product_id'] ?>" required>
                                    </div>

                                    <!-- Tên sản phẩm -->
                                    <div class="form-group">
                                        <label for="size">Size*</label>
                                        <input type="text" class="form-control" id="size" placeholder="Nhập size..." name="size" value="<?= $data['size'] ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="color">Màu*</label>
                                        <input type="text" class="form-control" id="color" placeholder="Nhập màu..." name="color" value="<?= $data['color'] ?>" required>
                                    </div>
                                    <!-- Trạng thái -->
                                    <div class="form-group">
                                        <label for="status">Trạng thái*</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="status" name="status" required>
                                            <option value="" disabled>Vui lòng chọn...</option>
                                            <option value="1" <?= ($data['status'] == 1 ? 'selected' : '') ?>>Hiển thị</option>
                                            <option value="0" <?= ($data['status'] == 0 ? 'selected' : '') ?>>Ẩn</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Buttons -->
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="reset" class="btn btn-danger text-white">Làm lại</button>
                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Page Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid -->
            <!-- ============================================================== -->
        </div>


<?php
    }
}
