<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class ResetPassword extends BaseView
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
        <div class="col-md-6">
          <div class="card shadow">
            <!-- Header -->
            <div class="card-header bg-warning text-white text-center">
              <h4>Đặt lại mật khẩu</h4>
            </div>
            <!-- Nội dung -->
            <div class="card-body">
              <form action="/reset-password" method="post">
                <input type="hidden" name="method" value="PUT">

                <!-- Nhập mật khẩu mới -->
                <div class="form-group mb-3">
                  <label for="password" class="form-label">Mật khẩu mới</label>
                  <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu mới" required>
                </div>

                <!-- Nhập lại mật khẩu -->
                <div class="form-group mb-3">
                  <label for="re_password" class="form-label">Nhập lại mật khẩu</label>
                  <input type="password" name="re_password" id="re_password" class="form-control" placeholder="Nhập lại mật khẩu" required>
                </div>

                <!-- Nút hành động -->
                <div class="d-flex justify-content-between">
                  <button type="reset" class="btn btn-outline-danger w-45">Nhập lại</button>
                  <button type="submit" class="btn btn-outline-warning w-45">Đặt lại mật khẩu</button>
                </div>
              </form>
            </div>
            <!-- Footer -->
            <div class="card-footer text-center text-muted">
              <small>Hãy chắc chắn rằng mật khẩu của bạn đủ mạnh và dễ nhớ.</small>
            </div>
          </div>
        </div>
      </div>
    </div>



<?php

  }
}
