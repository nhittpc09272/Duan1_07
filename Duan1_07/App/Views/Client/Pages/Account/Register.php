<?php

namespace App\Views\Client\Pages\Account;

use App\Views\BaseView;

class Register extends BaseView
{
    public static function render($data = null)
    {

?>
        <!--================Khu vực Hộp Đăng Ký =================-->
        <section class="login_box_area section_gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="login_box_img">
                            <img class="img-fluid" src="/public/assets/client/img/login.jpg" alt="">
                            <div class="hover">
                                <h4>Đã có tài khoản?</h4>
                                <p>Hãy đăng nhập để tiếp tục khám phá những tính năng hấp dẫn trên website của chúng tôi.</p>
                                <a class="primary-btn" href="login.html">Đăng nhập</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="login_form_inner">
                            <h3>Tạo tài khoản mới</h3>
                            <form class="row login_form" action="registration_process.php" method="post" id="registrationForm" novalidate="novalidate">
                                <div class="col-md-12 form-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Tên đầy đủ" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tên đầy đủ'">
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Địa chỉ email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Địa chỉ email'">
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mật khẩu'">
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Nhập lại mật khẩu" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nhập lại mật khẩu'">
                                </div>
                                <div class="col-md-12 form-group">
                                    <button type="submit" value="submit" class="primary-btn">Đăng ký</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================Kết thúc Khu vực Hộp Đăng Ký =================-->



<?php

    }
}
