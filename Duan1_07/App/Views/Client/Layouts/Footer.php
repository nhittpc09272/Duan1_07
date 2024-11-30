<?php

namespace App\Views\Client\Layouts;

use App\Views\BaseView;

class Footer extends BaseView
{
    public static function render($data = null)
    {
?>
        <!DOCTYPE html>
        <html lang="en">

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



            .container-fluid.bg-img {
                min-height: calc(60vh - 60px);
                /* Điều chỉnh theo chiều cao của footer */
            }

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
            <!-- Footer Start -->
            <div class="container-fluid bg-img text-secondary" style="margin-top: 9%">
                <div class="container">
                    <div class="row gx-5">
                        <div class="col-lg-4 col-md-6 mb-lg-n5">
                            <div class="d-flex flex-column align-items-center justify-content-center text-center border-inner p-4">
                                <a href="index.html">
                                    <img src="/public/assets/client/img/logo1.jpg" alt="" width="100%">

                                    <!-- <h1 class="m-0 text-uppercase text-white"><i class="fa fa-birthday-cake fs-1 text-dark me-3"></i>CakeZone</h1> -->
                                </a>
                                <!-- <p class="mt-3">Lorem diam sit erat dolor elitr et, diam lorem justo labore amet clita labore stet eos magna sit. Elitr dolor eirmod duo tempor lorem, elitr clita ipsum sea. Nonumy rebum et takimata ea takimata amet gubergren, erat rebum magna lorem stet eos. Diam amet et kasd eos duo dolore no.</p> -->
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-6">
                            <div class="row gx-5">
                                <div class="col-lg-4 col-md-12 pt-5 mb-5">
                                    <h4 class="text-primary text-uppercase mb-4">ĐỊA CHỈ</h4>
                                    <div class="d-flex mb-2">
                                        <i class="bi bi-geo-alt text-primary me-2"></i>
                                        <p class="mb-0">FPT POLYTECHNIC</p>
                                    </div>
                                    <div class="d-flex mb-2">
                                        <i class="bi bi-envelope-open text-primary me-2"></i>
                                        <p class="mb-0">store5tv@example.com</p>
                                    </div>
                                    <div class="d-flex mb-2">
                                        <i class="bi bi-telephone text-primary me-2"></i>
                                        <p class="mb-0">084 395 6969</p>
                                    </div>
                                    <div class="d-flex mt-4">
                                        <a class="btn btn-lg btn-primary btn-lg-square border-inner rounded-0 me-2" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                                        <a class="btn btn-lg btn-primary btn-lg-square border-inner rounded-0 me-2" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                                        <a class="btn btn-lg btn-primary btn-lg-square border-inner rounded-0 me-2" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                                    <h4 class="text-primary text-uppercase mb-4">LIÊN KẾT</h4>
                                    <div class="d-flex flex-column justify-content-start">
                                        <a class="text-secondary mb-2" href="/"><i class="bi bi-arrow-right text-primary me-2"></i>TRANG CHỦ</a>
                                        <a class="text-secondary mb-2" href="/product"><i class="bi bi-arrow-right text-primary me-2"></i>SẢN PHẨM</a>
                                        <a class="text-secondary mb-2" href="/about"><i class="bi bi-arrow-right text-primary me-2"></i>GIỚI THIỆU</a>
                                        <a class="text-secondary mb-2" href="/blog"><i class="bi bi-arrow-right text-primary me-2"></i>TIN TỨC</a>
                                        <a class="text-secondary" href="/contact"><i class="bi bi-arrow-right text-primary me-2"></i>LIÊN HỆ</a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                                    <h4 class="text-primary text-uppercase mb-4">TIN TỨC</h4>
                                    <p>Cập nhật thông tin mới nhất liên tục</p>
                                    <form action="">
                                        <div class="input-group">
                                            <input type="text" class="form-control border-white p-3" placeholder="">
                                            <button class="btn btn-primary">ĐĂNG KÍ</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget mail-chimp">
                            <h6 class="mb-20">Instagram Feed</h6>
                            <ul class="instafeed d-flex flex-wrap">
                                <li><img src="/public/assets/client/img/i1.jpg" alt></li>
                                <li><img src="/public/assets/client/img/i2.jpg" alt></li>
                                <li><img src="/public/assets/client/img/i3.jpg" alt></li>
                                <li><img src="/public/assets/client/img/i4.jpg" alt></li>
                                <li><img src="/public/assets/client/img/i5.jpg" alt></li>
                                <li><img src="/public/assets/client/img/i6.jpg" alt></li>
                                <li><img src="/public/assets/client/img/i7.jpg" alt></li>
                                <li><img src="/public/assets/client/img/i8.jpg" alt></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6>Theo Dõi Chúng Tôi</h6>
                            <p>Hãy kết nối với chúng tôi</p>
                            <div
                                class="footer-social d-flex align-items-center">
                                <a href="/"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                                <a href="#"><i class="fa fa-behance"></i></a>
                            </div>
                            <p>Nhom 7</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->


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



<?php

        // unset($_SESSION['success']);
        // unset($_SESSION['error']);
    }
}

?>