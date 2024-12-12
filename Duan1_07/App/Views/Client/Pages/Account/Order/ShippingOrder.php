<?php

namespace App\Views\Client\Pages\Account\Order;

use App\Views\BaseView;
use App\Views\Client\Layouts\Sidebar;

class ShippingOrder extends BaseView
{
    public static function render($data = null)
    {
?>
        <div class="pos_page">
            <div class="container">
                <!--pos page inner-->
                <div class="pos_page_inner">
                    <!--breadcrumbs area start-->
                    <div class="breadcrumbs_area">
                        <div class="row">
                            <div class="col-12">
                                <div class="breadcrumbs_area">
                                    <ul>
                                        <li><a href="/">Home</a></li>
                                        <li><i class="fa fa-angle-right"></i></li>
                                        <li><a href="/orders">Tài khoản</a></li>
                                        <li><i class="fa fa-angle-right"></i></li>
                                        <li>Theo dõi đơn hàng</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--breadcrumbs area end-->

                    <!-- Start Maincontent  -->
                    <section class="main_content_area">
                        <div class="account_dashboard">
                            <div class="row">
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <div class="dashboard_tab_button">
                                        <!-- Nav tabs -->
                                        <?php
                                        Sidebar::render();
                                        ?>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-9 col-lg-9">
                                    <div class="tab-content dashboard_content">
                                        <h3>Theo dõi đơn hàng</h3>
                                        <div class="tracking-container">
                                            <div class="tracking-header">
                                                <img src="/public/uploads/products/20241123011115.jpg" width="80" alt="Product Image" class="tracking-image">
                                                <div class="tracking-text-container">
                                                    <p class="tracking-text">Mã đơn hàng: <strong>#123456</strong></p>
                                                    <p class="tracking-text">Vận chuyển: <strong>Giao hàng nhanh</strong></p>
                                                </div>
                                            </div>


                                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3929.4204946227965!2d105.75372128885496!3d9.982081500000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a08906415c355f%3A0x416815a99ebd841e!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1731410949430!5m2!1svi!2s" width="760" height="250" style="border:0; border-radius: 5px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                                            <!-- Trạng thái vận chuyển -->
                                            <div class="tracking-status-border">
                                                <div class="tracking-status">
                                                    <div class="line"></div>
                                                    <div class="icon">4</div>
                                                    <h4>Giao hàng thành công</h4>
                                                    <p class="time">Đang cập nhật</p>
                                                </div>
                                                <div class="tracking-status active">
                                                    <div class="line"></div>
                                                    <div class="icon">3</div>
                                                    <h4>Đang vận chuyển</h4>
                                                    <p class="time">03/11/2024 - 09:00</p>
                                                </div>
                                                <div class="tracking-status active">
                                                    <div class="line"></div>
                                                    <div class="icon">2</div>
                                                    <h4>Đơn hàng đã được xác nhận</h4>
                                                    <p class="time">02/11/2024 - 14:00</p>
                                                </div>
                                                <div class="tracking-status active">
                                                    <div class="icon">1</div>
                                                    <h4>Đơn hàng đã được tạo</h4>
                                                    <p class="time">01/11/2024 - 10:00</p>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- End Maincontent  -->
                </div>
                <!--pos page inner end-->
            </div>
        </div>

<?php
    }
}
