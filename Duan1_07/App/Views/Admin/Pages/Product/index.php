<?php

namespace App\Views\Admin\Pages\Product;

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
            <title>Danh sách sản phẩm</title>
            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <style>
                .badge-success {
                    background-color: #28a745;
                }

                .badge-danger {
                    background-color: #dc3545;
                }

                img {
                    border-radius: 8px;
                }

                .action-buttons a,
                .action-buttons form {
                    margin-right: 5px;
                }

                .action-buttons button {
                    margin-right: 0;
                }
            </style>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        </head>

        <body>
            <!-- Hiển thị thông báo -->
            <?php if (isset($_SESSION['notification'])): ?>
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
                <div class="row mb-4">
                    <div class="col-md-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Danh sách sản phẩm</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4>Danh sách sản phẩm</h4>
                    </div>
                    <div class="card-body">
                        <?php if (count($data)) : ?>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Hình Ảnh</th>
                                            <th>Tên</th>
                                            <th>Giá</th>
                                            <th>Loại</th>
                                            <th>Trạng thái</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $item) : ?>
                                            <tr>
                                                <td><?= $item['product_id'] ?></td>
                                                <td>
                                                    <img src="<?= APP_URL ?>/public/assets/client/img/image/<?= $item['image'] ?>" alt="Sản phẩm" width="100px">
                                                </td>
                                                <td><?= $item['product_name'] ?></td>
                                                <td><?= number_format($item['price'], 0, ',', '.') ?> VNĐ</td>
                                                <td><?= $item['category_name'] ?></td>
                                                <td>
                                                    <span class="badge <?= $item['status'] == 1 ? 'badge-success' : 'badge-danger'; ?>">
                                                        <?= $item['status'] == 1 ? 'Hiển thị' : 'Ẩn'; ?>
                                                    </span>
                                                </td>
                                                <td class="action-buttons">
                                                    <a href="/admin/products/<?= $item['product_id'] ?>" class="btn btn-primary btn-sm">
                                                        <i class="bi bi-pencil"></i> Sửa
                                                    </a>
                                                    <form action="/admin/products/<?= $item['product_id'] ?>" method="post" style="display:inline;" onsubmit="return confirm('Bạn chắc chắn muốn xóa?');">
                                                        <input type="hidden" name="method" value="DELETE">
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="bi bi-trash"></i> Xóa
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else : ?>
                            <div class="alert alert-warning text-center" role="alert">
                                Không có dữ liệu!
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Bootstrap JS -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        </body>

        </html>
<?php
    }
}
