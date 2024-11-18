<?php

namespace App\Views\Client\Pages\Blogs;

use App\Views\BaseView;

class Blog extends BaseView
{
    public static function render($data = null)
    {

?>
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Trang Blog</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Blog</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Blog Categorie Area =================-->
    <section class="blog_categorie_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="categories_post">
                        <img src="/public/assets/client/img/blog/cat-post/cat-post-3.jpg" alt="post">
                        <div class="categories_details">
                            <div class="categories_text">
                                <a href="blog-details.html">
                                    <h5>Cuộc Sống Xã Hội</h5>
                                </a>
                                <div class="border_line"></div>
                                <p>Hãy tận hưởng cuộc sống xã hội của bạn cùng nhau</p>
                            </div>
                        </div>                        
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="categories_post">
                        <img src="/public/assets/client/img/blog/cat-post/cat-post-2.jpg" alt="bài viết">
                        <div class="categories_details">
                            <div class="categories_text">
                                <a href="blog-details.html">
                                    <h5>Chính Trị</h5>
                                </a>
                                <div class="border_line"></div>
                                <p>Tham gia vào chính trị</p>
                            </div>
                        </div>
                    </div>
                </div>                
                <div class="col-lg-4">
                    <div class="categories_post">
                        <img src="/public/assets/client/img/blog/cat-post/cat-post-1.jpg" alt="bài viết">
                        <div class="categories_details">
                            <div class="categories_text">
                                <a href="blog-details.html">
                                    <h5>Ẩm Thực</h5>
                                </a>
                                <div class="border_line"></div>
                                <p>Hãy để món ăn được hoàn thành</p>
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
                                        <a href="#">Thực phẩm,</a>
                                        <a class="active" href="#">Công nghệ,</a>
                                        <a href="#">Chính trị,</a>
                                        <a href="#">Lối sống</a>
                                    </div>
                                    <ul class="blog_meta list">
                                        <li><a href="#">Mark Wiens<i class="lnr lnr-user"></i></a></li>
                                        <li><a href="#">12 Tháng 12, 2018<i class="lnr lnr-calendar-full"></i></a></li>
                                        <li><a href="#">1.2M Lượt xem<i class="lnr lnr-eye"></i></a></li>
                                        <li><a href="#">06 Bình luận<i class="lnr lnr-bubble"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="blog_post">
                                    <img src="/public/assets/client/img/blog/main-blog/m-blog-1.jpg" alt="">
                                    <div class="blog_details">
                                        <a href="single-blog.html">
                                            <h2>Ống kính thiên văn: Một sự lựa chọn tuyệt vời</h2>
                                        </a>
                                        <p>Khóa học MCSE có những người ủng hộ và phản đối. Một số người không hiểu tại sao bạn phải chi tiền cho khóa học khi bạn có thể tự học từ tài liệu MCSE với một phần chi phí.</p>
                                        <a href="single-blog.html" class="white_bg_btn">Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <!-- Các bài viết khác tiếp tục theo mẫu trên -->
                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Trước">
                                        <span aria-hidden="true">
                                            <span class="lnr lnr-chevron-left"></span>
                                        </span>
                                    </a>
                                </li>
                                <li class="page-item"><a href="#" class="page-link">01</a></li>
                                <li class="page-item active"><a href="#" class="page-link">02</a></li>
                                <li class="page-item"><a href="#" class="page-link">03</a></li>
                                <li class="page-item"><a href="#" class="page-link">04</a></li>
                                <li class="page-item"><a href="#" class="page-link">09</a></li>
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Tiếp">
                                        <span aria-hidden="true">
                                            <span class="lnr lnr-chevron-right"></span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Tìm bài viết" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tìm bài viết'">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><i class="lnr lnr-magnifier"></i></button>
                                </span>
                            </div>
                        </aside>
                        <aside class="single_sidebar_widget author_widget">
                            <img class="author_img rounded-circle" src="/public/assets/client/img/blog/author.png" alt="">
                            <h4>Charlie Barber</h4>
                            <p>Nhà viết blog chính</p>
                            <div class="social_icon">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-github"></i></a>
                                <a href="#"><i class="fa fa-behance"></i></a>
                            </div>
                            <p>Khóa học boot camp có những người ủng hộ và phản đối. Một số người không hiểu tại sao bạn phải chi tiền cho khóa học khi bạn có thể tự học từ tài liệu.</p>
                        </aside>
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Bài viết phổ biến</h3>
                            <div class="media post_item">
                                <img src="/public/assets/client/img/blog/popular-post/post1.jpg" alt="post">
                                <div class="media-body">
                                    <a href="blog-details.html">
                                        <h3>Không gian, Ranh giới cuối cùng</h3>
                                    </a>
                                    <p>02 Giờ trước</p>
                                </div>
                            </div>
                            <!-- Các bài viết phổ biến khác tiếp tục -->
                        </aside>
                        <aside class="single_sidebar_widget ads_widget">
                            <a href="#"><img class="img-fluid" src="/public/assets/client/img/blog/add.jpg" alt=""></a>
                        </aside>
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Danh mục bài viết</h4>
                            <ul class="list cat-list">
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>Công nghệ</p>
                                        <p>37</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>Lối sống</p>
                                        <p>24</p>
                                    </a>
                                </li>
                                <!-- Các danh mục khác tiếp tục -->
                            </ul>
                        </aside>
                        <aside class="single-sidebar-widget newsletter_widget">
                            <h4 class="widget_title">Bản tin</h4>
                            <p>Ở đây, tôi tập trung vào một loạt các món đồ và tính năng mà chúng ta sử dụng trong cuộc sống mà không nghĩ đến.</p>
                            <div class="form-group d-flex flex-row">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Nhập email">
                                </div>
                                <a href="#" class="bbtns">Đăng ký</a>
                            </div>
                            <p class="text-bottom">Bạn có thể hủy đăng ký bất kỳ lúc nào</p>
                        </aside>
                        <aside class="single-sidebar-widget tag_cloud_widget">
                            <h4 class="widget_title">Đám mây thẻ</h4>
                            <ul class="list">
                                <li><a href="#">Công nghệ</a></li>
                                <li><a href="#">Thời trang</a></li>
                                <!-- Các thẻ khác tiếp tục -->
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    <!--================Blog Area =================-->


<?php

    }
}
