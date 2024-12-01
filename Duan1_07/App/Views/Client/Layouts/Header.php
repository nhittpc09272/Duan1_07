<?php

namespace App\Views\Client\Layouts;

use App\Helpers\AuthHelper;
use App\Views\BaseView;

class Header extends BaseView
{
    public static function render($data = null)
    {

        unset($_SESSION['user']);
        $is_login = AuthHelper::checkLogin();


?>

        <head>
            <meta charset="utf-8">
            <title>5TV</title>
            <meta content="width=device-width, initial-scale=1.0" name="viewport">
            <meta content="Free HTML Templates" name="keywords">
            <meta content="Free HTML Templates" name="description">

            <link href="img/favicon.ico" rel="icon">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Oswald:wght@500;600;700&family=Pacifico&display=swap" rel="stylesheet">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
            <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
            <link href="/public/assets/client/css/bootstrap.min.css" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
            <link rel="stylesheet" href="/public/assets/client/css/linearicons.css">
            <link rel="stylesheet" href="/public/assets/client/css/owl.carousel.css">
            <link rel="stylesheet" href="/public/assets/client/css/font-awesome.min.css">
            <link rel="stylesheet" href="/public/assets/client/css/themify-icons.css">
            <link rel="stylesheet" href="/public/assets/client/css/nice-select.css">
            <link rel="stylesheet" href="/public/assets/client/css/nouislider.min.css">
            <link rel="stylesheet" href="/public/assets/client/css/bootstrap.css">
            <link rel="stylesheet" href="/public/assets/client/css/main.css">
        </head>
        <style>
            :root {
                --primary: #E88F2A;
                --secondary: #FAF3EB;
                --light: #FFFFFF;
                --dark: #2B2825;
            }

            .font-secondary {
                font-family: 'Pacifico', cursive;
            }

            h1,
            h2,
            .font-weight-bold {
                font-weight: 700 !important;
            }

            h3,
            h4,
            .font-weight-semi-bold {
                font-weight: 600 !important;
            }

            h5,
            h6,
            .font-weight-medium {
                font-weight: 500 !important;
            }

            .btn {
                font-family: 'Oswald', sans-serif;
                font-weight: 600;
                transition: .5s;
            }

            /* 
            .btn-primary {
                color: #FFFFFF;
            } */

            .border-inner {
                position: relative;
            }

            .border-inner * {
                position: relative;
                z-index: 1;
            }

            .border-inner::before {
                position: absolute;
                content: "";
                top: 10px;
                right: 10px;
                bottom: 10px;
                left: 10px;
                background: none;
                border: 1px solid var(--light);
                z-index: 0;
            }

            .btn-square {
                width: 40px;
                height: 40px;
            }

            .btn-sm-square {
                width: 30px;
                height: 30px;
            }

            .btn-lg-square {
                width: 50px;
                height: 50px;
            }

            .btn-square,
            .btn-sm-square,
            .btn-lg-square {
                padding-left: 0;
                padding-right: 0;
                text-align: center;
            }

            .back-to-top {
                position: fixed;
                display: none;
                right: 30px;
                bottom: 0;
                border-radius: 0;
                z-index: 99;
            }

            .navbar-dark .navbar-nav .nav-link {
                font-family: 'Oswald', sans-serif;
                padding: 30px 15px;
                font-size: 18px;
                font-weight: 500;
                text-transform: uppercase;
                color: var(--light);
                outline: none;
                transition: .5s;
            }

            .sticky-top.navbar-dark .navbar-nav .nav-link {
                padding: 20px 15px;
            }

            .navbar-dark .navbar-nav .nav-link:hover,
            .navbar-dark .navbar-nav .nav-link.active {
                color: var(--primary);
            }

            @media (max-width: 991.98px) {
                .navbar-dark .navbar-nav .nav-link {
                    padding: 10px 0;
                }
            }

            .banner1-header {
                background: url(/public/assets/client/img/banner1.jpg);
                background-size: cover;
            }

            .btn-play {
                position: relative;
                display: block;
                box-sizing: content-box;
                width: 16px;
                height: 26px;
                border-radius: 100%;
                border: none;
                outline: none !important;
                padding: 18px 20px 20px 28px;
                background: #FFFFFF;
            }

            .btn-play:before {
                content: "";
                position: absolute;
                z-index: 0;
                left: 50%;
                top: 50%;
                transform: translateX(-50%) translateY(-50%);
                display: block;
                width: 60px;
                height: 60px;
                background: #FFFFFF;
                border-radius: 100%;
                animation: pulse-border 1500ms ease-out infinite;
            }

            .btn-play:after {
                content: "";
                position: absolute;
                z-index: 1;
                left: 50%;
                top: 50%;
                transform: translateX(-50%) translateY(-50%);
                display: block;
                width: 60px;
                height: 60px;
                background: #FFFFFF;
                border-radius: 100%;
                transition: all 200ms;
            }

            .btn-play span {
                display: block;
                position: relative;
                z-index: 3;
                width: 0;
                height: 0;
                left: -1px;
                border-left: 16px solid var(--primary);
                border-top: 11px solid transparent;
                border-bottom: 11px solid transparent;
            }

            @keyframes pulse-border {
                0% {
                    transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1);
                    opacity: 1;
                }

                100% {
                    transform: translateX(-50%) translateY(-50%) translateZ(0) scale(2);
                    opacity: 0;
                }
            }

