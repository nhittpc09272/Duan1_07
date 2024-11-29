<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class ForgotPassword extends BaseView
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
        <div class="container my-5">
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <div class="card card-body">
                        <h4 class="text-center text-danger">Lấy lại mật khẩu</h4>
                        <form action="/forgot-password" method="post">
                            <input type="hidden" name="method" value="POST" id="">
                            <div class="form-group">
                                <label for="username">Tên đăng nhập</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tên đăng nhập">
                            </div>
                            <div class="form-group">
                                <label for="email">Email*</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Nhập email">
                            </div>
                            <button type="reset" class="btn btn-outline-danger">Nhập lại</button>
                            <button type="submit" class="btn btn-outline-info">lấy lại mật khẩu</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>


<?php

    }
}
