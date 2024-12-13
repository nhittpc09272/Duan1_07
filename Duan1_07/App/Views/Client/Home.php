<?php

namespace App\Views\Client;

use App\Views\BaseView;

class Home extends BaseView
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
            <?php unset($_SESSION['notification']); ?>
        <?php endif; ?>
        <link href="/public/assets/client/css/bootstrap.min.css" rel="stylesheet">
        <link href="/public/assets/client/css/main.css" rel="stylesheet">
        <link rel="stylesheet" href="/public/assets/client/css/linearicons.css">
        <link rel="stylesheet" href="/public/assets/client/css/font-awesome.min.css">
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
                    </div> <br>
                    <div class="row">
                        <!-- sản phẩm đơn -->
                        <div class="col-lg-3 col-md-6">
                            <div class="single-product">
                                <img class="img-fluid" src="/public/assets/client/img/image-1733047876131.webp"
                                    alt>
                                <div class="product-details">
                                    <a href="http://127.0.0.1:8081/products/13">Giày sneaker nữ adidas runfalcon 3.0 "green spark" ie0750 - hàng chính hãng</a>
                                    <div class="price">
                                        <h6>1.050.000 VND</h6>
                                        <h6 class="l-through">5.250.000 VND</h6>
                                    </div>
                                    <!-- <div class="prd-bottom">
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
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <!-- sản phẩm đơn -->
                        <div class="col-lg-3 col-md-6">
                            <div class="single-product">
                                <img class="img-fluid" src="/public/assets/client/img/image-1732457721932.webp"
                                    alt>
                                <div class="product-details">
                                    <a href="http://127.0.0.1:8081/products/15">Giày thời trang adidas samba og unisex ”cloud white/night indigo" if3814
                                    </a>
                                    <div class="price">
                                        <h6>1.890.000 VND</h6>
                                        <h6 class="l-through">3.200.000 VND</h6>
                                    </div>
                                    <!-- <div class="prd-bottom">
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
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <!-- sản phẩm đơn -->
                        <div class="col-lg-3 col-md-6">
                            <div class="single-product">
                                <img class="img-fluid" src="/public/assets/client/img/giay-nike-jordan-1-low-hf5753-22-6-1731905829554.webp" style="width:800px; height:305px;"
                                    alt>
                                <div class="product-details">
                                    <a href="http://127.0.0.1:8081/products/16">Giày sneaker nam nike air jordan 1 low "brown/white" hf5753-221 - chính hãng</a>
                                    <div class="price">
                                        <h6>3.200.000 VND</h6>
                                        <h6 class="l-through">4.250.000 VND</h6>
                                    </div>
                                    <!-- <div class="prd-bottom">
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
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <!-- sản phẩm đơn -->
                        <div class="col-lg-3 col-md-6">
                            <div class="single-product">
                                <img class="img-fluid" src="/public/assets/client/img/giay-nike-air-jordan-1-low-55355-7.webp" style="width:800px; height:305px;" alt="">
                                <div class="product-details">
                                    <a href="http://127.0.0.1:8081/products/17">Giày sneaker nam nike air jordan 1 low "blue/white" 553558-007</a>
                                    <div class="price">
                                        <h6>2.800.000 VND</h6>
                                        <h6 class="l-through">4.100.000 VND</h6>
                                    </div>
                                    <!-- <div class="prd-bottom">
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
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <!-- sản phẩm đơn -->
                        <div class="col-lg-3 col-md-6">
                            <div class="single-product">
                                <img class="img-fluid" src="/public/assets/client/img/image-1731902747769.webp" style="width:800px; height:305px;" alt="">
                                <div class="product-details">
                                    <a href="http://127.0.0.1:8081/products/18">Giày sneaker nike air jordan nữ 1 low "grey/white" cz0858-110 - chính hãng</a>
                                    <div class="price">
                                        <h6>2.600.000 VND</h6>
                                        <h6 class="l-through">3.500.000 VND</h6>
                                    </div>
                                    <!-- <div class="prd-bottom">
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
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <!-- sản phẩm đơn -->
                        <div class="col-lg-3 col-md-6">
                            <div class="single-product">
                                <img class="img-fluid" src="/public/assets/client/img/db0fcd476ffc22a1dfd1e6e6b4f7ffc5-1731901424150.webp" style="width:800px; height:305px;"
                                    alt>
                                <div class="product-details">
                                    <a href="http://127.0.0.1:8081/products/19">Giày sneakers nike nữ air jordan 1 low "grey" 553560-172 - hàng chính hãng</a>
                                    <div class="price">
                                        <h6>2.500.000 VND</h6>
                                        <h6 class="l-through">3.500.000 VND</h6>
                                    </div>
                                    <!-- <div class="prd-bottom">
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
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <!-- sản phẩm đơn -->
                        <div class="col-lg-3 col-md-6">
                            <div class="single-product">
                                <img class="img-fluid" src="/public/assets/client/img/image-1731482400410.webp"
                                    alt>
                                <div class="product-details">
                                    <a href="http://127.0.0.1:8081/products/20">
                                    Giày thể thao nữ adidas ultrabounce "black white" hp5787 - chính hãng</a>
                                    <div class="price">
                                        <h6>1.190.000 VND</h6>
                                        <h6 class="l-through">2.220.000 VND</h6>
                                    </div>
                                    <!-- <div class="prd-bottom">
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
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <!-- sản phẩm đơn -->
                        <div class="col-lg-3 col-md-6">
                            <div class="single-product">
                                <img class="img-fluid" src="/public/assets/client/img/image-1731482740789.webp" style="width:800px; height:305px;"
                                    alt>
                                <div class="product-details">
                                    <a href="http://127.0.0.1:8081/products/21">Giày thể thao nam nike men`s initiator " white/ metallic cool grey" 394055-101</a>
                                    <div class="price">
                                        <h6>1.150.000 VND</h6>
                                        <h6 class="l-through">3.100.000 VND</h6>
                                    </div>
                                    <!-- <div class="prd-bottom">
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
                                    </div> -->
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
        <br>
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
                                <img class="img-fluid" src="/public/assets/client/img/image-1731482178402.webp" alt="">
                                <div class="product-details">
                                    <a href="http://127.0.0.1:8081/products/22">Giày thể thao adidas alphacomfy "clear pink" id0352 - hàng chính hãng</a>
                                    <div class="price">
                                        <h6>Giá giảm: 1.250.000 VND</h6>
                                        <h6><del>Giá gốc: 1.500.000 VND</del></h6>
                                    </div>
                                    <!-- <div class="prd-bottom">
                                        <a href="/cart" class="social-info">
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
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <!-- sản phẩm đơn -->
                        <div class="col-lg-4 col-md-6">
                            <div class="single-product">
                                <img class="img-fluid" src="/public/assets/client/img/giay-nike-jordan-1-fj3458-160-1-1731905189827.webp" style="width:800px; height:417px" alt="">
                                <div class="product-details">
                                    <a href="http://127.0.0.1:8081/products/24">Giày sneaker nam nike air jordan 1 mid se "red/white" fj3458-160 - hàng chính hãng</a>
                                    <div class="price">
                                        <h6>Giá giảm: 2.500.000 VND</h6>
                                        <h6 class="l-through"><del>Giá gốc: 4.040.000 VND</del></h6>
                                    </div>
                                    <!-- <div class="prd-bottom">
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
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <!-- sản phẩm đơn -->
                        <div class="col-lg-4 col-md-6">
                            <div class="single-product">
                                <img class="img-fluid" src="/public/assets/client/img/image-1731482297851.webp" alt="">
                                <div class="product-details">
                                    <a href="http://127.0.0.1:8081/products/23">Giày thể thao nữ adidas ultrabounce "cloud white" hp5788 - hàng chính hãng</a>
                                    <div class="price">
                                        <h6>Giá giảm: 1.050.000 VND</h6>
                                        <h6 class="l-through"><del>Giá gốc: 2.500.000 VND</del></h6>
                                    </div>
                                    <!-- <div class="prd-bottom">
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
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <!-- sản phẩm đơn -->
                        <div class="col-lg-4 col-md-6">
                            <div class="single-product">
                                <img class="img-fluid" src="/public/assets/client/img/image-1731379213340.webp" alt="">
                                <div class="product-details">
                                    <a href="http://127.0.0.1:8081/products/25">Giày sneaker adidas forum mod low "charcoal" ig3761 - hàng chính hãng</a>
                                    <div class="price">
                                        <h6>Giá giảm: 1.350.000 VND</h6>
                                        <h6 class="l-through"><del>Giá gốc: 2.800.000 VND</del></h6>
                                    </div>
                                    <!-- <div class="prd-bottom">
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
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <!-- sản phẩm đơn -->
                        <div class="col-lg-4 col-md-6">
                            <div class="single-product">
                                <img class="img-fluid" src="https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/28e6310b7f2b4733a1c26858e14e0e00_9366/Giay_Chay_Bo_Ultrarun_5_Nu_Hong_IE8802_01_standard.jpg" alt="">
                                <div class="product-details">
                                    <a href="http://127.0.0.1:8081/products/19">Giày Chạy Bộ Ultrarun 5 Nữ</a>
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
                                    <a href="http://127.0.0.1:8081/products/20">Giày Chạy Bộ adidas Switch Fwd 2</a>
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
                </div> <br>
                <div class="row">
                    <div class="col-lg-9">
                        <div class="row">
                            <!-- product 1 -->
                            <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                                <div class="single-related-product d-flex">
                                    <a href="#"><img src="/public/assets/client/img/giay-puma-rebound-v6-low-nam-trang-xanh-02-800x800.jpg" style="width: 150px; height: 180px;" alt=></a>
                                    <div class="desc">
                                        <a href="#" class="title">Giày Puma Rebound v6 Low Nam - Trắng Xanh</a>
                                        <div class="price">
                                            <h6>1.790.000 VND</h6>
                                            <h6
                                                class="l-through">2.850.000 VND</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- product 2 -->
                            <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                                <div class="single-related-product d-flex">
                                    <a href="#"><img src="/public/assets/client/img/giay-adidas-grand-court-base-2-nam-xam-01-800x800.jpg" style="width: 150px; height: 180px;" alt=></a>
                                    <div class="desc">
                                        <a href="#" class="title">Giày adidas Grand Court Base 2.0 Nam - Xám</a>
                                        <div class="price">
                                            <h6>1.690.000 VND</h6>
                                            <h6
                                                class="l-through">2.000.000 VND</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- product 3 -->
                            <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                                <div class="single-related-product d-flex">
                                    <a href="#"><img src="/public/assets/client/img/giay-lacoste-angular-textile-nam-trang-nau-01-800x800.jpg" style="width: 150px; height: 180px;" alt=></a>
                                    <div class="desc">
                                        <a href="#" class="title">Giày Lacoste Angular Textile Nam - Trắng Nâu</a>
                                        <div class="price">
                                            <h6>2.690.000 VND</h6>
                                            <h6
                                                class="l-through">4.250.000 VND</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- product 4 -->
                            <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                                <div class="single-related-product d-flex">
                                    <a href="#"><img src="/public/assets/client/img/giay-adidas-superstar-nam-trang-xanh-la-01-800x800.jpg" style="width: 150px; height: 180px;" alt=></a>
                                    <div class="desc">
                                        <a href="#" class="title">Giày adidas Superstar Nam Nữ - Trắng Xanh lá</a>
                                        <div class="price">
                                            <h6>1.990.000 VND</h6>
                                            <h6
                                                class="l-through">2.600.000 VND</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- product 5 -->
                            <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                                <div class="single-related-product d-flex">
                                    <a href="#"><img src="/public/assets/client/img/giay-nike-air-xax-axis-nam-trang-den-02-800x800.jpg" style="width: 150px; height: 180px;" alt=></a>
                                    <div class="desc">
                                        <a href="#" class="title">Giày Nike Air Max Axis Nam - Trắng Đen</a>
                                        <div class="price">
                                            <h6>2.190.000 VND</h6>
                                            <h6
                                                class="l-through">3.310.000 VND</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- product 6 -->
                            <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                                <div class="single-related-product d-flex">
                                    <a href="#"><img src="/public/assets/client/img/giay-nike-interact-run-nu-hong-nhe-02-1000x1000.jpg" style="width: 150px; height: 180px;" alt=></a>
                                    <div class="desc">
                                        <a href="#" class="title">Giày Nike Interact Run Nữ - Hồng Nhẹ</a>
                                        <div class="price">
                                            <h6>2.090.000 VND</h6>
                                            <h6
                                                class="l-through">2.479.000 VND</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- product 7 -->
                            <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                                <div class="single-related-product d-flex">
                                    <a href="#"><img src="/public/assets/client/img/giay-nike-air-max-systm-nu-trang-xanh-xam-02-800x800.jpg" style="width: 150px; height: 180px;" alt=></a>
                                    <div class="desc">
                                        <a href="#" class="title">Giày Nike Air Max SYSTM Nữ - Trắng Xanh Xám</a>
                                        <div class="price">
                                            <h6>2.290.000 VND</h6>
                                            <h6
                                                class="l-through">3.050.000 VND</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- product 8 -->
                            <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                                <div class="single-related-product d-flex">
                                    <a href="#"><img src="/public/assets/client/img/giay-adidas-eastrail-2-nam-den.01-800x800.jpg" style="width: 150px; height: 180px;" alt=></a>
                                    <div class="desc">
                                        <a href="#" class="title">Giày Adidas Eastrail 2 Nam - Đen</a>
                                        <div class="price">
                                            <h6>1.990.000 VND</h6>
                                            <h6
                                                class="l-through">2.800.000 VND</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- product 9 -->
                            <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                                <div class="single-related-product d-flex">
                                    <a href="#"><img src="/public/assets/client/img/giay-adidas-ultrabounce-nam-xam-01-800x800.jpg" style="width: 150px; height: 180px;" alt=></a>
                                    <div class="desc">
                                        <a href="#" class="title">Giày Adidas Ultrabounce Nam- Xám</a>
                                        <div class="price">
                                            <h6>1.790.000 VND</h6>
                                            <h6
                                                class="l-through">2.400.000 VND</h6>
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
