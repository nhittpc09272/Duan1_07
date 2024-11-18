<?php

namespace App\Views\Client\Pages\Account;

use App\Helpers\AuthHelper;
use App\Views\BaseView;

class Login extends BaseView
{
    public static function render($data = null)
    {


?>

        <head>
            <!-- Mobile Specific Meta -->
            <meta name="viewport"
                content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <!-- Favicon-->
            <link rel="shortcut icon" href="img/fav.png">
            <!-- Author Meta -->
            <meta name="author" content="CodePixar">
            <!-- Meta Description -->
            <meta name="description" content>
            <!-- Meta Keyword -->
            <meta name="keywords" content>
            <!-- meta character set -->
            <meta charset="UTF-8">
            <!-- Site Title -->
            <title>Poly Shop</title>
            <!--
		CSS
		============================================= -->
            <link rel="stylesheet" href="css/linearicons.css">
            <link rel="stylesheet" href="/public/assets/client/css/owl.carousel.css">
            <link rel="stylesheet" href="/public/assets/client/css/themify-icons.css">
            <link rel="stylesheet" href="/public/assets/client/css/font-awesome.min.css">
            <link rel="stylesheet" href="/public/assets/client/css/nice-select.css">
            <link rel="stylesheet" href="/public/assets/client/css/nouislider.min.css">
            <link rel="stylesheet" href="/public/assets/client/css/bootstrap.css">
            <link rel="stylesheet" href="/public/assets/client/css/main.css">
        </head>

        <section class="login_box_area section_gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="login_box_img">
                            <img class="img-fluid" src="/public/assets/client/img/login.jpg" alt="">
                            <div class="hover">
                                <h4>Bạn chưa có tài khoản ?</h4>
                                <!-- <p>There are advances being made in science and technology everyday, and a good example of this is the</p> -->
                                <a class="primary-btn" href="registration.html">Đăng ký tài khoản</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="login_form_inner">
                            <h3>Đăng nhập để vào</h3>
                            <form class="row login_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                                <div class="col-md-12 form-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Tên đăng nhập" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tên đăng nhập'">
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Mật khẩu" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mật khẩu'">
                                </div>
                                <!-- <div class="col-md-12 form-group">
                                    <div class="creat_account">
                                        <input type="checkbox" id="f-option2" name="selector">
                                        <label for="f-option2">Duy trì trạng thái đăng nhập</label>
                                    </div>
                                </div> -->
                                <div class="col-md-12 form-group">
                                    <button type="submit" value="submit" class="primary-btn">Đăng nhập</button>
                                    <a href="#">Quên mật khẩu?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <script src="/public/assets/client/js/vendor/jquery-2.2.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
            crossorigin="anonymous"></script>
        <script src="/public/assets/client/js/vendor/bootstrap.min.js"></script>
        <script src="/public/assets/client/js/jquery.ajaxchimp.min.js"></script>
        <script src="/public/assets/client/js/jquery.nice-select.min.js"></script>
        <script src="/public/assets/client/js/jquery.sticky.js"></script>
        <script src="/public/assets/client/js/nouislider.min.js"></script>
        <script src="/public/assets/client/js/jquery.magnific-popup.min.js"></script>
        <script src="/public/assets/client/js/owl.carousel.min.js"></script>
        <!--gmaps Js-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
        <script src="/public/assets/client/js/gmaps.min.js"></script>
        <script src="/public/assets/client/js/main.js"></script>
<?php

    }
}

?>