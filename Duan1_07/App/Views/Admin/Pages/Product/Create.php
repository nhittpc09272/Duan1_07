<?php

namespace App\Views\Admin\Pages\Product;

use App\Views\BaseView;

class Create extends BaseView
{
    public static function render($data = null)
    {
?>
        <!DOCTYPE html>
        <html lang="vi">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Thêm Sản Phẩm</title>
            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <!-- Custom CSS -->
            <style>
                body {
                    font-family: 'Arial', sans-serif;
                    background-color: #f8f9fa;
                }

                .card-title {
                    font-weight: bold;
                    text-transform: uppercase;
                }

                .btn-primary {
                    background-color: #007bff;
                    border-color: #007bff;
                }

                .btn-danger {
                    background-color: #dc3545;
                    border-color: #dc3545;
                }

                .btn-primary:hover,
                .btn-danger:hover {
                    opacity: 0.9;
                }

                .breadcrumb {
                    background-color: transparent;
                    padding: 0;
                    margin: 0;
                }

                table thead {
                    background-color: #343a40;
                    color: #ffffff;
                }

                table tbody tr:nth-child(even) {
                    background-color: #f8f9fa;
                }

                .empty-message {
                    color: #dc3545;
                    font-size: 1.2rem;
                    margin-top: 20px;
                    font-weight: bold;
                }
            </style>
            <!-- SweetAlert -->
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        </head>

        <body>
            <!-- Thông báo -->
            <?php if (isset($_SESSION['notification'])): ?>
                <script>
                    Swal.fire({
                        icon: '<?php echo $_SESSION['notification']['type']; ?>',
                        title: '<?php echo $_SESSION['notification']['message']; ?>',
                        showConfirmButton: false,
                        timer: 1500
                    });
                </script>
                <?php unset($_SESSION['notification']); ?>
            <?php endif; ?>

            <div class="container-fluid mt-3">
                <!-- Breadcrumb -->
                <div class="row mb-4">
                    <div class="col-md-12 d-flex justify-content-between align-items-center">
                        <h4 class="page-title">Thêm Sản Phẩm</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Thêm Sản Phẩm</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <!-- Form thêm sản phẩm -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Thông tin sản phẩm</h5>
                        <form class="form-horizontal" action="/admin/products" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="method" value="POST">
                            <div class="form-group">
                                <label for="product_name">Tên sản phẩm *</label>
                                <input type="text" class="form-control" id="product_name" placeholder="Nhập tên sản phẩm..." name="product_name">
                            </div>
                            <div class="form-group">
                                <label for="image">Hình ảnh</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <div class="form-group">
                                <label for="price">Giá tiền *</label>
                                <input type="number" class="form-control" id="price" placeholder="Nhập giá tiền..." name="price">
                            </div>
                            <div class="form-group">
                                <label for="description">Mô tả</label>
                                <textarea class="form-control" id="description" placeholder="Nhập mô tả..." name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="stock_quantity">Số lượng *</label>
                                <input type="number" class="form-control" id="stock_quantity" placeholder="Nhập số lượng..." name="stock_quantity" min="0">
                            </div>
                            <div class="form-group">
                                <label for="categories_id">Loại sản phẩm *</label>
                                <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="categories_id" name="categories_id">
                                    <option value="" selected disabled>Vui lòng chọn...</option>
                                    <?php foreach ($data as $item): ?>
                                        <option value="<?= $item['categories_id'] ?>"><?= $item['category_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Trạng thái *</label>
                                <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="status" name="status">
                                    <option value="" selected disabled>Vui lòng chọn...</option>
                                    <option value="1">Hiển thị</option>
                                    <option value="0">Ẩn</option>
                                </select>
                            </div>

                            <!-- Nút bấm -->
                            <div class="border-top">
                                <div class="card-body">
                                    <button type="reset" class="btn btn-danger text-white">Làm lại</button>
                                    <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Bootstrap JS -->
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
        </body>

        </html>
<?php
    }
}
