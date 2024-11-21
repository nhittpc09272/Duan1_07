<?php

namespace App\Views\Client\Pages\Account;

use App\Views\BaseView;

class Login extends BaseView
{
    public static function render($data = null)
    {

?>
        <!--================Khu vực Hộp Đăng Nhập =================-->
        <section class="login_box_area section_gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="login_box_img">
                            <img class="img-fluid" src="/public/assets/client/img/login.jpg" alt="">
                            <div class="hover">
                                <h4>Bạn mới đến với website của chúng tôi?</h4>
                                <p>Hằng ngày, có những tiến bộ vượt bậc trong khoa học và công nghệ, và đây là một ví dụ tiêu biểu</p>
                                <a class="primary-btn" href="/register">Tạo tài khoản</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="login_form_inner">
                            <h3>Đăng nhập để tiếp tục</h3>
                            <form class="row login_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                                <div class="col-md-12 form-group">
                                    <input type="text" class="form-control" id="username" name="name" placeholder="Tên đăng nhập" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tên đăng nhập'">
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="text" class="form-control" id="password" name="name" placeholder="Mật khẩu" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mật khẩu'">
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="creat_account">
                                        <input type="checkbox" id="f-option2" name="selector">
                                        <label for="f-option2">Giữ tôi luôn đăng nhập</label>
                                    </div>
                                </div>
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
        <!--================Kết thúc Khu vực Hộp Đăng Nhập =================-->



<?php

    }
}
