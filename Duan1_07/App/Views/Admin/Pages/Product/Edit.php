<?php

namespace App\Views\Admin\Pages\Product;

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
                <h4 class="page-title">QUẢN LÝ SẢN PHẨM</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sửa sản phẩm</li>
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
                    <form class="form-horizontal" action="/admin/products/<?= $data['id'] ?>" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <h4 class="card-title">Sửa sản phẩm</h4>
                            <input type="hidden" name="method" value="PUT">

                            <!-- ID sản phẩm -->
                            <div class="form-group">
                                <label for="id">ID</label>
                                <input type="text" class="form-control" id="id" name="id" value="<?= $data['id'] ?>" disabled>
                            </div>

                            <!-- Tên sản phẩm -->
                            <div class="form-group">
                                <label for="name">Tên sản phẩm*</label>
                                <input type="text" class="form-control" id="name" placeholder="Nhập tên sản phẩm..." name="name" value="<?= $data['name'] ?>" required>
                            </div>

                            <!-- Hình ảnh sản phẩm -->
                            <div class="form-group">
                                <label for="image">Hình ảnh (tùy chọn cập nhật)</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                <?php if (!empty($data['image'])): ?>
                                    <img src="<?= $data['image'] ?>" alt="Hình ảnh sản phẩm" style="width: 150px; margin-top: 10px;">
                                <?php endif; ?>
                            </div>

                            <!-- Giá tiền -->
                            <div class="form-group">
                                <label for="price">Giá tiền (VNĐ)*</label>
                                <input type="number" class="form-control" id="price" placeholder="Nhập giá tiền sản phẩm..." name="price" value="<?= $data['price'] ?>" min="0" required>
                            </div>

                            <!-- Số lượng -->
                            <div class="form-group">
                                <label for="quantity">Số lượng*</label>
                                <input type="number" class="form-control" id="quantity" placeholder="Nhập số lượng sản phẩm..." name="quantity" value="<?= $data['quantity'] ?>" min="0" required>
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