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
                <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-start">
                    <h1 class="text-white font-weight-bold">Trang Danh Mục Sản Phẩm</h1>
                </div>
            </div>
        </section>
        <!-- End Banner Area -->

        <div class="container mt-5">
            <div class="row">
                <!-- Sidebar Categories -->
                <div class="col-xl-3 col-lg-4 col-md-5 mb-5">
                    <div class="sidebar-categories">

?>      

    

        <!-- Start Banner Area -->
        <!-- End Banner Area -->
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-5">
                    <div class="sidebar-categories">
                        <div class="head">Danh Mục Giày</div>
                        <ul class="main-categories">
                            <li class="main-nav-list"><a data-toggle="collapse" href="#fruitsVegetable" aria-expanded="false" aria-controls="fruitsVegetable"><span class="lnr lnr-arrow-right"></span>Giày Chạy Bộ<span class="number">(20)</span></a>
                                <ul class="collapse" id="fruitsVegetable" data-toggle="collapse" aria-expanded="false" aria-controls="fruitsVegetable">
                                    <li class="main-nav-list child"><a href="#">Giày Chạy Bộ<span class="number">(13)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Giày Thể Thao Streetwear<span class="number">(09)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Giày Thể Thao Đa Năng<span class="number">(17)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Sneakers Cao Cấp<span class="number">(01)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Giày Thể Thao Outdoor<span class="number">(11)</span></a></li>
                                </ul>
                            </li>

                            <li class="main-nav-list"><a data-toggle="collapse" href="#fruitsVegetable" aria-expanded="false" aria-controls="fruitsVegetable"><span class="lnr lnr-arrow-right"></span>Giày Thể Thao Streetwear<span class="number">(35)</span></a>
                                <ul class="collapse" id="fruitsVegetable" data-toggle="collapse" aria-expanded="false" aria-controls="fruitsVegetable">
                                    <li class="main-nav-list child"><a href="#">Giày Chạy Bộ<span class="number">(13)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Giày Thể Thao Streetwear<span class="number">(09)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Giày Thể Thao Đa Năng<span class="number">(17)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Sneakers Cao Cấp<span class="number">(01)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Giày Thể Thao Outdoor<span class="number">(11)</span></a></li>
                                </ul>
                            </li>
                            <li class="main-nav-list"><a data-toggle="collapse" href="#fruitsVegetable" aria-expanded="false" aria-controls="fruitsVegetable"><span class="lnr lnr-arrow-right"></span>Giày Thể Thao Đa Năng<span class="number">(80)</span></a>
                                <ul class="collapse" id="fruitsVegetable" data-toggle="collapse" aria-expanded="false" aria-controls="fruitsVegetable">
                                    <li class="main-nav-list child"><a href="#">Giày Chạy Bộ<span class="number">(13)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Giày Thể Thao Streetwear<span class="number">(09)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Giày Thể Thao Đa Năng<span class="number">(17)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Sneakers Cao Cấp<span class="number">(01)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Giày Thể Thao Outdoor<span class="number">(11)</span></a></li>
                                </ul>
                            </li>
                            <li class="main-nav-list"><a data-toggle="collapse" href="#fruitsVegetable" aria-expanded="false" aria-controls="fruitsVegetable"><span class="lnr lnr-arrow-right"></span>Sneakers Cao Cấp<span class="number">(50)</span></a>
                                <ul class="collapse" id="fruitsVegetable" data-toggle="collapse" aria-expanded="false" aria-controls="fruitsVegetable">
                                    <li class="main-nav-list child"><a href="#">Giày Chạy Bộ<span class="number">(13)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Giày Thể Thao Streetwear<span class="number">(09)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Giày Thể Thao Đa Năng<span class="number">(17)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Sneakers Cao Cấp<span class="number">(01)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Giày Thể Thao Outdoor<span class="number">(11)</span></a></li>
                                </ul>
                            </li>
                            <li class="main-nav-list"><a data-toggle="collapse" href="#fruitsVegetable" aria-expanded="false" aria-controls="fruitsVegetable"><span class="lnr lnr-arrow-right"></span>Giày Thể Thao Chuyên Dụng<span class="number">(53)</span></a>
                                <ul class="collapse" id="fruitsVegetable" data-toggle="collapse" aria-expanded="false" aria-controls="fruitsVegetable">
                                    <li class="main-nav-list child"><a href="#">Giày Chạy Bộ<span class="number">(13)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Giày Thể Thao Streetwear<span class="number">(09)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Giày Thể Thao Đa Năng<span class="number">(17)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Sneakers Cao Cấp<span class="number">(01)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Giày Thể Thao Outdoor<span class="number">(11)</span></a></li>
                                </ul>
                            </li>
                            <li class="main-nav-list"><a data-toggle="collapse" href="#fruitsVegetable" aria-expanded="false" aria-controls="fruitsVegetable"><span class="lnr lnr-arrow-right"></span>Giày Thể Thao Outdoor<span class="number">(90)</span></a>
                                <ul class="collapse" id="fruitsVegetable" data-toggle="collapse" aria-expanded="false" aria-controls="fruitsVegetable">
                                    <li class="main-nav-list child"><a href="#">Giày Chạy Bộ<span class="number">(13)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Giày Thể Thao Streetwear<span class="number">(09)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Giày Thể Thao Đa Năng<span class="number">(17)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Sneakers Cao Cấp<span class="number">(01)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Giày Thể Thao Outdoor<span class="number">(11)</span></a></li>
                                </ul>
                            </li>
                            <li class="main-nav-list"><a data-toggle="collapse" href="#fruitsVegetable" aria-expanded="false" aria-controls="fruitsVegetable"><span class="lnr lnr-arrow-right"></span>Giày Thể Thao Yoga & Gym<span class="number">(200)</span></a>
                                <ul class="collapse" id="fruitsVegetable" data-toggle="collapse" aria-expanded="false" aria-controls="fruitsVegetable">
                                    <li class="main-nav-list child"><a href="#">Giày Chạy Bộ<span class="number">(13)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Giày Thể Thao Streetwear<span class="number">(09)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Giày Thể Thao Đa Năng<span class="number">(17)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Sneakers Cao Cấp<span class="number">(01)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Giày Thể Thao Outdoor<span class="number">(11)</span></a></li>
                                </ul>
                            </li>
                            <li class="main-nav-list"><a data-toggle="collapse" href="#fruitsVegetable" aria-expanded="false" aria-controls="fruitsVegetable"><span class="lnr lnr-arrow-right"></span>Giày Thể Thao Bóng Rổ<span class="number">(199 )</span></a>
                                <ul class="collapse" id="fruitsVegetable" data-toggle="collapse" aria-expanded="false" aria-controls="fruitsVegetable">
                                    <li class="main-nav-list child"><a href="#">Giày Chạy Bộ<span class="number">(13)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Giày Thể Thao Streetwear<span class="number">(09)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Giày Thể Thao Đa Năng<span class="number">(17)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Sneakers Cao Cấp<span class="number">(01)</span></a></li>
                                    <li class="main-nav-list child"><a href="#">Giày Thể Thao Outdoor<span class="number">(11)</span></a></li>
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
                                <option value="1">Sắp xếp theo mặc định</option>
                                <option value="2">Sắp xếp theo giá: Thấp đến Cao</option>
                                <option value="3">Sắp xếp theo giá: Cao đến Thấp</option>
                                <option value="4">Sắp xếp theo đánh giá</option>
                                <option value="5">Sắp xếp theo phổ biến</option>
                            </select>
                        </div>
                        <div class="sorting mr-auto">
                            <select>
                                <option value="12">Hiển thị 12 sản phẩm</option>
                                <option value="24">Hiển thị 24 sản phẩm</option>
                                <option value="36">Hiển thị 36 sản phẩm</option>
                            </select>
                        </div>
                    </div>
                    <!-- Kết thúc thanh lọc sản phẩm -->

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
        </div>


<?php

    }
}
