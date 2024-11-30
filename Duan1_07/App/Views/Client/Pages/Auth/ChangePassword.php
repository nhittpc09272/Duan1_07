<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class ChangePassword extends BaseView
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
        <!-- Cột hiển thị ảnh đại diện -->
        <div class="col-md-4 text-center mb-4">
          <?php if ($data && $data['avatar']) : ?>
            <img src="<?= APP_URL ?>/public/uploads/users/<?= $data['avatar'] ?>" alt="Avatar" class="rounded-circle img-fluid shadow" style="width: 500px; height: 500px;">
          <?php else : ?>
            <img src="<?= APP_URL ?>/public/uploads/users/default_user.png" alt="Avatar" class="rounded-circle img-fluid shadow" style="width: 200px; height: 200px;">
          <?php endif; ?>
        </div>

        <!-- Cột hiển thị form đổi mật khẩu -->
        <div class="col-md-6">
          <div class="card shadow">
            <div class="card-header bg-warning text-white text-center">
              <h4>Đổi mật khẩu</h4>
            </div>
            <div class="card-body">
              <form action="/change-password" method="post">
                <input type="hidden" name="method" value="PUT">

                <!-- Tên đăng nhập -->
                <div class="form-group mb-3">
                  <label for="username" class="form-label">Tên đăng nhập</label>
                  <input type="text" name="username" id="username" class="form-control" value="<?= $data['username'] ?>" disabled>
                </div>

                <!-- Mật khẩu cũ -->
                <div class="form-group mb-3">
                  <label for="old_password" class="form-label">Mật khẩu cũ</label>
                  <input type="password" name="old_password" id="old_password" class="form-control" placeholder="Nhập mật khẩu cũ" required>
                </div>

                <!-- Mật khẩu mới -->
                <div class="form-group mb-3">
                  <label for="new_password" class="form-label">Mật khẩu mới</label>
                  <input type="password" name="new_password" id="new_password" class="form-control" placeholder="Nhập mật khẩu mới" required>
                </div>

                <!-- Nhập lại mật khẩu mới -->
                <div class="form-group mb-3">
                  <label for="re_password" class="form-label">Nhập lại mật khẩu mới</label>
                  <input type="password" name="re_password" id="re_password" class="form-control" placeholder="Nhập lại mật khẩu mới" required>
                </div>

                <!-- Nút hành động -->
                <div class="d-flex justify-content-between">
                  <button type="reset" class="btn btn-outline-danger w-45">Nhập lại</button>
                  <button type="submit" class="btn btn-outline-warning w-45">Cập nhật</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>



<?php

  }
}
