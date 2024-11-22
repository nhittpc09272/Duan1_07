<?php

namespace App\Views\Admin\Pages\Product;

use App\Views\BaseView;

class Index extends BaseView
{
    public static function render($data = null)
    {
?>
       <div class="page-wrapper" >
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
                            <li class="breadcrumb-item active" aria-current="page">Danh sách sản phẩm</li>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Danh sách sản phẩm</h5>
                        <?php
                        if (count($data)) :
                        ?>
                            <div class="table-responsive">
                                <table id="" class="table table-striped ">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Hình ảnh</th>
                                            <th>Tên</th>
                                            <th>Giá tiền</th>
                                            <th>Số lượng</th>
                                            <th>Trạng thái</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($data as $item) :
                                        ?>
                                            <tr>
                                                <td><?= $item['id'] ?></td>
                                                <td><img src="<?= $item['image'] ?>" alt="Hình sản phẩm" style="width: 50px; height: 50px;"></td>
                                                <td><?= $item['name'] ?></td>
                                                <td><?= number_format($item['price'], 0, ',', '.') ?> ₫</td>
                                                <td><?= $item['quantity'] ?></td>
                                                <td><?= ($item['status'] == 1) ? 'Hiển thị' : 'Ẩn' ?></td>
                                                <td>
                                                    <a href="/admin/products/<?= $item['id'] ?>" class="btn btn-primary ">Sửa</a>
                                                    <form action="/admin/products/<?= $item['id'] ?>" method="post" style="display: inline-block;" onsubmit="return confirm('Chắc chắn muốn xóa?')">
                                                        <input type="hidden" name="method" value="DELETE" id="">
                                                        <button type="submit" class="btn btn-danger text-white">Xoá</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php
                                        endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php
                        else :
                        ?>
                            <h4 class="text-center text-danger">Không có dữ liệu</h4>
                        <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->




    <?php
    }
}