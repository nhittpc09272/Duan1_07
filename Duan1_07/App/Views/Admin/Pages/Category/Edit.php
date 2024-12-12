<?php

namespace App\Views\Admin\Pages\Category;

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
            <title>Sửa loại sản phẩm</title>
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

                label {
                    font-weight: bold;
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

            <div class="container mt-5">
                <!-- Breadcrumb -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Sửa loại sản phẩm</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <!-- Form chỉnh sửa -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Sửa loại sản phẩm</h4>
                        <form action="/admin/categories/<?= $data['categories_id'] ?>" method="POST">
                            <input type="hidden" name="method" value="PUT">
                            <div class="mb-3">
                                <label for="id" class="form-label">ID</label>
                                <input type="text" class="form-control" id="id" name="id" value="<?= $data['categories_id'] ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Tên<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" placeholder="Nhập tên loại sản phẩm..." name="name" value="<?= $data['category_name'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Trạng thái<span class="text-danger">*</span></label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="" disabled>Vui lòng chọn...</option>
                                    <option value="1" <?= ($data['status'] == 1 ? 'selected' : '') ?>>Hiển thị</option>
                                    <option value="0" <?= ($data['status'] == 0 ? 'selected' : '') ?>>Ẩn</option>
                                </select>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="reset" class="btn btn-danger text-white me-2">Làm lại</button>
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
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
