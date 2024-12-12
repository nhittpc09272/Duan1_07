<?php

namespace App\Views\Admin\Pages\Category;

use App\Views\BaseView;

class Index extends BaseView
{
    public static function render($data = null)
    {
?>
        <!DOCTYPE html>
        <html lang="vi">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Quản lý loại sản phẩm</title>
            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <!-- Custom CSS -->
            <!-- <style>
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

                /* Sửa màu sắc của badge */
                .badge.bg-success {
                    background-color: #28a745 !important; /* Xanh lá cây */
                }

                .badge.bg-secondary {
                    background-color: #6c757d !important; /* Màu xám */
                }

                .btn-sm {
                    font-size: 0.875rem;
                    padding: 0.25rem 0.5rem;
                }

            </style> -->
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
                        <h4 class="page-title">Quản lý loại sản phẩm</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Danh sách loại sản phẩm</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <!-- Danh sách loại sản phẩm -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Danh sách loại sản phẩm</h5>
                        <?php if (count($data)): ?>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên</th>
                                            <th>Trạng thái</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $item): ?>
                                            <tr>
                                                <td><?= $item['categories_id'] ?></td>
                                                <td><?= $item['category_name'] ?></td>
                                                <td>
                                                    <span class="badge bg-<?= $item['status'] == 1 ? 'success' : 'secondary' ?>">
                                                        <?= $item['status'] == 1 ? 'Hiển thị' : 'Ẩn' ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <a href="/admin/categories/<?= $item['categories_id'] ?>" class="btn btn-primary btn-sm">Sửa</a>
                                                    <form action="/admin/categories/<?= $item['categories_id'] ?>" method="post" class="d-inline-block" onsubmit="return confirm('Bạn có chắc muốn xóa?')">
                                                        <input type="hidden" name="method" value="DELETE">
                                                        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <p class="text-center empty-message">Không có dữ liệu</p>
                        <?php endif; ?>
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
