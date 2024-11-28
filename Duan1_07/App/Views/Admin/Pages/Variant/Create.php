<?php

namespace App\Views\Admin\Pages\Variant;

use App\Views\BaseView;

class Create extends BaseView
{
    public static function render($data = null)
    {
        
?>
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
                                    <li class="breadcrumb-item active" aria-current="page">Thêm biến thể</li>
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
                            <form class="form-horizontal" action="/admin/variants" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">Thêm biến thể</h4>
                                    <input type="hidden" name="method" value="POST">

                                    <!-- Chọn sản phẩm -->
                                    <div class="form-group">
                                        <label for="product_id">Sản phẩm</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="product_id" name="product_id" required>
                                            <option value="" selected disabled>Vui lòng chọn...</option>
                                            <?php if (!empty($data['products'])): ?>
                                                <?php foreach ($data['products'] as $product): ?>
                                                    <option value="<?= htmlspecialchars($product['product_id']) ?>">
                                                        <?= htmlspecialchars($product['product_name']) ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <option value="" disabled>Không có sản phẩm nào</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>



                                    <!-- Tên biến thể -->
                                    <div class="form-group">
                                        <label for="size">Size</label>
                                        <input type="text" class="form-control" id="size" placeholder="Nhập size..." name="size" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="color">Màu</label>
                                        <input type="text" class="form-control" id="color" placeholder="Nhập màu..." name="color" required>
                                    </div>

                                    <!-- Trạng thái -->
                                    <div class="form-group">
                                        <label for="status">Trạng thái*</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="status" name="status" required>
                                            <option value="" selected disabled>Vui lòng chọn...</option>
                                            <option value="1">Hiển thị</option>
                                            <option value="0">Ẩn</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Buttons -->
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="reset" class="btn btn-danger text-white">Làm lại</button>
                                        <button type="submit" class="btn btn-primary">Thêm</button>
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



    <?php
    }
}
