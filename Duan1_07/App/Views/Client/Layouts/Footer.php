<?php

namespace App\Views\Client\Layouts;

use App\Views\BaseView;

class Footer extends BaseView
{
    public static function render($data = null)
    {
?>

<footer class="footer-area section_gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6>Về Chúng Tôi</h6>
                            <p>
                                Chúng tôi là một công ty chuyên cung cấp các sản
                                phẩm giày dép thời trang, với sứ mệnh mang lại
                                cho khách hàng những sản phẩm chất lượng cao và
                                dịch vụ hoàn hảo. Với đội ngũ chuyên nghiệp và
                                tận tâm, chúng tôi cam kết mang đến sự hài lòng
                                cho mọi khách hàng thông qua từng sản phẩm, từ
                                thiết kế đến chất liệu, giúp bạn tỏa sáng mọi
                                lúc mọi nơi.
                            </p>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6>Bản Tin</h6>
                            <p>Cập nhật tin tức mới nhất của chúng tôi</p>
                            <div class id="mc_embed_signup">

                                <form target="_blank" novalidate="true"
                                    action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                    method="get" class="form-inline">

                                    <div class="d-flex flex-row">

                                        <input class="form-control" name="EMAIL"
                                            placeholder="Nhập Email"
                                            onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Nhập Email'"
                                            required type="email">

                                        <button
                                            class="click-btn btn btn-default"><i
                                                class="fa fa-long-arrow-right"
                                                aria-hidden="true"></i></button>
                                        <div
                                            style="position: absolute; left: -5000px;">
                                            <input
                                                name="b_36c4fd991d266f23781ded980_aefe40901a"
                                                tabindex="-1" value type="text">
                                        </div>
                                    </div>
                                    <div class="info"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget mail-chimp">
                            <h6 class="mb-20">Instagram Feed</h6>
                            <ul class="instafeed d-flex flex-wrap">
                                <li><img src="/public/assets/client/img/i1.jpg" alt></li>
                                <li><img src="/public/assets/client/img/i2.jpg" alt></li>
                                <li><img src="/public/assets/client/img/i3.jpg" alt></li>
                                <li><img src="/public/assets/client/img/i4.jpg" alt></li>
                                <li><img src="/public/assets/client/img/i5.jpg" alt></li>
                                <li><img src="/public/assets/client/img/i6.jpg" alt></li>
                                <li><img src="/public/assets/client/img/i7.jpg" alt></li>
                                <li><img src="/public/assets/client/img/i8.jpg" alt></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6>Theo Dõi Chúng Tôi</h6>
                            <p>Hãy kết nối với chúng tôi</p>
                            <div
                                class="footer-social d-flex align-items-center">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                                <a href="#"><i class="fa fa-behance"></i></a>
                            </div>
                            <p>Nhom 7</p>
                        </div>
                    </div>
                </div>
                <!-- <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
                <p class="footer-text m-0">
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tất cả quyền được bảo vệ | Mẫu này được tạo bởi <a href="https://colorlib.com" target="_blank">Colorlib</a>
                </p>
            </div> -->
            </div>
        </footer>


<?php

        // unset($_SESSION['success']);
        // unset($_SESSION['error']);
    }
}

?>