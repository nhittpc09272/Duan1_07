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

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Quản Lý Biến Thể</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang Chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Danh Sách Biến Thể</li>
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
                                <h5 class="card-title">Danh Sách Biến Thể</h5>
                                
                                <!-- Kiểm tra dữ liệu -->
                                <?php if (count($data)): ?>
                                    <div class="table-responsive">
                                        <table id="variant-table" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Size</th>
                                                    <th>Màu</th>
                                                    <th>Trạng Thái</th>
                                                    <th>Hành Động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($data as $item): ?>
                                                    <tr>
                                                        <td><?= isset($item['variant_id']) ? htmlspecialchars($item['variant_id']) : 'Không xác định' ?></td>
                                                        <td><?= isset($item['size']) ? htmlspecialchars($item['size']) : 'Không xác định' ?></td>
                                                        <td><?= isset($item['color']) ? htmlspecialchars($item['color']) : 'Không xác định' ?></td>
                                                        <td><?= isset($item['status']) && $item['status'] == 1 ? 'Hiển thị' : 'Ẩn' ?></td>
                                                        <td>
                                                            <a href="/admin/variants/<?= isset($item['variant_id']) ? htmlspecialchars($item['variant_id']) : '#' ?>" class="btn btn-primary">Sửa</a>
                                                            <form action="/admin/variants/<?= isset($item['variant_id']) ? htmlspecialchars($item['variant_id']) : '#' ?>" method="POST" style="display: inline-block;" onsubmit="return confirm('Chắc chắn muốn xóa?')">
                                                                <input type="hidden" name="method" value="DELETE">
                                                                <button type="submit" class="btn btn-danger text-white">Xóa</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php else: ?>
                                    <h4 class="text-center text-danger">Không có dữ liệu.</h4>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Page Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>

<?php
    }
}
