<?php

namespace App\Views\Admin\Pages\User;

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
            <!-- Breadcrumb -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">QUẢN LÝ NGƯỜI DÙNG</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Danh sách người dùng</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Danh sách người dùng</h5>
                                
                                <?php if (count($data)): ?>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Ảnh đại diện</th>
                                                    <th>Tên đăng nhập</th>
                                                    <th>Email</th>
                                                    <th>Số điện thoại</th>
                                                    <th>Địa chỉ</th>
                                                    <th>Quyền</th>
                                                    <th>Trạng thái</th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($data as $item): ?>
                                                    <tr>
                                                        <td><?= $item['user_id'] ?></td>
                                                        <td>
                                                            <img src="<?= APP_URL ?>/public/uploads/users/<?= $item['avatar'] ?>" alt="Avatar" width="100px" class="rounded-circle">
                                                        </td>
                                                        <td><?= $item['username'] ?></td>
                                                        <td><?= $item['email'] ?></td>
                                                        <td><?= $item['phone'] ?></td>
                                                        <td><?= $item['address'] ?></td>
                                                        <td><?= ($item['role'] == 1) ? 'Quản trị viên' : 'Khách hàng' ?></td>
                                                        <td><?= ($item['status'] == 1) ? 'Hoạt động' : 'Khoá' ?></td>
                                                        <td>
                                                            <a href="/admin/users/<?= $item['user_id'] ?>" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i> Sửa</a>
                                                            <form action="/admin/users/<?= $item['user_id'] ?>" method="post" style="display: inline-block;" onsubmit="return confirm('Chắc chắn xoá?')">
                                                                <input type="hidden" name="method" value="DELETE">
                                                                <button type="submit" class="btn btn-sm btn-danger text-white"><i class="bi bi-trash"></i> Xoá</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php else: ?>
                                    <h4 class="text-center text-danger">Không có dữ liệu</h4>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
    }
}
