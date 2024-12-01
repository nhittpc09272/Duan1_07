<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class Login extends BaseView
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
        <link rel="stylesheet" href="/public/assets/client/css/font-awesome.min.css">
        <link rel="stylesheet" href="/public/assets/client/css/themify-icons.css">
        <link rel="stylesheet" href="/public/assets/client/css/bootstrap.css">
        <link rel="stylesheet" href="/public/assets/client/css/owl.carousel.css">
        <link rel="stylesheet" href="/public/assets/client/css/nice-select.css">
        <link rel="stylesheet" href="/public/assets/client/css/nouislider.min.css">
        <link rel="stylesheet" href="/public/assets/client/css/ion.rangeSlider.css" />
        <link rel="stylesheet" href="/public/assets/client/css/ion.rangeSlider.skinFlat.css" />
        <link rel="stylesheet" href="/public/assets/client/css/magnific-popup.css">

        <!-- Ảnh nền toàn màn hình -->
        <div class="bg-image" style="background-image: url('/public/uploads/products/z3944035496045_7834495bfa6a8f27d727d0f5cdffef66_ef0d37945a124f3483a34e81dd348069_master.jpg'); background-size: cover; background-position: center; height: 100vh; position: relative; z-index: 0; ">
            <div class="d-flex justify-content-center align-items-center h-100">
                <!-- Form đăng nhập -->
                <div class="card p-5 shadow-lg" style="width: 500px; background-color: rgba(255, 255, 255, 0.9); border-radius: 15px; position: relative; z-index: 10;">
                    <h3 class="text-center mb-4" style="color: #333; font-weight: bold;">Đăng nhập</h3>
                    <form action="/login" method="post">
                        <input type="hidden" name="method" value="POST">
                        <div class="form-group">
                            <label for="username" style="color: #333;">Tên đăng nhập</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tên đăng nhập" style="border: 1px solid #ff4747; border-radius: 4px;">
                        </div>
                        <div class="form-group">
                            <label for="password" style="color: #333;">Mật khẩu</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu" style="border: 1px solid #ff4747; border-radius: 4px;">
                        </div>

                        <div class="form-check">
                            <label for="" class="form-check-label" style="color: #333;">
                                <input type="checkbox" class="form-check-input" name="remember" checked>
                                Ghi nhớ đăng nhập
                            </label>
                        </div>

                        <div class="d-flex justify-content-between mt-3">
                            <button type="reset" class="btn btn-outline-danger btn-lg" style="border-color: #ff4747; color: #000; font-weight: bold;">Nhập lại</button>
                            <button type="submit" class="btn btn-outline-warning btn-lg" style="z-index: 20; position: relative;">Đăng nhập</button>
                        </div>

                        <div class="mt-3 text-center">
                            <a href="/forgot-password" class="text-danger" style="color: #ff4747;">Quên mật khẩu</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php
    }
}
