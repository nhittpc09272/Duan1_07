<?php

namespace App\Views\Client\Pages\Account\Order;

use App\Views\BaseView;
use App\Views\Client\Layouts\Sidebar;

class Orders extends BaseView
{
  public static function render($data = null)
  {
    // var_dump($data);
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
                    <li>Tài khoản</li>
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
                    <h3>Đơn hàng</h3>
                    <!-- Menu trạng thái -->
                    <div>
                      <button class="button-menu active" onclick="showTable('all')">Tất
                        cả</button>
                      <!-- <button class="button-menu" onclick="showTable('unpaid')">Chưa thanh
                        toán</button> -->
                      <button class="button-menu" onclick="showTable('shipping')">Đang vận
                        chuyển</button>
                      <button class="button-menu" onclick="showTable('delivered')">Đã giao
                        hàng</button>
                    </div>
                    <!-- Bảng dữ liệu -->
                    <div class="coron_table table-responsive">
                      <!-- Tất cả -->
                      <div id="all" class="table-pane active">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Đơn hàng</th>
                              <th>Ngày</th>
                              <th>Trạng thái</th>
                              <th>Tổng</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            if (isset($data) && is_array($data)): 
                              // $hasOrder = false; 
                              foreach ($data as $item):
                                if ($item['success'] === true):
                                  // $hasOrder = true;
                            ?>
                                  <tr>
                                    <td><?= $item['order']['label_id'] ?></td>
                                    <td><?= $item['order']['created'] ?></td>
                                    <td><?= $item['order']['status_text'] ?></td> 
                                    <td><?= number_format($item['order']['value']) ?> VND</td>
                                    <td><a href="/orders/order_detail/<?= $item['order']['partner_id'] ?>">Chi tiết</a></td>
                                  </tr>
                            <?php
                                endif;
                              endforeach;

                              // if (!$hasOrder): // Nếu không có đơn hàng nào hợp lệ
                              //   echo '<tr><td colspan="5">Không có dữ liệu đơn hàng.</td></tr>';
                              // endif;
                            else:
                              echo '<tr><td colspan="5">Không có dữ liệu đơn hàng.</td></tr>';
                            endif;
                            ?>





                          </tbody>

                        </table>
                      </div>

                      <!-- Chưa thanh toán -->
                      <div id="unpaid" class="table-pane">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Đơn hàng</th>
                              <th>Ngày</th>
                              <th>Trạng thái</th>
                              <th>Tổng</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>2</td>
                              <td>May 10, 2018</td>
                              <td>Chưa thanh toán</td>
                              <td>50.000vnđ</td>
                              <td><a href="/orders/order_detail">Chi tiết</a></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>

                      <div id="shipping" class="table-pane">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Đơn hàng</th>
                              <th>Ngày</th>
                              <th>Trạng thái</th>
                              <th>Tổng</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td>May 10, 2018</td>
                              <td>Đang vận chuyển</td>
                              <td>100.000vnđ</td>
                              <td><a href="/orders/order_detail">Chi tiết</a></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>

                      <!-- Đã giao hàng -->
                      <div id="delivered" class="table-pane">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Đơn hàng</th>
                              <th>Ngày</th>
                              <th>Trạng thái</th>
                              <th>Tổng</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>3</td>
                              <td>May 10, 2018</td>
                              <td>Đã giao hàng</td>
                              <td>200.000vnđ</td>
                              <td><a href="/orders/order_detail">Chi tiết</a></td>
                            </tr>
                          </tbody>
                        </table>
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
