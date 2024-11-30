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
            <div class="row justify-content-center">
                <!-- Form lấy lại mật khẩu -->
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-header bg-warning text-white text-center">
                            <h4>Lấy lại mật khẩu</h4>
                        </div>
                        <div class="card-body">
                            <form action="/forgot-password" method="post">
                                <input type="hidden" name="method" value="POST">

                                <!-- Tên đăng nhập -->
                                <div class="form-group mb-3">
                                    <label for="username" class="form-label">Tên đăng nhập</label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tên đăng nhập" required>
                                </div>

                                <!-- Email -->
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Nhập email" required>
                                </div>

                                <!-- Nút hành động -->
                                <div class="d-flex justify-content-between">
                                    <button type="reset" class="btn btn-outline-danger w-45">Nhập lại</button>
                                    <button type="submit" class="btn btn-outline-warning w-45">Lấy lại mật khẩu</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center text-muted">
                            <small>Bạn sẽ nhận được email chứa hướng dẫn để đặt lại mật khẩu.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>



<?php

    }
}
