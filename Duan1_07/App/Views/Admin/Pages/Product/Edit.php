<?php

namespace App\Views\Admin\Pages\Product;

use App\Views\BaseView;

class Edit extends BaseView
{
    public static function render($data = null)
    {
?>
        <!DOCTYPE html>
        <html lang="vi">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Sửa sản phẩm</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <style>
                img {
                    border-radius: 8px;
                    margin-bottom: 15px;
                }

                .form-group label {
                    font-weight: bold;
                }

                .card-body {
                    max-width: 900px;
                    margin: 0 auto;
                }
            </style>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        </head>

        <body>
            <!-- Hiển thị thông báo -->
            <?php if (isset($_SESSION['notification'])) : ?>
                <script>
                    Swal.fire({
                        icon: '<?= $_SESSION['notification']['type']; ?>',
                        title: '<?= $_SESSION['notification']['message']; ?>',
                        showConfirmButton: false,
                        timer: 1500
                    });
                </script>
                <?php unset($_SESSION['notification']); ?>
            <?php endif; ?>

            <div class="container mt-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Sửa thông tin sản phẩm</h4>
                    </div>
                    <div class="card-body">
                        <form action="/admin/products/<?= $data['products']['product_id'] ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="method" value="PUT">

                            <!-- Hiển thị hình ảnh hiện tại -->
                            <div align="center">
                                <img src="<?= APP_URL ?>/public/assets/client/img/image/<?= $data['products']['image'] ?>" alt="Hình ảnh sản phẩm" width="200px">
                            </div>

                            <div class="form-group mb-3">
                                <label for="product_name">Tên sản phẩm *</label>
                                <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Nhập tên sản phẩm" value="<?= $data['products']['product_name'] ?>" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="image">Hình ảnh</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="price">Giá tiền *</label>
                                        <input type="number" class="form-control" id="price" name="price" placeholder="Nhập giá sản phẩm" value="<?= $data['products']['price'] ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="category_id">Loại sản phẩm *</label>
                                        <select class="form-select" id="category_id" name="categories_id" required>
                                            <option value="" disabled selected>Vui lòng chọn...</option>
                                            <?php foreach ($data['categories'] as $item) : ?>
                                                <option value="<?= $item['categories_id'] ?>" <?= ($item['categories_id'] == $data['products']['category_id']) ? 'selected' : '' ?>>
                                                    <?= $item['category_name'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="description">Mô tả</label>
                                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Nhập mô tả sản phẩm..."><?= $data['products']['description'] ?></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="status">Trạng thái *</label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="" disabled selected>Vui lòng chọn...</option>
                                    <option value="1" <?= ($data['products']['status'] == 1 ? 'selected' : '') ?>>Hiển thị</option>
                                    <option value="0" <?= ($data['products']['status'] == 0 ? 'selected' : '') ?>>Ẩn</option>
                                </select>
                            </div>

                            <div class="d-flex justify-content-between">
                                <button type="reset" class="btn btn-danger">Làm lại</button>
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        </body>

        </html>
<?php
    }
}
