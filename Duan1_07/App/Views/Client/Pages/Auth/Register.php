<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class Register extends BaseView
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
            <?php unset($_SESSION['notification']); ?>
        <?php endif; ?>
        <link href="/public/assets/client/css/bootstrap.min.css" rel="stylesheet">
        <link href="/public/assets/client/css/main.css" rel="stylesheet">
        <link rel="stylesheet" href="/public/assets/client/css/linearicons.css">
        <link rel="stylesheet" href="/public/assets/client/css/font-awesome.min.css">
        <link rel="stylesheet" href="/public/assets/client/css/nouislider.min.css">
        <link rel="stylesheet" href="/public/assets/client/css/ion.rangeSlider.css" />
        <link rel="stylesheet" href="/public/assets/client/css/ion.rangeSlider.skinFlat.css" />
        <link rel="stylesheet" href="/public/assets/client/css/magnific-popup.css">

        <!-- Nền ảnh và form -->
        <div class="container-fluid p-0" style="height: 100vh; background: url('/public/uploads/products/z3944035496045_7834495bfa6a8f27d727d0f5cdffef66_ef0d37945a124f3483a34e81dd348069_master.jpg') no-repeat center center fixed; background-size: cover;">
            <div class="d-flex justify-content-center align-items-center h-100" style="background: rgba(0, 0, 0, 0.5);">
                <div class="card border-0 shadow-lg p-4" style="backdrop-filter: blur(10px); background: rgba(255, 255, 255, 0.8); border-radius: 15px; max-width: 450px; width: 100%;">
                    <h3 class="text-center text-outline-danger mb-4">Đăng ký tài khoản</h3>
                    <form action="/register" method="post">
                        <input type="hidden" name="method" value="POST">

                        <div class="form-group mb-3">
                            <label for="username">Tên đăng nhập</label>
                            <input type="text" name="username" id="username" class="form-control form-control-lg" placeholder="Nhập tên đăng nhập" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">Mật khẩu</label>
                            <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Nhập mật khẩu" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="re_password">Nhập lại mật khẩu</label>
                            <input type="password" name="re_password" id="re_password" class="form-control form-control-lg" placeholder="Nhập lại mật khẩu" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Nhập email" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="phone">Số điện thoại</label>
                            <input type="text" name="phone" id="phone" class="form-control form-control-lg" placeholder="Nhập số điện thoại">
                        </div>

                        <div class="form-group mb-3">
                            <label for="address">Địa chỉ</label>
                            <input type="text" name="address" id="address" class="form-control form-control-lg" placeholder="Nhập địa chỉ">
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="reset" class="btn btn-outline-danger btn-lg">Nhập lại</button>
                            <!-- Nút đăng ký màu cam đậm -->
                            <button type="submit" class="btn btn-outline-warning btn-lg" style="background-color: #FF6600; color: white;">Đăng ký</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
    }
}
?>