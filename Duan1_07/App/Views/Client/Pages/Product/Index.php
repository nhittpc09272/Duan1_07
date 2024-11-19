<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;
use App\Views\Client\Components\Category;

class Index extends BaseView
{
    public static function render($data = null)
    {

?>

        <!-- Start Banner Area -->
        <section class="banner-area organic-breadcrumb">
            <div class="container">
                <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                    <div class="col-first">
                        <h1>Trang Danh Mục Sản Phẩm</h1>
                        <nav class="d-flex align-items-center">
                            <a href="index.html">Trang Chủ<span class="lnr lnr-arrow-right"></span></a>
                            <a href="#">Cửa Hàng<span class="lnr lnr-arrow-right"></span></a>
                            <a href="category.html">Danh Mục Thời Trang</a>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Banner Area -->
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-5">
                    <div class="sidebar-categories">
                        <div class="head">Duyệt Danh Mục</div>
                        <ul class="main-categories">
                            <li class="main-nav-list"><a data-toggle="collapse" href="#fruitsVegetable" aria-expanded="false" aria-controls="fruitsVegetable"><span class="lnr lnr-arrow-right"></span>Hoa Quả và Rau Củ<span class="number">(53)</span></a>
                                <ul class="collapse" id="fruitsVegetable" data-toggle="collapse" aria-expanded="false" aria-controls="fruitsVegetable">
                                    <li class="main-nav-list child"><a href="#">Cá Đông Lạnh<span class="number">(13)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Cá Khô<span class="number">(09)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Cá Tươi<span class="number">(17)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Thực Phẩm Thay Thế Thịt<span class="number">(01)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Thịt<span class="number">(11)</span></a></li>
                                </ul>
                            </li>

                            <li class="main-nav-list"><a data-toggle="collapse" href="#meatFish" aria-expanded="false" aria-controls="meatFish"><span class="lnr lnr-arrow-right"></span>Thịt và Cá<span class="number">(53)</span></a>
                                <ul class="collapse" id="meatFish" data-toggle="collapse" aria-expanded="false" aria-controls="meatFish">
                                    <li class="main-nav-list child"><a href="#">Cá Đông Lạnh<span class="number">(13)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Cá Khô<span class="number">(09)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Cá Tươi<span class="number">(17)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Thực Phẩm Thay Thế Thịt<span class="number">(01)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Thịt<span class="number">(11)</span></a></li>
                                </ul>
                            </li>
                            <li class="main-nav-list"><a data-toggle="collapse" href="#cooking" aria-expanded="false" aria-controls="cooking"><span class="lnr lnr-arrow-right"></span>Đồ Nấu Ăn<span class="number">(53)</span></a>
                                <ul class="collapse" id="cooking" data-toggle="collapse" aria-expanded="false" aria-controls="cooking">
                                    <li class="main-nav-list child"><a href="#">Cá Đông Lạnh<span class="number">(13)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Cá Khô<span class="number">(09)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Cá Tươi<span class="number">(17)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Thực Phẩm Thay Thế Thịt<span class="number">(01)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Thịt<span class="number">(11)</span></a></li>
                                </ul>
                            </li>
                            <li class="main-nav-list"><a data-toggle="collapse" href="#beverages" aria-expanded="false" aria-controls="beverages"><span class="lnr lnr-arrow-right"></span>Đồ Uống<span class="number">(24)</span></a>
                                <ul class="collapse" id="beverages" data-toggle="collapse" aria-expanded="false" aria-controls="beverages">
                                    <li class="main-nav-list child"><a href="#">Cá Đông Lạnh<span class="number">(13)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Cá Khô<span class="number">(09)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Cá Tươi<span class="number">(17)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Thực Phẩm Thay Thế Thịt<span class="number">(01)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Thịt<span class="number">(11)</span></a></li>
                                </ul>
                            </li>
                            <li class="main-nav-list"><a data-toggle="collapse" href="#homeClean" aria-expanded="false" aria-controls="homeClean"><span class="lnr lnr-arrow-right"></span>Nhà và Vệ Sinh<span class="number">(53)</span></a>
                                <ul class="collapse" id="homeClean" data-toggle="collapse" aria-expanded="false" aria-controls="homeClean">
                                    <li class="main-nav-list child"><a href="#">Cá Đông Lạnh<span class="number">(13)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Cá Khô<span class="number">(09)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Cá Tươi<span class="number">(17)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Thực Phẩm Thay Thế Thịt<span class="number">(01)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Thịt<span class="number">(11)</span></a></li>
                                </ul>
                            </li>
                            <li class="main-nav-list"><a href="#">Kiểm Soát Côn Trùng<span class="number">(24)</span></a></li>
                            <li class="main-nav-list"><a data-toggle="collapse" href="#officeProduct" aria-expanded="false" aria-controls="officeProduct"><span class="lnr lnr-arrow-right"></span>Sản Phẩm Văn Phòng<span class="number">(77)</span></a>
                                <ul class="collapse" id="officeProduct" data-toggle="collapse" aria-expanded="false" aria-controls="officeProduct">
                                    <li class="main-nav-list child"><a href="#">Cá Đông Lạnh<span class="number">(13)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Cá Khô<span class="number">(09)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Cá Tươi<span class="number">(17)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Thực Phẩm Thay Thế Thịt<span class="number">(01)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Thịt<span class="number">(11)</span></a></li>
                                </ul>
                            </li>
                            <li class="main-nav-list"><a data-toggle="collapse" href="#beauttyProduct" aria-expanded="false" aria-controls="beauttyProduct"><span class="lnr lnr-arrow-right"></span>Sản Phẩm Làm Đẹp<span class="number">(65)</span></a>
                                <ul class="collapse" id="beauttyProduct" data-toggle="collapse" aria-expanded="false" aria-controls="beauttyProduct">
                                    <li class="main-nav-list child"><a href="#">Cá Đông Lạnh<span class="number">(13)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Cá Khô<span class="number">(09)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Cá Tươi<span class="number">(17)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Thực Phẩm Thay Thế Thịt<span class="number">(01)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Thịt<span class="number">(11)</span></a></li>
                                </ul>
                            </li>
                            <li class="main-nav-list"><a data-toggle="collapse" href="#healthProduct" aria-expanded="false" aria-controls="healthProduct"><span class="lnr lnr-arrow-right"></span>Sản Phẩm Sức Khỏe<span class="number">(29)</span></a>
                                <ul class="collapse" id="healthProduct" data-toggle="collapse" aria-expanded="false" aria-controls="healthProduct">
                                    <li class="main-nav-list child"><a href="#">Cá Đông Lạnh<span class="number">(13)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Cá Khô<span class="number">(09)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Cá Tươi<span class="number">(17)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Thực Phẩm Thay Thế Thịt<span class="number">(01)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Thịt<span class="number">(11)</span></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>


                <div class="col-xl-9 col-lg-8 col-md-7">
                    <!-- Bắt đầu thanh lọc sản phẩm -->
                    <div class="filter-bar d-flex flex-wrap align-items-center">
                        <div class="sorting">
                            <select>
                                <option value="1">Sắp xếp mặc định</option>
                                <option value="1">Sắp xếp mặc định</option>
                                <option value="1">Sắp xếp mặc định</option>
                            </select>
                        </div>
                        <div class="sorting mr-auto">
                            <select>
                                <option value="1">Hiển thị 12</option>
                                <option value="1">Hiển thị 12</option>
                                <option value="1">Hiển thị 12</option>
                            </select>
                        </div>
                        <div class="pagination">
                            <a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
                            <a href="#" class="active">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                            <a href="#">6</a>
                            <a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <!-- Kết thúc thanh lọc sản phẩm -->
                    <!-- Bắt đầu sản phẩm bán chạy -->
                    <section class="lattest-product-area pb-40 category-list">
                        <div class="row">
                            <!-- sản phẩm đơn -->
                            <div class="col-lg-4 col-md-6">
                                <div class="single-product">
                                    <img class="img-fluid" src="/public/assets/client/img/product/p1.jpg" alt="">
                                    <div class="product-details">
                                        <h6>Đế Hammer mới của Adidas
                                            cho người chơi thể thao</h6>
                                        <div class="price">
                                            <h6>3,600,000 VND</h6>
                                            <h6 class="l-through">5,040,000 VND</h6>
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
                                    <img class="img-fluid" src="/public/assets/client/img/product/p2.jpg" alt="">
                                    <div class="product-details">
                                        <h6>Đế Hammer mới của Adidas
                                            cho người chơi thể thao</h6>
                                        <div class="price">
                                            <h6>3,600,000 VND</h6>
                                            <h6 class="l-through">5,040,000 VND</h6>
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
                                    <img class="img-fluid" src="/public/assets/client/img/product/p3.jpg" alt="">
                                    <div class="product-details">
                                        <h6>Đế Hammer mới của Adidas
                                            cho người chơi thể thao</h6>
                                        <div class="price">
                                            <h6>3,600,000 VND</h6>
                                            <h6 class="l-through">5,040,000 VND</h6>
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
                                    <img class="img-fluid" src="/public/assets/client/img/product/p4.jpg" alt="">
                                    <div class="product-details">
                                        <h6>Đế Hammer mới của Adidas
                                            cho người chơi thể thao</h6>
                                        <div class="price">
                                            <h6>3,600,000 VND</h6>
                                            <h6 class="l-through">5,040,000 VND</h6>
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
                                    <img class="img-fluid" src="/public/assets/client/img/product/p5.jpg" alt="">
                                    <div class="product-details">
                                        <h6>Đế Hammer mới của Adidas
                                            cho người chơi thể thao</h6>
                                        <div class="price">
                                            <h6>3,600,000 VND</h6>
                                            <h6 class="l-through">5,040,000 VND</h6>
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
                                    <img class="img-fluid" src="/public/assets/client/img/product/p6.jpg" alt="">
                                    <div class="product-details">
                                        <h6>Đế Hammer mới của Adidas
                                            cho người chơi thể thao</h6>
                                        <div class="price">
                                            <h6>3,600,000 VND</h6>
                                            <h6 class="l-through">5,040,000 VND</h6>
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
        </div>



        



<?php

    }
}
