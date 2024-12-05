<?php

namespace App\Views\Admin\Layouts;

use App\Views\BaseView;

class Header extends BaseView
{
  public static function render($data = null)
  {

?>
    <!DOCTYPE html>
    <html lang="vi">

    <head>
      <!-- Các thẻ meta yêu cầu -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Quản trị Skydash</title>
      <!-- các plugin:css -->
      <link rel="stylesheet" href="../../../../public/assets/dist/assets/vendors/feather/feather.css">
      <link rel="stylesheet" href="../../../../public/assets/dist/assets/vendors/ti-icons/css/themify-icons.css">
      <link rel="stylesheet" href="../../../../public/assets/dist/assets/vendors/css/vendor.bundle.base.css">
      <link rel="stylesheet" href="../../../../public/assets/dist/assets/vendors/font-awesome/css/font-awesome.min.css">
      <link rel="stylesheet" href="../../../../public/assets/dist/assets/vendors/mdi/css/materialdesignicons.min.css">
      <!-- kết thúc inject -->
      <!-- CSS plugin cho trang này -->
      <!-- <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css"> -->
      <link rel="stylesheet" href="../../../../public/assets/dist/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css">
      <link rel="stylesheet" href="../../../../public/assets/dist/assets/vendors/ti-icons/css/themify-icons.css">
      <link rel="stylesheet" type="../../../../public/assets/dist/assets/js/select.dataTables.min.css">
      <!-- Kết thúc CSS plugin cho trang này -->
      <!-- inject:css -->
      <link rel="stylesheet" href="../../../../public/assets/dist/assets/css/style.css">
      <!-- kết thúc inject -->
      <link rel="shortcut icon" href="../../../../public/assets/dist/assets/images/favicon.png" />
      <link rel="icon" type="image/png" sizes="16x16" href="<?= APP_URL ?>/public/assets/admin/images/favicon.png">
            <!-- CSS -->
            <link href="<?= APP_URL ?>/public/assets/admin/libs/flot/css/float-chart.css" rel="stylesheet">
            <link rel="stylesheet" type="text/css" href="<?= APP_URL ?>/public/assets/admin/extra-libs/multicheck/multicheck.css">
            <link href="<?= APP_URL ?>/public/assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">

            <link rel="stylesheet" type="text/css" href="<?= APP_URL ?>/public/assets/admin/libs/select2/dist/css/select2.min.css">
            <link rel="stylesheet" type="text/css" href="<?= APP_URL ?>/public/assets/admin/libs/jquery-minicolors/jquery.minicolors.css">
            <link rel="stylesheet" type="text/css" href="<?= APP_URL ?>/public/assets/admin/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
            <link rel="stylesheet" type="text/css" href="<?= APP_URL ?>/public/assets/admin/libs/quill/dist/quill.snow.css">

            <!-- Custom CSS -->
            <link href="<?= APP_URL ?>/public/assets/admin/dist/css/style.min.css" rel="stylesheet">

            <!-- ChartJs -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>

    <body>
      <div class="container-scroller">

        <!-- phần:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
          <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
            <a class="navbar-brand brand-logo me-5" href="/admin"><img src="../../../../public/assets/admin/images/logo1.jpg" class="me-2" alt="logo" /></a>
            <a class="navbar-brand brand-logo-mini" href="/admin"><img src="../../../../public/assets/admin/images/logo1.jpg" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="icon-menu"></span>
            </button>
            <ul class="navbar-nav mr-lg-2">
              <li class="nav-item nav-search d-none d-lg-block">
                <div class="input-group">
                  <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                    <span class="input-group-text" id="search">
                      <i class="icon-search"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control" id="navbar-search-input" placeholder="Tìm kiếm ngay" aria-label="search" aria-describedby="search">
                </div>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                  <i class="icon-bell mx-0"></i>
                  <span class="count"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                  <p class="mb-0 font-weight-normal float-left dropdown-header">Thông báo</p>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-success">
                        <i class="ti-info-alt mx-0"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <h6 class="preview-subject font-weight-normal">Lỗi ứng dụng</h6>
                      <p class="font-weight-light small-text mb-0 text-muted"> Vừa mới </p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-warning">
                        <i class="ti-settings mx-0"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <h6 class="preview-subject font-weight-normal">Cài đặt</h6>
                      <p class="font-weight-light small-text mb-0 text-muted"> Tin nhắn riêng tư </p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-info">
                        <i class="ti-user mx-0"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <h6 class="preview-subject font-weight-normal">Đăng ký người dùng mới</h6>
                      <p class="font-weight-light small-text mb-0 text-muted"> 2 ngày trước </p>
                    </div>
                  </a>
                </div>
              </li>
              <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                  <img src="assets/images/faces/face28.jpg" alt="profile" />
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                  <a class="dropdown-item">
                    <i class="ti-settings text-primary"></i> Cài đặt </a>
                  <a class="dropdown-item">
                    <i class="ti-power-off text-primary"></i> Đăng xuất </a>
                </div>
              </li>
              <li class="nav-item nav-settings d-none d-lg-flex">
                <a class="nav-link" href="#">
                  <i class="icon-ellipsis"></i>
                </a>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="icon-menu"></span>
            </button>
          </div>
        </nav>
        <!-- phần -->
        <div class="container-fluid page-body-wrapper">
          <!-- phần:partials/_sidebar.html -->
          <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
              <li class="nav-item">
                <a class="nav-link" href="/admin">
                  <i class="icon-grid menu-icon"></i>
                  <span class="menu-title">admin</span>
                </a>
              </li>



              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                  <i class="icon-grid-2 menu-icon"></i>
                  <span class="menu-title">loại sản phẩm</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="tables">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/admin/categories">Danh sách loại </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/admin/categories/create">Thêm mới</a></li>
                  </ul>
                </div>
              </li>

              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                  <i class="icon-grid-2 menu-icon"></i>
                  <span class="menu-title">quản lý sản phẩm </span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="auth">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/admin/products"> sản phẩm </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/admin/products/create"> thêm sản phẩm </a></li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#end" aria-expanded="false" aria-controls="end">
                  <i class="icon-grid-2 menu-icon"></i>
                  <span class="menu-title">quản lý biến thể </span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="end">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/admin/variants"> biến thể </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/admin/variants/create"> thêm biến thế </a></li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#user" aria-expanded="false" aria-controls="user">
                  <i class="icon-head menu-icon"></i>
                  <span class="menu-title">quản lý người dùng </span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="user">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/admin/users"> người dùng </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/admin/users/create"> thêm người dùng </a></li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#comment" aria-expanded="false" aria-controls="comment">
                  <i class="icon-grid-2 menu-icon"></i>
                  <span class="menu-title">quản lý comment </span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="comment">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/admin/comments"> danh sách bình luận</a></li>
         
                  </ul>
                </div>
              </li>
            </ul>
          </nav>
      <?php

    }
  }
