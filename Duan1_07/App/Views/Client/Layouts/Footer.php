<?php

namespace App\Views\Client\Layouts;

use App\Views\BaseView;

class Footer extends BaseView
{
    public static function render($data = null)
    {
?>
        <style>
    /* Footer Styling */
    .footer-container {
        background-color: #000; /* Đen */
        color: #fff; /* Trắng */
        padding: 50px 0;
    }

    .footer-logo {
        max-width: 150px;
        margin-bottom: 20px;
    }

    .footer-about {
        color: #ccc; /* Màu xám nhạt */
        line-height: 1.6;
    }

    .footer-title {
        color: #ff7f00; /* Màu cam */
        text-transform: uppercase;
        font-weight: bold;
        margin-bottom: 20px;
        position: relative;
        padding-bottom: 10px;
    }

    .footer-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50px;
        height: 3px;
        background-color: #ff7f00; /* Màu cam */
    }

    .footer-links a {
        color: #ccc; /* Màu xám nhạt */
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .footer-links a:hover {
        color: #ff7f00; /* Màu cam */
        transform: translateX(5px);
    }

    .footer-social-icons a {
        color: #fff; /* Trắng */
        width: 40px;
        height: 40px;
        background-color: rgba(255, 127, 0, 0.1); /* Cam nhạt */
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        margin-right: 10px;
        transition: all 0.3s ease;
    }

    .footer-social-icons a:hover {
        background-color: #ff7f00; /* Màu cam */
        transform: translateY(-5px);
    }

    .footer-newsletter .form-control {
        background-color: rgba(255, 255, 255, 0.1);
        border: none;
        color: #fff; /* Trắng */
    }

    .footer-newsletter .btn {
        background-color: #ff7f00; /* Màu cam */
        border: none;
    }

    .footer-bottom {
        background-color: #111; /* Đen nhạt */
        color: #666; /* Màu xám */
        padding: 15px 0;
        text-align: center;
    }

    @media (max-width: 768px) {
        .footer-container {
            text-align: center;
        }

        .footer-social-icons {
            justify-content: center;
        }
    }
</style>

<!-- Footer Start -->
<footer class="footer-container">
    <div class="container">
        <div class="row">
            <!-- Logo & About -->
            <div class="col-md-4 mb-4">
                <img src="/public/assets/client/img/logo1.jpg" alt="5TV Logo" class="footer-logo">
                <p class="footer-about">
                    5TV - Thương hiệu thời trang trẻ trung, năng động. Chúng tôi mang đến những sản phẩm chất lượng và phong cách.
                </p>
            </div>

            <!-- Quick Links -->
            <div class="col-md-4 mb-4">
                <h4 class="footer-title">Liên Kết Nhanh</h4>
                <div class="footer-links">
                    <div class="row">
                        <div class="col-6">
                            <a href="/"><i class="bi bi-chevron-right me-2"></i>Trang Chủ</a><br>
                            <a href="/products"><i class="bi bi-chevron-right me-2"></i>Sản Phẩm</a><br>
                            <a href="/about"><i class="bi bi-chevron-right me-2"></i>Giới Thiệu</a>
                        </div>
                        <div class="col-6">
                            <a href="/blog"><i class="bi bi-chevron-right me-2"></i>Tin Tức</a><br>
                            <a href="/contact"><i class="bi bi-chevron-right me-2"></i>Liên Hệ</a><br>
                            <a href="/cart"><i class="bi bi-chevron-right me-2"></i>Giỏ Hàng</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact & Newsletter -->
            <div class="col-md-4 mb-4">
                <h4 class="footer-title">Liên Kệ</h4>
                <div class="mb-3">
                    <i class="bi bi-geo-alt text-primary me-2"></i> FPT Polytechnic
                </div>
                <div class="mb-3">
                    <i class="bi bi-envelope text-primary me-2"></i> store5tv@example.com
                </div>
                <div class="mb-3">
                    <i class="bi bi-phone text-primary me-2"></i> 084 395 6969
                </div>

                <h4 class="footer-title mt-4">Đăng Ký Nhận Tin</h4>
                <div class="footer-newsletter input-group">
                    <input type="email" class="form-control" placeholder="Nhập email của bạn">
                    <button class="btn btn-primary" type="button">Đăng Ký</button>
                </div>

                <div class="footer-social-icons mt-4 d-flex">
                    <a href="#" class="me-2"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="me-2"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="me-2"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Footer Bottom -->
<div class="footer-bottom">
    <div class="container">
        <p class="m-0">&copy; 2023 5TV Store. All Rights Reserved.</p>
    </div>
</div>
<?php

        unset($_SESSION['success']);
        unset($_SESSION['error']);
    }
}

?>