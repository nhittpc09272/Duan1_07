<?php

namespace App\Views\Client\Pages\Account\Order;

use App\Views\BaseView;
use App\Views\Client\Layouts\Sidebar;

class OrderDetail extends BaseView
{
    public static function render($data = null, $id = null)
    {
        // var_dump($data);
        $valueproduct = null;
        $pick_money = null;
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
                                        <li>Chi tiết đơn hàng</li>
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
                                <!-- Chi tiết đơn hàng -->
                                <div class="col-sm-12 col-md-9 col-lg-9">
                                    <div class="tab-content dashboard_content">
                                        <!-- Chi tiết đơn hàng -->
                                        <div id="order-detail" class="table-pane active">
                                            <div class="order-info">
                                                <h3>Thông tin đơn hàng</h3>
                                                <table class="table">
                                                    <?php
                                                    foreach ($data as $order_data):
                                                        if (isset($order_data['order'])):
                                                            $order = $order_data['order'];
                                                            if (isset($order['products']) && is_array($order['products'])):
                                                                if ($order['partner_id'] == $id):
                                                                    foreach ($order['products'] as $index => $product):
                                                                        $valueproduct = $order['value'];
                                                                        $pick_money = $order['pick_money'];
                                                    ?>
                                                    
                                                                        <tr>
                                                                            <th>Mã đơn hàng</th>
                                                                            <td><i class="bi bi-tag"></i><?= $order['label_id'] ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Ngày tạo đơn hàng</th>
                                                                            <td><i class="bi bi-calendar"></i><?= $order['created'] ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Trạng thái</th>
                                                                            <td>
                                                                                <i class="bi bi-truck"></i><span class="status status-shipping"><?= $order['status_text'] ?></span>
                                                                                <span><?= $order['deliver_date'] ?></span>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Địa chỉ nhận hàng</th>
                                                                            <td><i class="bi bi-geo-alt"></i>
                                                                                <span><?= $order['customer_fullname'] ?> (<?= $order['customer_tel'] ?>)</span>
                                                                                <span> - <?= $order['address'] ?></span>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Tổng số tiền</th>
                                                                            <td><i class="bi bi-wallet"></i> <?= number_format($order['value']) ?> VNĐ</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Phương thức thanh toán</th>
                                                                            <td><i class="bi bi-credit-card"></i> Chuyển khoản ngân hàng</td>
                                                                        </tr>
                                                    <?php
                                                                    endforeach;
                                                                endif;
                                                            endif;
                                                        endif;
                                                    endforeach;
                                                    ?>

                                                </table>
                                            </div>

                                            <div class="order-items">
                                                <h3>Sản phẩm trong đơn hàng</h3>
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <!-- <th>Hình ảnh</th> -->
                                                            <th>Tên sản phẩm</th>
                                                            <th>Số lượng</th>
                                                            <th>Giá</th>
                                                            <th>Tổng</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($data as $order_data):
                                                            if (isset($order_data['order']['products'])):
                                                                $order = $order_data['order'];  // Ensure you're accessing the 'order' key correctly
                                                                if ($order['partner_id'] == $id):  // Check partner ID
                                                                    foreach ($order['products'] as $index => $product):
                                                                       ?>
                                                                        <tr>
                                                                            <!-- <td><img src="<?= APP_URL ?>/public/uploads/products/<?= $product[''] ?>" alt="<?= $product['full_name'] ?>" class="product-image"></td> -->
                                                                            <td><?= $product['full_name'] ?></td>
                                                                            <td><?= $product['quantity'] ?></td>
                                                                            <td><?= number_format($pick_money) ?> VNĐ</td>
                                                                            <td><?= number_format($valueproduct) ?> VNĐ</td>
                                                                        </tr>
                                                                      <?php
                                                                    endforeach;
                                                                endif;
                                                            endif;
                                                        endforeach;
                                                        ?>

                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="order-actions">
                                                <a href="/orders/shipping-order"><button class="button-menu">Theo dõi vận chuyển</button></a>
                                                <button class="button-menu">Hủy đơn hàng</button>
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
