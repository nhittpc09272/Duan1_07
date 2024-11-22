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
            <?php unset($_SESSION['notification']); // Xóa thông báo sau khi hiển thị 
            ?>
        <?php endif; ?>

        <div class="container mt-5">
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <div class="card card-body">
                        <h4 class="text-center text-danger">Đăng ký</h4>
                        <form action="/register" method="post">
                            <input type="hidden" name="method" value="POST" id="">
                            <div class="form-group">
                                <label for="username">Tên đăng nhập</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tên đăng nhập" require>
                            </div>
                            <div class="form-group">
                                <label for="password">Mật khẩu</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu">

                            </div>
                            <div class="form-group">
                                <label for="re_password">Nhập lại mật khẩu</label>
                                <input type="password" name="re_password" id="re_password" class="form-control" placeholder="Nhập lại mật kẩu">

                            </div>
                            <div class="form-group">
                                <label for="email">Email*</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Nhập email">

                            </div>
                            <div class="form-group">
                                <label for="phone">Số điện thoại</label>
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="Nhập số điện thoại">
                            </div>
                            <div class="form-group">
                                <label for="address">Địa chỉ</label>
                                <input type="text" name="address" id="address" class="form-control" placeholder="Nhập địa chỉ">
                            </div>
                            <!-- <div class="form-group">
                                <label for="name">Họ và tên*</label>
                                <input type="name" name="name" id="name" class="form-control" placeholder="Nhập họ và tên">
                                
                            </div> -->
                            <button type="reset" class="btn btn-outline-danger">Nhập lại</button>
                            <button type="submit" class="btn btn-outline-info">Đăng ký</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

<?php
    }
}
