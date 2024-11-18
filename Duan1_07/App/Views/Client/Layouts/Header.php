<?php

namespace App\Views\Client\Layouts;

use App\Helpers\AuthHelper;
use App\Views\BaseView;

class Header extends BaseView
{
    public static function render($data = null)
    {


?>

        <head>
            <!-- Mobile Specific Meta -->
            <meta name="viewport"
                content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <!-- Favicon-->
            <link rel="shortcut icon" href="img/fav.png">
            <!-- Author Meta -->
            <meta name="author" content="CodePixar">
            <!-- Meta Description -->
            <meta name="description" content>
            <!-- Meta Keyword -->
            <meta name="keywords" content>
            <!-- meta character set -->
            <meta charset="UTF-8">
            <!-- Site Title -->
            <title>Poly Shop</title>
            <!--
		CSS
		============================================= -->
            <link rel="stylesheet" href="/public/assets/client/css/linearicons.css">
            <link rel="stylesheet" href="/public/assets/client/css/font-awesome.min.css">
            <link rel="stylesheet" href="/public/assets/client/css/themify-icons.css">
            <link rel="stylesheet" href="/public/assets/client/css/bootstrap.css">
            <link rel="stylesheet" href="/public/assets/client/css/owl.carousel.css">
            <link rel="stylesheet" href="/public/assets/client/css/nice-select.css">
            <link rel="stylesheet" href="/public/assets/client/css/nouislider.min.css">
            <link rel="stylesheet" href="/public/assets/client/css/ion.rangeSlider.css" />
            <link rel="stylesheet" href="/public/assets/client/css/ion.rangeSlider.skinFlat.css" />
            <link rel="stylesheet" href="/public/assets/client/css/magnific-popup.css">
            <link rel="stylesheet" href="/public/assets/client/css/main.css">
        </head>

        <header class="header_area sticky-header">
            <div class="main_menu">
                <nav class="navbar navbar-expand-lg navbar-light main_box">
                    <div class="container">
                        <!-- Nhãn hiệu và nút điều chỉnh cho hiển thị tốt hơn trên thiết bị di động -->
                        <a class="navbar-brand logo_h" href="index.html"><img
                                src="/public/assets/client/img/logo.png" alt></a>
                        <button class="navbar-toggler" type="button"
                            data-toggle="collapse"
                            data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent"
                            aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!-- Thu thập các liên kết điều hướng, biểu mẫu và nội dung khác -->
                        <div class="collapse navbar-collapse offset"
                            id="navbarSupportedContent">
                            <ul class="nav navbar-nav menu_nav ml-auto">
                                <li class="nav-item active"><a class="nav-link"
                                        href="/">Trang chủ</a></li>
                                <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle"
                                        data-toggle="dropdown" role="button"
                                        aria-haspopup="true"
                                        aria-expanded="false">Cửa hàng</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link"
                                                href="/products">Sản phẩm</a></li>
                                        <li class="nav-item"><a class="nav-link"
                                                href="/">Xác nhận đơn hàng</a></li>
                                        <li class="nav-item"><a class="nav-link"
                                                href="/">Theo dỗi đơn hàng</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item active"><a class="nav-link"
                                        href="/blog">Bài Viết</a></li>
                                <!-- <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle"
                                        data-toggle="dropdown" role="button"
                                        aria-haspopup="true"
                                        aria-expanded="false">Bài viết</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link"
                                                href="/blog">Bài viết</a></li>
                                         <li class="nav-item"><a class="nav-link"
                                                href="single-blog.html">Chi tiết
                                                Blog</a></li> 
                                    </ul>
                                </li> -->
                                <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle"
                                        data-toggle="dropdown" role="button"
                                        aria-haspopup="true"
                                        aria-expanded="false">Trang</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link"
                                                href="login.html">Đăng
                                                nhập</a></li>
                                        <li class="nav-item"><a class="nav-link"
                                                href="tracking.html">Theo dõi
                                                đơn hàng</a></li>
                                        <li class="nav-item"><a class="nav-link"
                                                href="elements.html">Các thành
                                                phần</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="/contact">Liên hệ</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="nav-item"><a href="/cart" class="cart"><span class="ti-bag"></span></a></li>
                                <li class="nav-item"><button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="search_input" id="search_input_box">
                <div class="container">
                    <form class="d-flex justify-content-between">
                        <input type="text" class="form-control" id="search_input" placeholder="Tìm kiếm tại đây">
                        <button type="submit" class="btn"></button>
                        <span class="lnr lnr-cross" id="close_search" title="Đóng tìm kiếm"></span>
                    </form>
                </div>
            </div>
        </header>

        <script src="/public/assets/client/js/vendor/jquery-2.2.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="/public/assets/client/js/vendor/bootstrap.min.js"></script>
        <script src="/public/assets/client/js/jquery.ajaxchimp.min.js"></script>
        <script src="/public/assets/client/js/jquery.nice-select.min.js"></script>
        <script src="/public/assets/client/js/jquery.sticky.js"></script>
        <script src="/public/assets/client/js/nouislider.min.js"></script>
        <script src="/public/assets/client/js/countdown.js"></script>
        <script src="/public/assets/client/js/jquery.magnific-popup.min.js"></script>
        <script src="/public/assets/client/js/owl.carousel.min.js"></script>
        <script src="/public/assets/client/js/gmaps.min.js"></script>
        <script src="/public/assets/client/js/main.js"></script>


<?php

    }
}

?>