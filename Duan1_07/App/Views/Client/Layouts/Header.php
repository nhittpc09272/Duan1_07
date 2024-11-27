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
        </style>

        <body>
            <!-- Topbar Start -->
            <div class="container-fluid px-0 d-none d-lg-block">
                <div class="row gx-0">
                    <div class="col-lg-4 text-center bg-secondary py-3">
                        <div class="d-inline-flex align-items-center justify-content-center">
                            <i class="bi bi-envelope fs-1 text-primary me-3"></i>
                            <div class="text-start">
                                <h6 class="text-uppercase mb-1">Email</h6>
                                <span>store5tv@example.com</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center">
                        <div class="d-inline-flex align-items-center justify-content-center">
                            <a href="index.html" class="navbar-brand">
                                <!-- <h1 class="m-0 text-uppercase"><i class="fs-1 text-dark me-3"></i></h1> -->
                                <img src="/public/assets/client//img/logo1.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center bg-secondary py-3">
                        <div class="d-inline-flex align-items-center justify-content-center">
                            <i class="bi bi-phone-vibrate fs-1 text-primary me-3"></i>
                            <div class="text-start">
                                <h6 class="text-uppercase mb-1">Số điện thoại</h6>
                                <span>084 395 6969</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Topbar End -->


            <!-- Navbar Start -->
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow-sm py-3 py-lg-0 px-3 px-lg-0">
                <a href="index.html" class="navbar-brand d-block d-lg-none">
                    <h1 class="m-0 text-uppercase text-white"><i class="fa fa-birthday-cake fs-1 text-primary me-3"></i>CakeZone</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto mx-lg-auto py-0">
                        <a href="/" class="nav-item nav-link">TRANG CHỦ</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">SẢN PHẨM</a>
                            <div class="dropdown-menu m-0">
                                <a href="/products" class="dropdown-item">DANH MỤC</a>
                                <a href="/products" class="dropdown-item">SẢN PHẨM</a>
                            </div>
                        </div>
                        <a href="/about" class="nav-item nav-link">GIỚI THIỆU</a>
                        <a href="/blog" class="nav-item nav-link">TIN TỨC</a>


                        <a href="/contact" class="nav-item nav-link">LIÊN HỆ</a>
                    </div>
                    <div class="d-flex align-items-center">
                        <a href="/cart"
                            class="btn btn-outline-light me-2"
                            style="border-color: orange;"
                            onmouseover="this.style.backgroundColor='orange'; this.style.color='white'; this.style.borderColor='orange';"
                            onmouseout="this.style.backgroundColor='transparent'; this.style.color='white'; this.style.borderColor='white';">
                            <i class="fa fa-shopping-cart me-2"></i>Giỏ Hàng
                        </a>

                    </div>
                    <?php if ($is_login):
                    ?>
                        <li class="nav-item bg-light-pink">
                            <div class="dropdown show">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="border-color: orange;">
                                    Tài khoản
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">

                                    <a class="dropdown-item" href="/users/<?= $_SESSION['user']['user_id'] ?>">
                                        <i class="bi bi-person-circle me-2"></i><?= $_SESSION['user']['username'] ?>
                                    </a>
                                    <a class="dropdown-item" href="/logout"><i class="bi bi-box-arrow-right me-2"></i>Đăng xuất</a>
                                </div>
                            </div>

                        </li>
                    <?php
                    else:
                    ?>
                        <a href="/register"
                            class="btn btn-outline-light me-2"
                            style="border-color: orange;"
                            onmouseover="this.style.backgroundColor='orange'; this.style.color='white'; this.style.borderColor='orange';"
                            onmouseout="this.style.backgroundColor='transparent'; this.style.color='white'; this.style.borderColor='white';">
                            Đăng Ký
                        </a>
                        <a href="/login"
                            class="btn btn-outline-light me-2"
                            style="border-color: orange;"
                            onmouseover="this.style.backgroundColor='orange'; this.style.color='white'; this.style.borderColor='orange';"
                            onmouseout="this.style.backgroundColor='transparent'; this.style.color='white'; this.style.borderColor='white';">
                            Đăng Nhập
                        </a>
                    <?php
                    endif;
                    ?>

                </div>
                    </div>
                    <!-- <div class="d-flex align-items-center">
                        <a href="/cart"
                            class="btn btn-outline-light me-2"
                            style="border-color: orange;"
                            onmouseover="this.style.backgroundColor='orange'; this.style.color='white'; this.style.borderColor='orange';"
                            onmouseout="this.style.backgroundColor='transparent'; this.style.color='white'; this.style.borderColor='white';">
                            <i class="fa fa-shopping-cart me-2"></i>Giỏ Hàng
                        </a>
                        <a href="/register"
                            class="btn btn-outline-light me-2"
                            style="border-color: orange;"
                            onmouseover="this.style.backgroundColor='orange'; this.style.color='white'; this.style.borderColor='orange';"
                            onmouseout="this.style.backgroundColor='transparent'; this.style.color='white'; this.style.borderColor='white';">
                            Đăng Ký
                        </a>
                        <a href="/login"
                            class="btn btn-outline-light me-2"
                            style="border-color: orange;"
                            onmouseover="this.style.backgroundColor='orange'; this.style.color='white'; this.style.borderColor='orange';"
                            onmouseout="this.style.backgroundColor='transparent'; this.style.color='white'; this.style.borderColor='white';">
                            Đăng Nhập.
                        </a>
                    </div> -->
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