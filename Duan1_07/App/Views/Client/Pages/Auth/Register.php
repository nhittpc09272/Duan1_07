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
        

        <!-- Nền ảnh và form -->
        <!-- <div class="container-fluid p-0" style="background-image: url('/public/uploads/products/z3944035496045_7834495bfa6a8f27d727d0f5cdffef66_ef0d37945a124f3483a34e81dd348069_master.jpg'); background-size: cover; background-position: center; height: 100vh; position: relative; z-index: 0; ">
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
                            <button type="submit" class="btn btn-outline-warning btn-lg" style="z-index: 20; position: relative;">Đăng ký</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> -->
        <div class="bg-image" style="background-image: url('/public/uploads/products/z3944035496045_7834495bfa6a8f27d727d0f5cdffef66_ef0d37945a124f3483a34e81dd348069_master.jpg'); background-size: cover; background-position: center; height: 100vh; position: relative; z-index: 0; ">
            <div class="d-flex justify-content-center align-items-center h-100">
                <!-- Form đăng nhập -->
                <div class="card p-5 shadow-lg" style="width: 500px; background-color: rgba(255, 255, 255, 0.9); border-radius: 15px; position: relative; z-index: 10;">
                    <h3 class="text-center mb-4" style="color: #333; font-weight: bold;">Đăng ký</h3>
                    <form action="/register" method="post">
                        <input type="hidden" name="method" value="POST">
                        <div class="form-group">
                            <label for="username" style="color: #333;">Tên đăng nhập</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tên đăng nhập" style="border: 1px solid #ff4747; border-radius: 4px;">
                        </div>
                        <div class="form-group">
                            <label for="password" style="color: #333;">Mật khẩu</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu" style="border: 1px solid #ff4747; border-radius: 4px;">
                        </div>

                        <div class="form-group">
                            <label for="re_password" style="color: #333;">Nhập lại mật khẩu</label>
                            <input type="re_password" name="re_password" id="re_password" class="form-control" placeholder="Nhập nhập lại mật khẩu" style="border: 1px solid #ff4747; border-radius: 4px;">
                        </div>
                        <div class="form-group">
                            <label for="email" style="color: #333;">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Nhập email" style="border: 1px solid #ff4747; border-radius: 4px;">
                        </div>
                        <div class="form-group">
                            <label for="phone" style="color: #333;">Số điện thoại</label>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Nhập Số điện thoại" style="border: 1px solid #ff4747; border-radius: 4px;">
                        </div>
                        <div class="form-group">
                            <label for="address" style="color: #333;">Địa chỉ</label>
                            <input type="text" name="address" id="address" class="form-control" placeholder="Nhập địa chỉ" style="border: 1px solid #ff4747; border-radius: 4px;">
                        </div>

                        <div class="d-flex justify-content-between mt-3">
                            <button type="reset" class="btn btn-outline-danger btn-lg" style="border-color: #ff4747; color: #000; font-weight: bold;">Nhập lại</button>
                            <button type="submit" class="btn btn-outline-warning btn-lg" style="z-index: 20; position: relative;">Đăng ký</button>
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