            #videoModal .modal-dialog {
                position: relative;
                max-width: 800px;
                margin: 60px auto 0 auto;
            }

            #videoModal .modal-body {
                position: relative;
                padding: 0px;
            }

            #videoModal .close {
                position: absolute;
                width: 30px;
                height: 30px;
                right: 0px;
                top: -30px;
                z-index: 999;
                font-size: 30px;
                font-weight: normal;
                color: #FFFFFF;
                background: #000000;
                opacity: 1;
            }

            .section-title::before {
                position: absolute;
                content: "";
                width: 60px;
                height: 10px;
                left: 50%;
                bottom: 0;
                margin-left: -30px;
                background: var(--primary);
            }

            .section-title::after {
                position: absolute;
                content: "";
                width: 180px;
                height: 2px;
                left: 50%;
                bottom: 4px;
                margin-left: -90px;
                background: var(--primary);
            }

            .service::after,
            .contact::after {
                position: absolute;
                content: "";
                width: 100%;
                height: calc(100% - 45px);
                top: 135px;
                left: 0;
                background: linear-gradient(rgba(43, 40, 37, .9), rgba(43, 40, 37, .9)), url(../img/service.jpg) center center no-repeat;
                background-size: cover;
                z-index: -1;
            }

            .contact::after {
                background: linear-gradient(rgba(43, 40, 37, .5), rgba(43, 40, 37, .5)), url(../img/bg.jpg) center center no-repeat;
                background-size: cover;
            }

            .bg-offer {
                background: linear-gradient(rgba(43, 40, 37, .9), rgba(43, 40, 37, .9)), url(../img/offer.jpg) center center no-repeat;
                background-size: cover;
            }

            .team-item img {
                transition: .5s;
            }

            .team-item:hover img {
                transform: scale(1.1);
                filter: blur(5px)
            }

            .team-item .team-overlay {
                transition: .5s;
                opacity: 0;
            }

            .team-item:hover .team-overlay {
                opacity: 1;
            }

            .testimonial-carousel .owl-dots {
                height: 45px;
                margin-top: 30px;
                display: flex;
                align-items: flex-end;
                justify-content: center;
            }

            .testimonial-carousel .owl-dot {
                position: relative;
                display: inline-block;
                margin: 0 2px;
                width: 10px;
                height: 25px;
                background: #DDDDDD;
                transition: .5s;
            }

            .testimonial-carousel .owl-dot.active {
                height: 45px;
                background: var(--primary);
            }

            .testimonial-carousel .owl-item .testimonial-item {
                opacity: .1;
                transition: .5s;
            }

            .testimonial-carousel .owl-item.center .testimonial-item {
                opacity: 1;
            }

            .bg-img {
                background: linear-gradient(rgba(43, 40, 37, .5), rgba(43, 40, 37, .5)), url(../img/bg.jpg) center center no-repeat;
                background-size: cover;
            }

            :root {
                --primary-color: #FF6F00;
                /* Cam chính */
                --secondary-color: #FFA000;
                /* Cam nhạt */
                --dark-color: #212121;
                /* Đen */
                --light-color: #FFFFFF;
                /* Trắng */
                --text-color: #333333;
                /* Đen nhạt */
            }

            body {
                font-family: 'Roboto', sans-serif;
                color: var(--text-color);
                background-color: #F5F5F5;
            }

            /* Topbar Styles */
            .topbar {
                background-color: var(--primary-color);
                color: var(--light-color);
                padding: 10px 0;
            }

            .topbar-contact {
                display: flex;
                align-items: center;
                gap: 20px;
            }

            .topbar-contact a {
                color: var(--light-color);
                text-decoration: none;
                display: flex;
                align-items: center;
                gap: 10px;
                transition: opacity 0.3s ease;
            }

            .topbar-contact a:hover {
                opacity: 0.8;
            }

            .topbar-contact i {
                font-size: 1.2rem;
            }

            .social-links a {
                color: var(--light-color);
                margin-left: 10px;
                transition: transform 0.3s ease;
            }

            .social-links a:hover {
                transform: scale(1.2);
            }

            /* Navbar Styles */
            .navbar-custom {
                background-color: var(--light-color);
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            .navbar-brand img {
                max-height: 60px;
                transition: transform 0.3s ease;
            }

            .navbar-brand img:hover {
                transform: scale(1.05);
            }

            .nav-link {
                color: var(--dark-color) !important;
                position: relative;
                font-weight: 600;
                text-transform: uppercase;
                margin: 0 10px;
                transition: all 0.3s ease;
            }

            .nav-link::after {
                content: '';
                position: absolute;
                width: 0;
                height: 3px;
                bottom: -5px;
                left: 0;
                background-color: var(--primary-color);
                transition: width 0.3s ease;
            }

            .nav-link:hover::after {
                width: 100%;
            }

            .nav-link:hover {
                color: var(--primary-color) !important;
            }

            /* Dropdown Styles */
            .dropdown-menu {
                background-color: var(--light-color);
                border: 1px solid var(--primary-color);
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            .dropdown-item {
                color: var(--dark-color);
                transition: all 0.3s ease;
            }

            .dropdown-item:hover {
                background-color: var(--primary-color);
                color: var(--light-color);
            }

            /* Button Styles */
            .btn-outline-custom {
                border: 2px solid var(--primary-color);
                color: var(--primary-color);
                background-color: transparent;
                transition: all 0.3s ease;
            }

            .btn-outline-custom:hover {
                background-color: var(--primary-color);
                color: var(--light-color);
            }

            .btn-cart {
                position: relative;
            }

            .cart-badge {
                position: absolute;
                top: -8px;
                right: -8px;
                background-color: var(--secondary-color);
                color: var(--light-color);
                border-radius: 50%;
                padding: 2px 6px;
                font-size: 0.7rem;
            }

            /* Responsive Adjustments */
            @media (max-width: 991px) {
                .topbar-contact {
                    flex-direction: column;
                    align-items: flex-start;
                }
            }
        </style>

        <body>
            <!-- Topbar Start -->
            <div class="container-fluid topbar">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 topbar-contact">
                            <a href="mailto:store5tv@example.com">
                                <i class="fas fa-envelope"></i> store5tv@example.com
                            </a>
                            <a href="tel:0843956969">
                                <i class="fas fa-phone"></i> 084 395 6969
                            </a>
                        </div>
                        <div class="col-lg-6 text-end d-none d-lg-block">
                            <div class="social-links">
                                <a href="#" class="text-light mx-2"><i class="fab fa-facebook"></i></a>
                                <a href="#" class="text-light mx-2"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="text-light mx-2"><i class="fab fa-tiktok"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Topbar End -->

            <!-- Navbar Start -->
            <nav class="navbar navbar-expand-lg navbar-custom">
                <div class="container">
                    <!-- Logo -->
                    <a class="navbar-brand" href="/">
                        <img src="/public/assets/client/img/logo1.jpg" alt="5TV Logo" class="img-fluid">
                    </a>

                    <!-- Mobile Toggle -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Navigation Links -->
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="/">Trang Chủ</a>
                            </li>
                            <!-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                    Sản Phẩm
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/products/categories">Danh Mục</a></li>
                                    <li><a class="dropdown-item" href="/products">Tất Cả Sản Phẩm</a></li>
                                    <li><a class="dropdown-item" href="/products/new">Sản Phẩm Mới</a></li>
                                    <li><a class="dropdown-item" href="/products/sale">Khuyến Mãi</a></li>
                                </ul>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link" href="/products">Sản Phẩm</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/about">Giới Thiệu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/blog">Tin Tức</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/contact">Liên Hệ</a>
                            </li>
                        </ul>

                        <!-- Action Buttons -->
                        <div class="d-flex align-items-center">
                            <!-- Giỏ Hàng -->
                            <a href="/cart" class="btn btn-outline-custom me-2">
                                <i class="fas fa-shopping-cart me-2"></i>Giỏ Hàng
                            </a>

                            <!-- Đăng Nhập/Tài Khoản -->
                            <?php if ($is_login): ?>
                                <div class="dropdown">
                                    <button class="btn btn-outline-custom dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                        <i class="fas fa-user me-2"></i>Tài K Khoản
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/users/profile"><?= $_SESSION['user']['username'] ?></a></li>
                                        <li><a class="dropdown-item" href="/orders">Đơn Hàng</a></li>
                                        <li><a class="dropdown-item" href="/logout">Đăng Xuất</a></li>
                                    </ul>
                                </div>
                            <?php else: ?>
                                <a href="/register" class="btn btn-outline-custom me-2">Đăng Ký</a>
                                <a href="/login" class="btn btn-outline-custom">Đăng Nhập</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Hero Start -->
            <div class="container-fluid py-5 mb-5 banner1-header">
                <!-- <img class="img-fluid" src="img/banner1.jpg" alt=""> -->
                <div class="container py-5">
                    <div class="row justify-content-start">
                        <div class="col-lg-8 text-center text-lg-start">
                            <h1 class="font-secondary text-primary mb-4">Super Crispy</h1>
                            <h1 class="display-1 text-uppercase text-primary mb-4">CakeZone</h1>
                            <h1 class="text-uppercase text-primary">The Best Cake In London</h1>
                            <div class="d-flex align-items-center justify-content-center justify-content-lg-start pt-5">
                                <a href="" class="btn btn-primary border-inner py-3 px-5 me-5">Read More</a>
                                <button type="button" class="btn-play" data-bs-toggle="modal"
                                    data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                                    <span></span>
                                </button>
                                <h5 class="font-weight-normal text-primary m-0 ms-4 d-none d-sm-block">Play Video</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Hero End -->


            <!-- Video Modal Start -->
            <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content rounded-0">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- 16:9 aspect ratio -->
                            <div class="ratio ratio-16x9">
                                <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                                    allow="autoplay"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Video Modal End -->
            <!-- Back to Top -->
            <a href="#" class="btn btn-primary border-inner py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>


            <!-- JavaScript Libraries -->
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
            <script src="/public/assets/client/lib/easing/easing.min.js"></script>
            <script src="/public/assets/client/lib/waypoints/waypoints.min.js"></script>
            <script src="/public/assets/client/lib/counterup/counterup.min.js"></script>
            <script src="/public/assets/client/lib/owlcarousel/owl.carousel.min.js"></script>

            <!-- Template Javascript -->
            <script src="/public/assets/client/js/main1.js"></script>
        </body>

        </html>

<?php

    }
}

?>