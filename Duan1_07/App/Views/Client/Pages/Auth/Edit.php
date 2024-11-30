<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class Edit extends BaseView
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
        <!-- Ảnh đại diện -->
        <div class="col-md-4 text-center mb-4">
          <?php if ($data && $data['avatar']) : ?>
            <img src="<?= APP_URL ?>/public/uploads/users/<?= $data['avatar'] ?>" alt="Avatar" class="rounded-circle img-fluid shadow" style="width: 500px; height: 500px;">
          <?php else : ?>
            <img src="<?= APP_URL ?>/public/uploads/users/default-avatar.png" alt="Avatar" class="rounded-circle img-fluid shadow" style="width: 200px; height: 200px;">
          <?php endif; ?>
        </div>

        <!-- Form thông tin -->
        <div class="col-md-6">
          <div class="card shadow">
            <div class="card-header bg-warning text-white text-center">
              <h4>Thông tin tài khoản</h4>
            </div>
            <div class="card-body">
              <form action="/users/<?= $data['user_id'] ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="method" value="PUT">

                <div class="form-group mb-3">
                  <label for="username">Tên đăng nhập</label>
                  <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tên đăng nhập" value="<?= $data['username'] ?>" required>
                </div>

                <div class="form-group mb-3">
                  <label for="email">Email</label>
                  <input type="email" name="email" id="email" class="form-control" placeholder="Nhập Email" value="<?= $data['email'] ?>" required>
                </div>

                <div class="form-group mb-3">
                  <label for="phone">Số điện thoại</label>
                  <input type="text" name="phone" id="phone" class="form-control" placeholder="Nhập số điện thoại" value="<?= $data['phone'] ?>">
                </div>

                <div class="form-group mb-3">
                  <label for="address">Địa chỉ</label>
                  <input type="text" name="address" id="address" class="form-control" placeholder="Nhập địa chỉ" value="<?= $data['address'] ?>">
                </div>

                <div class="form-group mb-3">
                  <label for="avatar">Ảnh đại diện</label>
                  <input type="file" name="avatar" id="avatar" class="form-control">
                </div>

                <div class="d-flex justify-content-between">
                  <button type="reset" class="btn btn-outline-danger w-45">Nhập lại</button>
                  <button type="submit" class="btn btn-outline-warning w-45">Cập nhật</button>
                </div>
              </form>
            </div>
            <div class="card-footer text-center">
              <a href="/change-password" class="text-danger">Đổi mật khẩu</a>
            </div>
          </div>
        </div>
      </div>
    </div>


<?php

  }
}
