<?php

namespace App\Views\Admin\Layouts;

use App\Views\BaseView;

class Footer extends BaseView
{
        public static function render($data = null)
        {

?>
<footer class="footer">
  <div class="d-sm-flex justify-content-center justify-content-sm-between">
    <!-- Thông tin bản quyền -->
    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
      Copyright © 2023. Trang web <a href="#" target="_blank">5TV Store</a> - Chuyên cung cấp giày chất lượng cao. All rights reserved.
    </span>
    <!-- Câu slogan hoặc lời nhắn -->
    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
      Sản phẩm được chăm chút kỹ lưỡng & làm từ <i class="ti-heart text-danger ms-1"></i> bởi đội ngũ 5TV.
    </span>
  </div>
</footer>

          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
<script src="../../../../public/assets/dist/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../../../public/assets/dist/assets/vendors/chart.js/chart.umd.js"></script>
    <script src="../../../../public/assets/dist/assets/vendors/datatables.net/jquery.dataTables.js"></script>
    <!-- <script src="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script> -->
    <script src="../../../../public/assets/dist/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js"></script>
    <script src="../../../../public/assets/dist/assets/js/dataTables.select.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../../../public/assets/dist/assets/js/off-canvas.js"></script>
    <script src="../../../../public/assets/dist/assets/js/template.js"></script>
    <script src="../../../../public/assets/dist/assets/js/settings.js"></script>
    <script src="../../../../public/assets/dist/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../../../../public/assets/dist/assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="../../../../public/assets/dist/assets/js/dashboard.js"></script>
<?php
        }
}

?>