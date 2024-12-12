<?php

namespace App\Views\Admin\Pages\Variant;

use App\Views\BaseView;

class Index extends BaseView
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
            <?php unset($_SESSION['notification']); // Xóa thông báo sau khi hiển thị ?>
        <?php endif; ?>

        <div class="container-fluid mt-3">
            <!-- Breadcrumb -->
            <div class="row mb-4">
                <div class="col-md-12 d-flex justify-content-between align-items-center">
                    <h4 class="page-title">Quản lý Biến thể</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Danh sách biến thể</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- Danh sách biến thể -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Danh sách biến thể</h5>
                    <?php if (count($data)): ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Size</th>
                                        <th>Màu</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $item): ?>
                                        <tr>
                                            <td><?= isset($item['variant_id']) ? htmlspecialchars($item['variant_id']) : 'Không xác định' ?></td>
                                            <td><?= isset($item['size']) ? htmlspecialchars($item['size']) : 'Không xác định' ?></td>
                                            <td><?= isset($item['color']) ? htmlspecialchars($item['color']) : 'Không xác định' ?></td>
                                            <td>
                                                <!-- Trạng thái hiển thị theo mẫu của loại sản phẩm -->
                                                <span class="badge bg-<?= isset($item['status']) && $item['status'] == 1 ? 'success' : 'secondary' ?>">
                                                    <?= isset($item['status']) && $item['status'] == 1 ? 'Hiển thị' : 'Ẩn' ?>
                                                </span>
                                            </td>
                                            <td>
                                                <a href="/admin/variants/<?= isset($item['variant_id']) ? htmlspecialchars($item['variant_id']) : '#' ?>" class="btn btn-primary btn-sm">Sửa</a>
                                                <form action="/admin/variants/<?= isset($item['variant_id']) ? htmlspecialchars($item['variant_id']) : '#' ?>" method="POST" style="display: inline-block;" onsubmit="return confirm('Chắc chắn muốn xóa?')">
                                                    <input type="hidden" name="method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger btn-sm">Xoá</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <p class="text-center text-danger">Không có dữ liệu</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <?php
    }
}
