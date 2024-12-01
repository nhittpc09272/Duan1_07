<?php

namespace App\Views\Client\Pages\Checkouts;

use App\Views\BaseView;

class confirmation extends BaseView
{
    public static function render($data = null)
    {
        ?>

        <body>
        
            <!-- Start Header Area -->
            <?php include 'inc/header.php' ?>
            
            <!-- End Header Area -->
        
            <!-- Start Banner Area -->
            <section class="banner-area organic-breadcrumb">
                <div class="container">
                    <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                        <div class="col-first">
                            <h1>Xác nhận đơn hàng</h1>
                            <nav class="d-flex align-items-center">
                                <a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                                <a href="confirmation.php">Xác nhận đơn hàng</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Banner Area -->
        
            <!--================Order Details Area =================-->
            <section class="order_details section_gap">
                <div class="container">
                    <h3 class="title_confirmation">Đặt hàng thành công. Đơn hàng sẽ được chuyển đến bạn trong thời gian sớm nhất.</h3>
                    <div class="row order_d_inner">
                        <div class="col-lg-4">
                            <div class="details_item">
                                <h4>Thông tin đơn hàng</h4>
                                <ul class="list">
                                    <li><a href="#"><span>Mã đơn hàng</span> : 60235</a></li>
                                    <li><a href="#"><span>Ngày đặt hàng</span> : 08/06/2024</a></li>
                                    <li><a href="#"><span>Phương thức TT</span> : Giao hàng tận nhà</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="details_item">
                                <h4>Địa chỉ nhận hàng</h4>
                                <ul class="list">
                                    <li><a href="#"><span>Tỉnh/TP</span> : Hà Nội</a></li>
                                    <li><a href="#"><span>Quận/Huyện</span> : Nam Từ Liêm</a></li>
                                    <li><a href="#"><span>Số nhà, địa chỉ</span> : 113/Ngõ 80-Xuân Phương</a></li>
                                    <!-- <li><a href="#"><span>Postcode </span> : 36952</a></li> -->
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="details_item">
                                <h4>Thông tin người nhận</h4>
                                <ul class="list">
                                        <?php {
                                                
                                            
                                         ?>
                                    <li><a href="#"><span>Họ tên</span> : <?php echo $result['firstName']?> <?php echo $result['lastName']?></a></li>
                                    <li><a href="#"><span>Số điện thoại</span> : <?php echo $result['phoneNumber']?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="order_details_table">
                        <h2>Chi tiết đơn hàng</h2>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Sản phẩm</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col">Giá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php {
                                    }
                                            
                                     ?>
                                        <tr>
                                            <td>
                                                <p><?php echo $result['product_name'] ?></p>
                                            </td>
                                            <td>
                                                <h5>x <?php echo $result['quantity'] ?></h5>
                                            </td>
                                            <td>
                                                
                                                <p><?php 
                                                $total = $result['total_price'];
                                                echo $fm->format_currency($total);
                                                ?>.000đ</p>
                                            </td>
                                        </tr>
                                        <?php $subTotal += $total; }} ?>
                                        <tr>
                                            <td>
                                                <h4>Tổng</h4>
                                            </td>
                                            <td>
                                                <h5></h5>
                                            </td>
                                            <td>
                                                <p><?php echo $fm->format_currency($subTotal) ?>.000đ</p>
                                            </td>
                                        </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </body>
        
        </html>
        <?php
?>