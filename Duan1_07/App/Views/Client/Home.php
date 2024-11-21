<?php

namespace App\Views\Client;

use App\Views\BaseView;

class Home extends BaseView
{
    public static function render($data = null)
    {
?>
        <link href="/public/assets/client/css/bootstrap.min.css" rel="stylesheet">
        <link href="/public/assets/client/css/main.css" rel="stylesheet">
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
        <!-- start features Area -->
        <section class="features-area section_gap">
            <div class="container">
                <div class="row features-inner">
                    <!-- single features -->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-features">
                            <div class="f-icon">
                                <img src="/public/assets/client/img/features/f-icon1.png" alt>
                            </div>
                            <h6>Vận Chuyển Miễn Phí</h6>
                            <p>Miễn phí vận chuyển cho tất cả các đơn hàng</p>
                        </div>
                    </div>
                    <!-- single features -->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-features">
                            <div class="f-icon">
                                <img src="/public/assets/client/img/features/f-icon2.png" alt>
                            </div>
                            <h6>Chính Sách Đổi Trả</h6>
                            <p>Miễn phí vận chuyển cho tất cả các đơn hàng</p>
                        </div>
                    </div>
                    <!-- single features -->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-features">
                            <div class="f-icon">
                                <img src="/public/assets/client/img/features/f-icon3.png" alt>
                            </div>
                            <h6>Hỗ Trợ 24/7</h6>
                            <p>Miễn phí vận chuyển cho tất cả các đơn hàng</p>
                        </div>
                    </div>
                    <!-- single features -->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-features">
                            <div class="f-icon">
                                <img src="/public/assets/client/img/features/f-icon4.png" alt>
                            </div>
                            <h6>Thanh Toán An Toàn</h6>
                            <p>Miễn phí vận chuyển cho tất cả các đơn hàng</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- end features Area -->

        <!-- Start category Area -->
        <section class="category-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-12">
                        <div class="row">
                            <div class="col-lg-8 col-md-8">
                                <div class="single-deal">
                                    <div class="overlay"></div>
                                    <img class="img-fluid w-100"
                                        src="/public/assets/client/img/category/c1.jpg" alt>
                                    <a href="/public/assets/client/img/category/c1.jpg"
                                        class="img-pop-up" target="_blank">
                                        <div class="deal-details">
                                            <h6 class="deal-title">Giày thể thao
                                                cho thể thao</h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="single-deal">
                                    <div class="overlay"></div>
                                    <img class="img-fluid w-100"
                                        src="/public/assets/client/img/category/c2.jpg" alt>
                                    <a href="/public/assets/client/img/category/c2.jpg"
                                        class="img-pop-up" target="_blank">
                                        <div class="deal-details">
                                            <h6 class="deal-title">Giày thể thao
                                                cho thể thao</h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="single-deal">
                                    <div class="overlay"></div>
                                    <img class="img-fluid w-100"
                                        src="/public/assets/client/img/category/c3.jpg" alt>
                                    <a href="/public/assets/client/img/category/c3.jpg"
                                        class="img-pop-up" target="_blank">
                                        <div class="deal-details">
                                            <h6 class="deal-title">Sản phẩm cho
                                                cặp đôi</h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8">
                                <div class="single-deal">
                                    <div class="overlay"></div>
                                    <img class="img-fluid w-100"
                                        src="/public/assets/client/img/category/c4.jpg" alt>
                                    <a href="/public/assets/client/img/category/c4.jpg"
                                        class="img-pop-up" target="_blank">
                                        <div class="deal-details">
                                            <h6 class="deal-title">Giày thể thao
                                                cho thể thao</h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-deal">
                            <div class="overlay"></div>
                            <img class="img-fluid w-100"
                                src="/public/assets/client/img/category/c5.jpg" alt>
                            <a href="/public/assets/client/img/category/c5.jpg" class="img-pop-up"
                                target="_blank">
                                <div class="deal-details">
                                    <h6 class="deal-title">Giày thể thao cho thể
                                        thao</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End category Area -->

        <!-- start product Area -->
        <section class="owl-carousel active-product-area section_gap">
            <!-- single product slide -->
            <div class="single-product-slider">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 text-center">
                            <div class="section-title">
                                <h1>Sản phẩm mới nhất</h1>
                                <p>Khám phá những sản phẩm mới nhất của chúng
                                    tôi! Được thiết kế với chất lượng hàng đầu
                                    và xu hướng thời trang hiện đại, những sản
                                    phẩm này sẽ mang đến cho bạn những trải
                                    nghiệm tuyệt vời và phong cách riêng biệt.
                                    Hãy nhanh tay sở hữu ngay!</p>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <!-- sản phẩm đơn -->
                        <div class="col-lg-3 col-md-6">
                            <div class="single-product">
                                <img class="img-fluid" src="/public/assets/client/img/product/p1.jpg"
                                    alt>
                                <div class="product-details">
                                    <h6>addidas New Hammer sole cho vận động
                                        viên thể thao</h6>
                                    <div class="price">
                                        <h6>₫3,750,000</h6>
                                        <h6 class="l-through">₫5,250,000</h6>
                                    </div>
                                    <div class="prd-bottom">
                                        <a href class="social-info">
                                            <span class="ti-bag"></span>
                                            <p class="hover-text">Thêm vào giỏ
                                                hàng</p>
                                        </a>
                                        <a href class="social-info">
                                            <span class="lnr lnr-heart"></span>
                                            <p class="hover-text">Danh sách yêu
                                                thích</p>
                                        </a>
                                        <a href class="social-info">
                                            <span class="lnr lnr-sync"></span>
                                            <p class="hover-text">So sánh</p>
                                        </a>
                                        <a href class="social-info">
                                            <span class="lnr lnr-move"></span>
                                            <p class="hover-text">Xem thêm</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- sản phẩm đơn -->
                        <div class="col-lg-3 col-md-6">
                            <div class="single-product">
                                <img class="img-fluid" src="/public/assets/client/img/product/p2.jpg"
                                    alt>
                                <div class="product-details">
                                    <h6>addidas New Hammer sole cho vận động
                                        viên thể thao</h6>
                                    <div class="price">
                                        <h6>₫3,750,000</h6>
                                        <h6 class="l-through">₫5,250,000</h6>
                                    </div>
                                    <div class="prd-bottom">
                                        <a href class="social-info">
                                            <span class="ti-bag"></span>
                                            <p class="hover-text">Thêm vào giỏ
                                                hàng</p>
                                        </a>
                                        <a href class="social-info">
                                            <span class="lnr lnr-heart"></span>
                                            <p class="hover-text">Danh sách yêu
                                                thích</p>
                                        </a>
                                        <a href class="social-info">
                                            <span class="lnr lnr-sync"></span>
                                            <p class="hover-text">So sánh</p>
                                        </a>
                                        <a href class="social-info">
                                            <span class="lnr lnr-move"></span>
                                            <p class="hover-text">Xem thêm</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- sản phẩm đơn -->
                        <div class="col-lg-3 col-md-6">
                            <div class="single-product">
                                <img class="img-fluid" src="/public/assets/client/img/product/p3.jpg"
                                    alt>
                                <div class="product-details">
                                    <h6>addidas New Hammer sole cho vận động
                                        viên thể thao</h6>
                                    <div class="price">
                                        <h6>₫3,750,000</h6>
                                        <h6 class="l-through">₫5,250,000</h6>
                                    </div>
                                    <div class="prd-bottom">
                                        <a href class="social-info">
                                            <span class="ti-bag"></span>
                                            <p class="hover-text">Thêm vào giỏ
                                                hàng</p>
                                        </a>
                                        <a href class="social-info">
                                            <span class="lnr lnr-heart"></span>
                                            <p class="hover-text">Danh sách yêu
                                                thích</p>
                                        </a>
                                        <a href class="social-info">
                                            <span class="lnr lnr-sync"></span>
                                            <p class="hover-text">So sánh</p>
                                        </a>
                                        <a href class="social-info">
                                            <span class="lnr lnr-move"></span>
                                            <p class="hover-text">Xem thêm</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- sản phẩm đơn -->
                        <div class="col-lg-3 col-md-6">
                            <div class="single-product">
                                <img class="img-fluid" src="/public/assets/client/img/product/p4.jpg"
                                    alt>
                                <div class="product-details">
                                    <h6>addidas New Hammer sole cho vận động
                                        viên thể thao</h6>
                                    <div class="price">
                                        <h6>₫3,750,000</h6>
                                        <h6 class="l-through">₫5,250,000</h6>
                                    </div>
                                    <div class="prd-bottom">
                                        <a href class="social-info">
                                            <span class="ti-bag"></span>
                                            <p class="hover-text">Thêm vào giỏ
                                                hàng</p>
                                        </a>
                                        <a href class="social-info">
                                            <span class="lnr lnr-heart"></span>
                                            <p class="hover-text">Danh sách yêu
                                                thích</p>
                                        </a>
                                        <a href class="social-info">
                                            <span class="lnr lnr-sync"></span>
                                            <p class="hover-text">So sánh</p>
                                        </a>
                                        <a href class="social-info">
                                            <span class="lnr lnr-move"></span>
                                            <p class="hover-text">Xem thêm</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- sản phẩm đơn -->
                        <div class="col-lg-3 col-md-6">
                            <div class="single-product">
                                <img class="img-fluid" src="/public/assets/client/img/product/p5.jpg"
                                    alt>
                                <div class="product-details">
                                    <h6>addidas New Hammer sole cho vận động
                                        viên thể thao</h6>
                                    <div class="price">
                                        <h6>₫3,750,000</h6>
                                        <h6 class="l-through">₫5,250,000</h6>
                                    </div>
                                    <div class="prd-bottom">
                                        <a href class="social-info">
                                            <span class="ti-bag"></span>
                                            <p class="hover-text">Thêm vào giỏ
                                                hàng</p>
                                        </a>
                                        <a href class="social-info">
                                            <span class="lnr lnr-heart"></span>
                                            <p class="hover-text">Danh sách yêu
                                                thích</p>
                                        </a>
                                        <a href class="social-info">
                                            <span class="lnr lnr-sync"></span>
                                            <p class="hover-text">So sánh</p>
                                        </a>
                                        <a href class="social-info">
                                            <span class="lnr lnr-move"></span>
                                            <p class="hover-text">Xem thêm</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- sản phẩm đơn -->
                        <div class="col-lg-3 col-md-6">
                            <div class="single-product">
                                <img class="img-fluid" src="/public/assets/client/img/product/p6.jpg"
                                    alt>
                                <div class="product-details">
                                    <h6>addidas New Hammer sole cho vận động
                                        viên thể thao</h6>
                                    <div class="price">
                                        <h6>₫3,750,000</h6>
                                        <h6 class="l-through">₫5,250,000</h6>
                                    </div>
                                    <div class="prd-bottom">
                                        <a href class="social-info">
                                            <span class="ti-bag"></span>
                                            <p class="hover-text">Thêm vào giỏ
                                                hàng</p>
                                        </a>
                                        <a href class="social-info">
                                            <span class="lnr lnr-heart"></span>
                                            <p class="hover-text">Danh sách yêu
                                                thích</p>
                                        </a>
                                        <a href class="social-info">
                                            <span class="lnr lnr-sync"></span>
                                            <p class="hover-text">So sánh</p>
                                        </a>
                                        <a href class="social-info">
                                            <span class="lnr lnr-move"></span>
                                            <p class="hover-text">Xem thêm</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- sản phẩm đơn -->
                        <div class="col-lg-3 col-md-6">
                            <div class="single-product">
                                <img class="img-fluid" src="/public/assets/client/img/product/p7.jpg"
                                    alt>
                                <div class="product-details">
                                    <h6>addidas New Hammer sole cho vận động
                                        viên thể thao</h6>
                                    <div class="price">
                                        <h6>₫3,750,000</h6>
                                        <h6 class="l-through">₫5,250,000</h6>
                                    </div>
                                    <div class="prd-bottom">
                                        <a href class="social-info">
                                            <span class="ti-bag"></span>
                                            <p class="hover-text">Thêm vào giỏ
                                                hàng</p>
                                        </a>
                                        <a href class="social-info">
                                            <span class="lnr lnr-heart"></span>
                                            <p class="hover-text">Danh sách yêu
                                                thích</p>
                                        </a>
                                        <a href class="social-info">
                                            <span class="lnr lnr-sync"></span>
                                            <p class="hover-text">So sánh</p>
                                        </a>
                                        <a href class="social-info">
                                            <span class="lnr lnr-move"></span>
                                            <p class="hover-text">Xem thêm</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- sản phẩm đơn -->
                        <div class="col-lg-3 col-md-6">
                            <div class="single-product">
                                <img class="img-fluid" src="/public/assets/client/img/product/p8.jpg"
                                    alt>
                                <div class="product-details">
                                    <h6>addidas New Hammer sole cho vận động
                                        viên thể thao</h6>
                                    <div class="price">
                                        <h6>₫3,750,000</h6>
                                        <h6 class="l-through">₫5,250,000</h6>
                                    </div>
                                    <div class="prd-bottom">
                                        <a href class="social-info">
                                            <span class="ti-bag"></span>
                                            <p class="hover-text">Thêm vào giỏ
                                                hàng</p>
                                        </a>
                                        <a href class="social-info">
                                            <span class="lnr lnr-heart"></span>
                                            <p class="hover-text">Danh sách yêu
                                                thích</p>
                                        </a>
                                        <a href class="social-info">
                                            <span class="lnr lnr-sync"></span>
                                            <p class="hover-text">So sánh</p>
                                        </a>
                                        <a href class="social-info">
                                            <span class="lnr lnr-move"></span>
                                            <p class="hover-text">Xem thêm</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- single product slide -->
            <div class="single-product-slider">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 text-center">
                            <div class="section-title">
                                <h1>Sản phẩm sắp ra mắt</h1>
                                <p>Chúng tôi rất vui được giới thiệu các sản
                                    phẩm mới sắp ra mắt, mang đến những trải
                                    nghiệm tuyệt vời và phong cách hiện đại. Hãy
                                    cùng chúng tôi chờ đón những món đồ độc đáo,
                                    được thiết kế dành riêng cho bạn. Đừng bỏ lỡ
                                    cơ hội sở hữu trước những sản phẩm hot nhất
                                    trong mùa này!</p>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <!-- single product -->
                        <div class="col-lg-3 col-md-6">
                            <div class="single-product">
                                <img class="img-fluid" src="/public/assets/client/img/product/p6.jpg"
                                    alt>
                                <div class="product-details">
                                    <h6>Đế giày New Hammer của addidas dành cho
                                        vận động viên</h6>
                                    <div class="price">
                                        <h6>$150.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                    <div class="prd-bottom">

                                        <a href class="social-info">
                                            <span class="ti-bag"></span>
                                            <p class="hover-text">Thêm vào giỏ
                                                hàng</p>
                                        </a>
                                        <a href class="social-info">
                                            <span class="lnr lnr-heart"></span>
                                            <p class="hover-text">Danh sách yêu
                                                thích</p>
                                        </a>
                                        <a href class="social-info">
                                            <span class="lnr lnr-sync"></span>
                                            <p class="hover-text">So sánh</p>
                                        </a>
                                        <a href class="social-info">
                                            <span class="lnr lnr-move"></span>
                                            <p class="hover-text">Xem thêm</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- single product -->
                        <div class="col-lg-3 col-md-6">
                            <div class="single-product">
                                <img class="img-fluid" src="/public/assets/client/img/product/p8.jpg"
                                    alt>
                                <div class="product-details">
                                    <h6>Đế giày New Hammer của addidas dành cho
                                        vận động viên</h6>
                                    <div class="price">
                                        <h6>$150.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                    <div class="prd-bottom">

                                        <a href class="social-info">
                                            <span class="ti-bag"></span>
                                            <p class="hover-text">Thêm vào giỏ
                                                hàng</p>
                                        </a>
                                        <a href class="social-info">
                                            <span class="lnr lnr-heart"></span>
                                            <p class="hover-text">Danh sách yêu
                                                thích</p>
                                        </a>
                                        <a href class="social-info">
                                            <span class="lnr lnr-sync"></span>
                                            <p class="hover-text">So sánh</p>
                                        </a>
                                        <a href class="social-info">
                                            <span class="lnr lnr-move"></span>
                                            <p class="hover-text">Xem thêm</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- single product -->
                        <div class="col-lg-3 col-md-6">
                            <div class="single-product">
                                <img class="img-fluid" src="/public/assets/client/img/product/p3.jpg"
                                    alt>
                                <div class="product-details">
                                    <h6>Đế giày New Hammer của addidas dành cho
                                        vận động viên</h6>
                                    <div class="price">
                                        <h6>$150.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                    <div class="prd-bottom">

                                        <a href class="social-info">
                                            <span class="ti-bag"></span>
                                            <p class="hover-text">Thêm vào giỏ
                                                hàng</p>
                                        </a>
                                        <a href class="social-info">
                                            <span class="lnr lnr-heart"></span>
                                            <p class="hover-text">Danh sách yêu
                                                thích</p>
                                        </a>
                                        <a href class="social-info">
                                            <span class="lnr lnr-sync"></span>
                                            <p class="hover-text">So sánh</p>
                                        </a>
                                        <a href class="social-info">
                                            <span class="lnr lnr-move"></span>
                                            <p class="hover-text">Xem thêm</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- single product -->
                        <div class="col-lg-3 col-md-6">
                            <div class="single-product">
                                <img class="img-fluid" src="/public/assets/client/img/product/p5.jpg"
                                    alt>
                                <div class="product-details">
                                    <h6>Đế giày New Hammer của addidas dành cho
                                        vận động viên</h6>
                                    <div class="price">
                                        <h6>$150.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                    <div class="prd-bottom">

                                        <a href class="social-info">
                                            <span class="ti-bag"></span>
                                            <p class="hover-text">Thêm vào giỏ
                                                hàng</p>
                                        </a>
                                        <a href class="social-info">
                                            <span class="lnr lnr-heart"></span>
                                            <p class="hover-text">Danh sách yêu
                                                thích</p>
                                        </a>
                                        <a href class="social-info">
                                            <span class="lnr lnr-sync"></span>
                                            <p class="hover-text">So sánh</p>
                                        </a>
                                        <a href class="social-info">
                                            <span class="lnr lnr-move"></span>
                                            <p class="hover-text">Xem thêm</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- single product -->
                        <div class="col-lg-3 col-md-6">
                            <div class="single-product">
                                <img class="img-fluid" src="/public/assets/client/img/product/p1.jpg"
                                    alt>
                                <div class="product-details">
                                    <h6>Đế giày New Hammer của addidas dành cho
                                        vận động viên</h6>
                                    <div class="price">
                                        <h6>$150.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                    <div class="prd-bottom">

                                        <a href class="social-info">
                                            <span class="ti-bag"></span>
                                            <p class="hover-text">Thêm vào giỏ
                                                hàng</p>
                                        </a>
                                        <a href class="social-info">
                                            <span class="lnr lnr-heart"></span>
                                            <p class="hover-text">Danh sách yêu
                                                thích</p>
                                        </a>
                                        <a href class="social-info">
                                            <span class="lnr lnr-sync"></span>
                                            <p class="hover-text">So sánh</p>
                                        </a>
                                        <a href class="social-info">
                                            <span class="lnr lnr-move"></span>
                                            <p class="hover-text">Xem thêm</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- single product -->
                        <div class="col-lg-3 col-md-6">
                            <div class="single-product">
                                <img class="img-fluid" src="/public/assets/client/img/product/p4.jpg"
                                    alt>
                                <div class="product-details">
                                    <h6>Đế giày New Hammer của addidas dành cho
                                        vận động viên</h6>
                                    <div class="price">
                                        <h6>$150.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                    <div class="prd-bottom">

                                        <a href class="social-info">
                                            <span class="ti-bag"></span>
                                            <p class="hover-text">Thêm vào giỏ
                                                hàng</p>
                                        </a>
                                        <a href class="social-info">
                                            <span class="lnr lnr-heart"></span>
                                            <p class="hover-text">Danh sách yêu
                                                thích</p>
                                        </a>
                                        <a href class="social-info">
                                            <span class="lnr lnr-sync"></span>
                                            <p class="hover-text">So sánh</p>
                                        </a>
                                        <a href class="social-info">
                                            <span class="lnr lnr-move"></span>
                                            <p class="hover-text">Xem thêm</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end product Area -->

        <!-- Start exclusive deal Area -->
        <div class="single-product-slider">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-title">
                            <h1>Sản phẩm sắp ra mắt</h1>
                            <p>Chúng tôi rất vui được giới thiệu các sản phẩm
                                mới sắp ra mắt, mang đến những trải nghiệm tuyệt
                                vời và phong cách hiện đại. Hãy cùng chúng tôi
                                chờ đón những món đồ độc đáo, được thiết kế dành
                                riêng cho bạn. Đừng bỏ lỡ cơ hội sở hữu trước
                                những sản phẩm hot nhất trong mùa này!</p>
                        </div>

                    </div>
                </div>
                 <!-- Bắt đầu sản phẩm bán chạy -->
                 <section class="lattest-product-area pb-40 category-list">
                        <div class="row">
                            <!-- sản phẩm đơn -->
                            <div class="col-lg-4 col-md-6">
                                <div class="single-product">
                                    <img class="img-fluid" src="https://assets.adidas.com/images/h_2000,f_auto,q_auto,fl_lossy,c_fill,g_auto/682ac73599d94dbe93e5de76e30ae858_9366/Giay_Cloudfoam_Comfy_Hong_IH6049_01_standard.jpg" alt="">
                                    <div class="product-details">
                                        <h6>Giày Cloudfoam Comfy</h6>
                                        <div class="price">
                                            <h6>Giá giảm: 3,600,000 VND</h6>
                                            <h6><del>Giá gốc: 5,040,000 VND</del></h6>
                                        </div>
                                        <div class="prd-bottom">
                                            <a href="" class="social-info">
                                                <span class="ti-bag"></span>
                                                <p class="hover-text">Thêm vào giỏ</p>
                                            </a>
                                            <a href="" class="social-info">
                                                <span class="lnr lnr-heart"></span>
                                                <p class="hover-text">Danh sách yêu thích</p>
                                            </a>
                                            <a href="" class="social-info">
                                                <span class="lnr lnr-sync"></span>
                                                <p class="hover-text">So sánh</p>
                                            </a>
                                            <a href="" class="social-info">
                                                <span class="lnr lnr-move"></span>
                                                <p class="hover-text">Xem thêm</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- sản phẩm đơn -->
                            <div class="col-lg-4 col-md-6">
                                <div class="single-product">
                                    <img class="img-fluid" src="https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/e5783cc3b92d4eb08feeff8f1b7f3399_9366/Giay_Cloudfoam_Comfy_trang_IH3612_01_standard.jpg" alt="">
                                    <div class="product-details">
                                        <h6>Giày Cloudfoam Comfy</h6>
                                        <div class="price">
                                            <h6>Giá giảm: 3,900,000 VND</h6>
                                            <h6 class="l-through"><del>Giá gốc: 4,040,000 VND</del></h6>
                                        </div>
                                        <div class="prd-bottom">
                                            <a href="" class="social-info">
                                                <span class="ti-bag"></span>
                                                <p class="hover-text">Thêm vào giỏ</p>
                                            </a>
                                            <a href="" class="social-info">
                                                <span class="lnr lnr-heart"></span>
                                                <p class="hover-text">Danh sách yêu thích</p>
                                            </a>
                                            <a href="" class="social-info">
                                                <span class="lnr lnr-sync"></span>
                                                <p class="hover-text">So sánh</p>
                                            </a>
                                            <a href="" class="social-info">
                                                <span class="lnr lnr-move"></span>
                                                <p class="hover-text">Xem thêm</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- sản phẩm đơn -->
                            <div class="col-lg-4 col-md-6">
                                <div class="single-product">
                                    <img class="img-fluid" src="https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/260eb2a54e394aa3ba3367008ab82c31_9366/Giay_Chay_Bo_Pureboost_5_Mau_xanh_da_troi_IF9194_01_00_standard.jpg" alt="">
                                    <div class="product-details">
                                        <h6>Giày Chạy Bộ Pureboost 5</h6>
                                        <div class="price">
                                            <h6>Giá giảm: 2,500,000 VND</h6>
                                            <h6 class="l-through"><del>Giá gốc: 3,800,000 VND</del></h6>
                                        </div>
                                        <div class="prd-bottom">
                                            <a href="" class="social-info">
                                                <span class="ti-bag"></span>
                                                <p class="hover-text">Thêm vào giỏ</p>
                                            </a>
                                            <a href="" class="social-info">
                                                <span class="lnr lnr-heart"></span>
                                                <p class="hover-text">Danh sách yêu thích</p>
                                            </a>
                                            <a href="" class="social-info">
                                                <span class="lnr lnr-sync"></span>
                                                <p class="hover-text">So sánh</p>
                                            </a>
                                            <a href="" class="social-info">
                                                <span class="lnr lnr-move"></span>
                                                <p class="hover-text">Xem thêm</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- sản phẩm đơn -->
                            <div class="col-lg-4 col-md-6">
                                <div class="single-product">
                                    <img class="img-fluid" src="https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/980edbe553334c3db661505b91ba0742_9366/Giay_Chay_Bo_Questar_3_DJen_ID6320_01_standard.jpg" alt="">
                                    <div class="product-details">
                                        <h6>Giày Chạy Bộ Questar 3</h6>
                                        <div class="price">
                                            <h6>Giá giảm: 3,300,000 VND</h6>
                                            <h6 class="l-through"><del>Giá gốc: 4,400,000 VND</del></h6>
                                        </div>
                                        <div class="prd-bottom">
                                            <a href="" class="social-info">
                                                <span class="ti-bag"></span>
                                                <p class="hover-text">Thêm vào giỏ</p>
                                            </a>
                                            <a href="" class="social-info">
                                                <span class="lnr lnr-heart"></span>
                                                <p class="hover-text">Danh sách yêu thích</p>
                                            </a>
                                            <a href="" class="social-info">
                                                <span class="lnr lnr-sync"></span>
                                                <p class="hover-text">So sánh</p>
                                            </a>
                                            <a href="" class="social-info">
                                                <span class="lnr lnr-move"></span>
                                                <p class="hover-text">Xem thêm</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- sản phẩm đơn -->
                            <div class="col-lg-4 col-md-6">
                                <div class="single-product">
                                    <img class="img-fluid" src="https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/28e6310b7f2b4733a1c26858e14e0e00_9366/Giay_Chay_Bo_Ultrarun_5_Nu_Hong_IE8802_01_standard.jpg" alt="">
                                    <div class="product-details">
                                        <h6>Giày Chạy Bộ Ultrarun 5 Nữ</h6>
                                        <div class="price">
                                            <h6>Giá giảm: 2,900,000 VND</h6>
                                            <h6 class="l-through"><del>Giá gốc: 3,660,000 VND</del></h6>
                                        </div>
                                        <div class="prd-bottom">
                                            <a href="" class="social-info">
                                                <span class="ti-bag"></span>
                                                <p class="hover-text">Thêm vào giỏ</p>
                                            </a>
                                            <a href="" class="social-info">
                                                <span class="lnr lnr-heart"></span>
                                                <p class="hover-text">Danh sách yêu thích</p>
                                            </a>
                                            <a href="" class="social-info">
                                                <span class="lnr lnr-sync"></span>
                                                <p class="hover-text">So sánh</p>
                                            </a>
                                            <a href="" class="social-info">
                                                <span class="lnr lnr-move"></span>
                                                <p class="hover-text">Xem thêm</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- sản phẩm đơn -->
                            <div class="col-lg-4 col-md-6">
                                <div class="single-product">
                                    <img class="img-fluid" src="https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/c8d44dde09d84475b4b3cb7b098798f5_9366/Giay_Chay_Bo_adidas_Switch_Fwd_2_Hong_IE5887_01_standard.jpg" alt="">
                                    <div class="product-details">
                                        <h6>Giày Chạy Bộ adidas Switch Fwd 2</h6>
                                        <div class="price">
                                            <h6>Giá giảm: 2,290,000 VND</h6>
                                            <h6 class="l-through"><del>Giá gốc: 3,330,000 VND</del></h6>
                                        </div>
                                        <div class="prd-bottom">
                                            <a href="" class="social-info">
                                                <span class="ti-bag"></span>
                                                <p class="hover-text">Thêm vào giỏ</p>
                                            </a>
                                            <a href="" class="social-info">
                                                <span class="lnr lnr-heart"></span>
                                                <p class="hover-text">Danh sách yêu thích</p>
                                            </a>
                                            <a href="" class="social-info">
                                                <span class="lnr lnr-sync"></span>
                                                <p class="hover-text">So sánh</p>
                                            </a>
                                            <a href="" class="social-info">
                                                <span class="lnr lnr-move"></span>
                                                <p class="hover-text">Xem thêm</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Kết thúc sản phẩm bán chạy -->
            </div>
        </div>

        <!-- End exclusive deal Area -->

        <!-- Start brand Area -->
        <section class="brand-area section_gap">
            <div class="container">
                <div class="row">
                    <a class="col single-img" href="#">
                        <img class="img-fluid d-block mx-auto"
                            src="/public/assets/client/img/brand/1.png" alt>
                    </a>
                    <a class="col single-img" href="#">
                        <img class="img-fluid d-block mx-auto"
                            src="/public/assets/client/img/brand/2.png" alt>
                    </a>
                    <a class="col single-img" href="#">
                        <img class="img-fluid d-block mx-auto"
                            src="/public/assets/client/img/brand/3.png" alt>
                    </a>
                    <a class="col single-img" href="#">
                        <img class="img-fluid d-block mx-auto"
                            src="/public/assets/client/img/brand/4.png" alt>
                    </a>
                    <a class="col single-img" href="#">
                        <img class="img-fluid d-block mx-auto"
                            src="/public/assets/client/img/brand/5.png" alt>
                    </a>
                </div>
            </div>
        </section>
        <!-- End brand Area -->

        <!-- Start related-product Area -->
        <section class="related-product-area section_gap_bottom">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-title">
                            <h1>Ưu Đãi Của Tuần</h1>
                            <p>Khám phá các sản phẩm giày cao gót thời trang với
                                mức giá ưu đãi chỉ có trong tuần này. Chúng tôi
                                cung cấp các mẫu giày đẹp, chất lượng cao và
                                thiết kế hiện đại, chắc chắn sẽ làm bạn hài
                                lòng. Đừng bỏ lỡ cơ hội sở hữu những đôi giày
                                tuyệt vời này với giá hấp dẫn!</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-9">
                        <div class="row">
                            <!-- product 1 -->
                            <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                                <div class="single-related-product d-flex">
                                    <a href="#"><img src="/public/assets/client/img/r1.jpg" alt></a>
                                    <div class="desc">
                                        <a href="#" class="title">Giày cao gót
                                            đen dây ren</a>
                                        <div class="price">
                                            <h6>₫4,347,000</h6>
                                            <h6
                                                class="l-through">₫4,830,000</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- product 2 -->
                            <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                                <div class="single-related-product d-flex">
                                    <a href="#"><img src="/public/assets/client/img/r2.jpg" alt></a>
                                    <div class="desc">
                                        <a href="#" class="title">Giày cao gót
                                            đen dây ren</a>
                                        <div class="price">
                                            <h6>₫4,347,000</h6>
                                            <h6
                                                class="l-through">₫4,830,000</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- product 3 -->
                            <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                                <div class="single-related-product d-flex">
                                    <a href="#"><img src="/public/assets/client/img/r3.jpg" alt></a>
                                    <div class="desc">
                                        <a href="#" class="title">Giày cao gót
                                            đen dây ren</a>
                                        <div class="price">
                                            <h6>₫4,347,000</h6>
                                            <h6
                                                class="l-through">₫4,830,000</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- product 4 -->
                            <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                                <div class="single-related-product d-flex">
                                    <a href="#"><img src="/public/assets/client/img/r5.jpg" alt></a>
                                    <div class="desc">
                                        <a href="#" class="title">Giày cao gót
                                            đen dây ren</a>
                                        <div class="price">
                                            <h6>₫4,347,000</h6>
                                            <h6
                                                class="l-through">₫4,830,000</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- product 5 -->
                            <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                                <div class="single-related-product d-flex">
                                    <a href="#"><img src="/public/assets/client/img/r6.jpg" alt></a>
                                    <div class="desc">
                                        <a href="#" class="title">Giày cao gót
                                            đen dây ren</a>
                                        <div class="price">
                                            <h6>₫4,347,000</h6>
                                            <h6
                                                class="l-through">₫4,830,000</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- product 6 -->
                            <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                                <div class="single-related-product d-flex">
                                    <a href="#"><img src="/public/assets/client/img/r7.jpg" alt></a>
                                    <div class="desc">
                                        <a href="#" class="title">Giày cao gót
                                            đen dây ren</a>
                                        <div class="price">
                                            <h6>₫4,347,000</h6>
                                            <h6
                                                class="l-through">₫4,830,000</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- product 7 -->
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="single-related-product d-flex">
                                    <a href="#"><img src="/public/assets/client/img/r9.jpg" alt></a>
                                    <div class="desc">
                                        <a href="#" class="title">Giày cao gót
                                            đen dây ren</a>
                                        <div class="price">
                                            <h6>₫4,347,000</h6>
                                            <h6
                                                class="l-through">₫4,830,000</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- product 8 -->
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="single-related-product d-flex">
                                    <a href="#"><img src="/public/assets/client/img/r10.jpg" alt></a>
                                    <div class="desc">
                                        <a href="#" class="title">Giày cao gót
                                            đen dây ren</a>
                                        <div class="price">
                                            <h6>₫4,347,000</h6>
                                            <h6
                                                class="l-through">₫4,830,000</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- product 9 -->
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="single-related-product d-flex">
                                    <a href="#"><img src="/public/assets/client/img/r11.jpg" alt></a>
                                    <div class="desc">
                                        <a href="#" class="title">Giày cao gót
                                            đen dây ren</a>
                                        <div class="price">
                                            <h6>₫4,347,000</h6>
                                            <h6
                                                class="l-through">₫4,830,000</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ctg-right">
                            <a href="#" target="_blank">
                                <img class="img-fluid d-block mx-auto"
                                    src="//public/assets/client/img/category/c5.jpg" alt>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php
    }
}
