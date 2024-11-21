<?php

namespace App\Views\Client\Layouts;

use App\Helpers\AuthHelper;
use App\Views\BaseView;

class Header extends BaseView
{
    public static function render($data = null)
    {


?>


        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
            <link rel="stylesheet" href="<?= APP_URL ?>/public/assets/client/css/style.css">

        </head>

        <body>


            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
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
                    </div>
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

    <?php

    }
}

    ?>