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
    <script src="<?=APP_URL?>/public/assets/admin/libs/jquery/dist/jquery.min.js"></script>
                <!-- Bootstrap tether Core JavaScript -->
                <script src="<?=APP_URL?>/public/assets/admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/extra-libs/sparkline/sparkline.js"></script>
                <!--Wave Effects -->
                <script src="<?=APP_URL?>/public/assets/admin/dist/js/waves.js"></script>
                <!--Menu sidebar -->
                <script src="<?=APP_URL?>/public/assets/admin/dist/js/sidebarmenu.js"></script>
                <!--Custom JavaScript -->
                <script src="<?=APP_URL?>/public/assets/admin/dist/js/custom.min.js"></script>
                <!--This page JavaScript -->
                <!-- <script src="<?=APP_URL?>/public/assets/admin/dist/js/pages/dashboards/dashboard1.js"></script> -->
                <!-- Charts js Files -->
                <script src="<?=APP_URL?>/public/assets/admin/libs/flot/excanvas.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/flot/jquery.flot.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/flot/jquery.flot.pie.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/flot/jquery.flot.time.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/flot/jquery.flot.stack.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/flot/jquery.flot.crosshair.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/dist/js/pages/chart/chart-page-init.js"></script>

                <script src="<?=APP_URL?>/public/assets/admin/extra-libs/multicheck/datatable-checkbox-init.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/extra-libs/multicheck/jquery.multicheck.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/extra-libs/DataTables/datatables.min.js"></script>
                <script>
                        /****************************************
                         *       Basic Table                   *
                         ****************************************/
                        $('#zero_config').DataTable();
                </script>

                <script src="<?=APP_URL?>/public/assets/admin/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/dist/js/pages/mask/mask.init.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/select2/dist/js/select2.full.min.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/select2/dist/js/select2.min.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/jquery-asColor/dist/jquery-asColor.min.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/jquery-asGradient/dist/jquery-asGradient.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/jquery-minicolors/jquery.minicolors.min.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/quill/dist/quill.min.js"></script>

<?php
        }
}

?>