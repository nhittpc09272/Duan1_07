<?php

namespace App\Views\Client\Pages\Carts;

use App\Views\BaseView;

class Cart extends BaseView
{
    public static function render($data = null)
    {

?>
    
     <!--================Cart Area =================-->
     <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Tổng cộng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Sản phẩm 1 -->
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="/public/assets/client/img/cart.jpg" alt="">
                                        </div>
                                        <div class="media-body">
                                            <p>Cửa hàng tối giản cho nhiều mục đích sử dụng</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>8.640.000 VND</h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <input type="text" name="qty" id="sst" maxlength="12" value="1" title="Số lượng:" class="input-text qty">
                                        <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                                        <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) && sst > 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                                    </div>
                                </td>
                                <td>
                                    <h5>17.280.000 VND</h5>
                                </td>
                            </tr>
                            <!-- Sản phẩm 2 -->
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="/public/assets/client/img/cart.jpg" alt="">
                                        </div>
                                        <div class="media-body">
                                            <p>Cửa hàng tối giản cho nhiều mục đích sử dụng</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>8.640.000 VND</h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <input type="text" name="qty" id="sst" maxlength="12" value="1" title="Số lượng:" class="input-text qty">
                                        <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                                        <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) && sst > 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                                    </div>
                                </td>
                                <td>
                                    <h5>17.280.000 VND</h5>
                                </td>
                            </tr>
                            <!-- Sản phẩm 3 -->
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="/public/assets/client/img/cart.jpg" alt="">
                                        </div>
                                        <div class="media-body">
                                            <p>Cửa hàng tối giản cho nhiều mục đích sử dụng</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>8.640.000 VND</h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <input type="text" name="qty" id="sst" maxlength="12" value="1" title="Số lượng:" class="input-text qty">
                                        <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                                        <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) && sst > 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                                    </div>
                                </td>
                                <td>
                                    <h5>17.280.000 VND</h5>
                                </td>
                            </tr>
                            <!-- Hành động giỏ hàng -->
                            <tr class="bottom_button">
                                <td>
                                    <a class="gray_btn" href="#">Cập nhật giỏ hàng</a>
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="cupon_text d-flex align-items-center">
                                        <input type="text" placeholder="Mã giảm giá">
                                        <a class="primary-btn" href="#">Áp dụng</a>
                                        <a class="gray_btn" href="#">Đóng mã giảm giá</a>
                                    </div>
                                </td>
                            </tr>
                            <!-- Tổng cộng và Vận chuyển -->
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <h5>Tổng cộng</h5>
                                </td>
                                <td>
                                    <h5>51.840.000 VND</h5>
                                </td>
                            </tr>
                            <!-- Thanh toán -->
                            <tr class="out_button_area">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="checkout_btn_inner d-flex align-items-center">
                                        <a class="gray_btn" href="/products">Tiếp tục mua sắm</a>
                                        <a class="primary-btn" href="/checkout">Tiến hành thanh toán</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->


<?php

    }
}
