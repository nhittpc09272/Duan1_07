<?php

namespace App\Views\Client\Pages\Blogs;

use App\Views\BaseView;

class Blog extends BaseView
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
        <link rel="stylesheet" href="/public/assets/client/css/magnific-popup.css">

        <!-- Start Banner Area -->
        <section class="blog_banner_area" style="background: url('https://images.pexels.com/photos/3183150/pexels-photo-3183150.jpeg') no-repeat center center; background-size: cover; height: 300px;">
            <div class="container">
                <div class="text-center" style="padding: 100px 0;">
                    <h1 style="color: #fff; font-size: 3rem; text-shadow: 0px 2px 5px rgba(0, 0, 0, 0.7);">TRANG TIN TỨC 5TV</h1>
                </div>
            </div>
        </section>
        <!-- End Banner Area -->

        <!--================Blog Categorie Area =================-->
        <section class="blog_categorie_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="categories_post" style="margin-bottom: 20px;">
                            <img src="https://images.pexels.com/photos/5946102/pexels-photo-5946102.jpeg" alt="post" width="100%">
                            <div class="categories_details">
                                <div class="categories_text">
                                    <a href="blog-details.html">
                                        <h5>MẪU GIÀY MỚI NHẤT NĂM</h5>
                                    </a>
                                    <p style="margin: 5px 0;">Danh mục: Thời trang</p>
                                    <p style="margin: 5px 0;">Người đăng: Admin</p>
                                    <div class="border_line"></div>
                                    <p>Hãy cùng nhìn ngấm các mẫu giày mới nhất từ store 5TV</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="categories_post" style="margin-bottom: 20px;">
                            <img src="https://images.pexels.com/photos/298864/pexels-photo-298864.jpeg" alt="post" width="100%">
                            <div class="categories_details">
                                <div class="categories_text">
                                    <a href="blog-details.html">
                                        <h5>GIÀY THỂ THAO</h5>
                                    </a>
                                    <p style="margin: 5px 0;">Danh mục: Thể thao</p>
                                    <p style="margin: 5px 0;">Người đăng: Admin</p>
                                    <div class="border_line"></div>
                                    <p>Top những đôi giày thể thao tốt nhất hiện tại</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="categories_post" style="margin-bottom: 20px;">
                            <img src="https://images.pexels.com/photos/3916454/pexels-photo-3916454.jpeg" alt="post" width="100%">
                            <div class="categories_details">
                                <div class="categories_text">
                                    <a href="blog-details.html">
                                        <h5>ĐÁNH GIÁ TỪ NGƯỜI DÙNG</h5>
                                    </a>
                                    <p style="margin: 5px 0;">Danh mục: Đánh giá</p>
                                    <p style="margin: 5px 0;">Người đăng: Admin</p>
                                    <div class="border_line"></div>
                                    <p>Đánh giá từ những người dùng thực tế</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================Blog Categorie Area =================-->

        <!--================Blog Area =================-->
        <section class="blog_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="blog_left_sidebar">
                            <article class="row blog_item">
                                <div class="col-md-3">
                                    <div class="blog_info text-right">
                                        <div class="post_tag">
                                            <a href="#">Thời trang,</a>
                                            <a class="" href="#">Thể thao,</a>
                                            <a href="#">Đánh giá</a>
                                        </div>
                                        <ul class="blog_meta list">
                                            <li><a href="#">Admin<i class="lnr lnr-user"></i></a></li>
                                            <li><a href="#">15 Tháng 11, 2024<i class="lnr lnr-calendar-full"></i></a></li>
                                            <li><a href="#">300 Lượt xem<i class="lnr lnr-eye"></i></a></li>
                                            <li><a href="#">10 Bình luận<i class="lnr lnr-bubble"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="blog_post">
                                        <img src="https://images.pexels.com/photos/1460877/pexels-photo-1460877.jpeg" alt="bài viết">
                                        <div class="blog_details">
                                            <a href="/">
                                                <h2>GIÀY ĐƯỢC YÊU THÍCH NHẤT HIỆN TẠI</h2>
                                            </a>
                                            <p>Đôi giày với thiết kế sang trọng phù hợp cho mọi độ tuổi và nhu cầu sử dụng.</p>
                                            <a href="/" class="white_bg_btn">Xem thêm</a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <!-- Các bài viết khác -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================Blog Area =================-->

<?php
    }
}
?>
