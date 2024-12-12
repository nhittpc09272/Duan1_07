<?php

namespace App\Views\Admin\Pages\User;

use App\Views\BaseView;

class Edit extends BaseView
{
    public static function render($data = null)
    {
?>
        <!-- Hiển thị thông báo -->
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
            <?php unset($_SESSION['notification']); ?>
        <?php endif; ?>

        <!-- Page wrapper -->
        <div class="page-wrapper" style="width: 100%;">
            <!-- Breadcrumb -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">QUẢN LÝ NGƯỜI DÙNG</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Sửa thông tin người dùng</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="card shadow-sm">
                            <form class="form-horizontal" action="/admin/users/<?= $data['user_id'] ?>" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">Sửa thông tin người dùng</h4>
                                    <input type="hidden" name="method" value="PUT">

                                    <!-- Avatar -->
                                    <div class="text-center mb-3">
                                        <img src="<?= APP_URL ?>/public/uploads/users/<?= $data['avatar'] ?>" alt="Avatar" class="rounded-circle" width="150px">
                                    </div>

                                    <!-- Tên đăng nhập -->
                                    <div class="form-group row">
                                        <label for="username" class="col-sm-3 col-form-label">Tên đăng nhập*</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="username" name="username" value="<?= $data['username'] ?>" required>
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-3 col-form-label">Email*</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" id="email" name="email" value="<?= $data['email'] ?>" required>
                                        </div>
                                    </div>

                                    <!-- Mật khẩu -->
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-3 col-form-label">Mật khẩu</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu mới nếu muốn thay đổi">
                                        </div>
                                    </div>

                                    <!-- Nhập lại mật khẩu -->
                                    <div class="form-group row">
                                        <label for="re_password" class="col-sm-3 col-form-label">Nhập lại mật khẩu</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" id="re_password" name="re_password" placeholder="Nhập lại mật khẩu mới">
                                        </div>
                                    </div>

                                    <!-- Hình đại diện -->
                                    <div class="form-group row">
                                        <label for="avatar" class="col-sm-3 col-form-label">Hình đại diện</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" id="avatar" name="avatar">
                                        </div>
                                    </div>

                                    <!-- Quyền -->
                                    <div class="form-group row">
                                        <label for="role" class="col-sm-3 col-form-label">Quyền*</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" id="role" name="role" required>
                                                <option value="1" <?= ($data['role'] == 1) ? 'selected' : '' ?>>Quản trị viên</option>
                                                <option value="0" <?= ($data['role'] == 0) ? 'selected' : '' ?>>Khách hàng</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Trạng thái -->
                                    <div class="form-group row">
                                        <label for="status" class="col-sm-3 col-form-label">Trạng thái*</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" id="status" name="status" required>
                                                <option value="1" <?= ($data['status'] == 1) ? 'selected' : '' ?>>Hoạt động</option>
                                                <option value="0" <?= ($data['status'] == 0) ? 'selected' : '' ?>>Khoá</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Buttons -->
                                <div class="card-footer text-end">
                                    <button type="reset" class="btn btn-danger text-white">Làm lại</button>
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#role, #status').select2();
            });
        </script>
<?php
    }
}
