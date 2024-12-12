<?php

namespace App\Views\Client\Pages\Checkouts;

use App\Views\BaseView;
use App\Helpers\AuthHelper;


class Checkout extends BaseView
{
    public static function render($data = null)
    {
        //      echo '<pre>';
        // var_dump($data);
        // echo '</pre>';
        // die; // Dừng thực thi để kiểm tra dữ liệu
        $is_login = AuthHelper::checkLogin();

        $priceInVND = isset($data['priceInVND']) ? $data['priceInVND'] : 100000000;
        $message = isset($data['message']) ? $data['message'] : '';
?>
        <?php if (isset($_SESSION['notification'])): ?>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                Swal.fire({
                    icon: '<?php echo $_SESSION['notification']['type']; ?>',
                    title: '<?php echo $_SESSION['notification']['message']; ?>',
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>
            <?php unset($_SESSION['notification']); // Xóa thông báo sau khi hiển thị 
            ?>
        <?php endif; ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <section class="banner-area organic-breadcrumb">
            <div class="container">
                <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                    <div class="col-first">
                        <h1>Xác nhận đơn hàng</h1>
                        <nav class="d-flex align-items-center">
                            <a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                            <a href="checkout.php">Đơn hàng</a>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Banner Area -->

        <link rel="stylesheet" href="/App/Views/Client/css/linearicons.css">

        <link rel="stylesheet" href="/App/Views/Client/css/font-awesome.min.css">
        <link rel="stylesheet" href="/App/Views/Client/css/themify-icons.css">
        <link rel="stylesheet" href="/App/Views/Client/css/bootstrap.css">
        <link rel="stylesheet" href="/App/Views/Client/css/owl.carousel.css">
        <link rel="stylesheet" href="/App/Views/Client/css/nice-select.css">
        <link rel="stylesheet" href="/App/Views/Client/css/nouislider.min.css">
        <link rel="stylesheet" href="/App/Views/Client/css/ion.rangeSlider.css" />
        <link rel="stylesheet" href="/App/Views/Client/css/ion.rangeSlider.skinFlat.css" />
        <link rel="stylesheet" href="/App/Views/Client/css/magnific-popup.css">
        <link rel="stylesheet" href="/App/Views/Client/css/main.css">
        <style>
            .col-md-6 {
                min-height: 300px;
                /* Đảm bảo cột không bị thu hẹp quá mức */
                overflow: visible;
                /* Đảm bảo phần tử không bị ẩn */
            }

            .checkout_area {
                display: flex;
                flex-wrap: wrap;
                /* Đảm bảo các phần tử không bị chồng lên nhau */
            }

            .payment-option {
                position: relative;
                /* Đảm bảo phần tử này không bị chồng lên các phần tử khác */
                z-index: 10;
            }

            #redirect {
                position: relative;
                z-index: 9999;
                /* Đảm bảo nút không bị chồng lên */
            }

            .col-md-6,
            .payment-option,
            #redirect {
                display: block;
                /* Đảm bảo các phần tử này không bị ẩn */
                visibility: visible;
            }
        </style>
        <div class="container mt-5 mb-5">
            <h1 class="text-center mb-5" style="margin-top: 100px;">Thanh toán</h1>

            <div class="row">
                <div class="col-md-6">
                    <h4 class="text-center">Thông tin đơn hàng</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Giá tiền</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total_price = 0;
                            $i = 0;

                            // Check if $data is an array and not empty
                            if (is_array($data) && !empty($data)):
                                // var_dump($data);
                                foreach ($data as $cart):
                                    if ($cart['data']):
                                        $i++;
                                        $unit_price = $cart['quantity'] * ($cart['data']['price'] - $cart['data']['discount_price']);
                                        $total_price += $unit_price;
                            ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td>
                                                <img src="<?= APP_URL ?>/public/assets/client/img/image/<?= $cart['data']['image'] ?>"
                                                    alt="<?= $cart['data']['product_name'] ?>"
                                                    style="width: 100px; height: auto;">
                                            </td>
                                            <td><?= $cart['data']['product_name'] ?></td>
                                            <td>
                                                <!-- Form cập nhật số lượng -->
                                                <form action="/cart/update" method="post">
                                                    <input type="hidden" name="method" value="PUT">
                                                    <input type="number" name="quantity" value="<?= $cart['quantity'] ?>"
                                                        min="1" max="99" class="form-control"
                                                        style="width: 80px; display: inline-block;"
                                                        onchange="this.form.submit()">
                                                    <input type="hidden" name="id" value="<?= $cart['data']['product_id'] ?>">
                                                </form>
                                            </td>
                                            <td>
                                                <?php if ($cart['data']['discount_price'] > 0): ?>
                                                    <span class="text-muted text-decoration-line-through">
                                                        <?= number_format($cart['data']['price']) ?>đ
                                                    </span><br>
                                                    <span class="text-success fw-bold">
                                                        <?= number_format($cart['data']['price'] - $cart['data']['discount_price']) ?>đ
                                                    </span>
                                                <?php else: ?>
                                                    <span><?= number_format($cart['data']['price']) ?>đ</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?= number_format($unit_price) ?>đ</td>
                                            <td>
                                                <!-- Nút xóa sản phẩm -->
                                                <form action="/cart/delete" method="post">
                                                    <input type="hidden" name="method" value="DELETE">
                                                    <input type="hidden" name="id" value="<?= $cart['data']['product_id'] ?>">
                                                    <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                                </form>
                                            </td>
                                        </tr>
                                <?php endif;
                                endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center">Giỏ hàng của bạn đang trống</td>
                                </tr>
                            <?php endif; ?>

                        </tbody>
                    </table>
                    <h2 style="font-weight:bolder;">Tổng tất cả: <?= number_format($total_price)  ?>đ</h2>
                </div>
                <div class="col-md-6">

                    <h4 class="text-center">Thông tin tài khoản</h4>

                    <div class="card card-body">
                        <?php
                        if ($is_login) :
                        ?>
                            <form class="form" action="/" method="post" class="needs-validation">
                                <div class="form-group">
                                    <label for="username">Tên đăng nhập</label>
                                    <input type="username" class="form-control" name="username" id="username" value="<?= $_SESSION['user']['username'] ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" value="<?= $_SESSION['user']['email'] ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Số điện thoại</label>
                                    <input type="text" class="form-control" name="phone" id="phone" value="<?= $_SESSION['user']['phone'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Tên</label>
                                    <input type="text" class="form-control" name="name" id="name" value="<?= $_SESSION['user']['username'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="address">Địa chỉ nhận hàng</label>
                                    <input type="text" class="form-control" name="address" id="address" value="<?= $_SESSION['user']['address'] ?>" required>
                                </div>

                                <h5>Phương thức thanh toán</h5>
                                <!-- COD -->
                                <div class="payment-option">
                                    <img src="https://via.placeholder.com/24?text=COD" alt="COD">
                                    <span>Thanh toán khi nhận hàng</span>
                                    <input type="radio" name="payment" value="COD" checked>
                                </div>

                                <section class="checkout_area section_gap">
                                    <div class="container">
                                        <div class="billing_details">
                                            <div class="row">
                                                <div class="col-lg-8">

                            </form>
                    </div>
                    <div class="col-lg-4">

                        <form action="/App/Views/Client/Pages/Checkouts/congThanhToanvnpay.php" method="POST">
                            <input type="hidden" name="total_congthanhtoan" value="<?php echo htmlspecialchars($priceInVND); ?>">
                            <button type="submit" class="btn btn-danger" name="redirect" id="redirect">Thanh toán VnPay</button>
                        </form>

                        <?php if (isset($_SESSION['notification'])): ?>
                            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                            <script>
                                Swal.fire({
                                    icon: '<?php echo $_SESSION['notification']['type']; ?>',
                                    title: '<?php echo $_SESSION['notification']['message']; ?>',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            </script>
                            <?php unset($_SESSION['notification']); // Xóa thông báo sau khi hiển thị 
                            ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="d-flex justify-content-center">
            <a href="/login" class="btn btn-outline-dark mt-2">Đăng nhập</a>
        </div> -->
        <form action="<?= APP_URL ?>/checkout/placeOrder" method="get" class="d-flex justify-content-center">
            <button class="tn btn-outline-dark mt-2" type="submit">Đặt hàng</button>
        </form>
        </section>


        </form>
    <?php
                        else :
    ?>
        <h4 class="text-center text-danger">
            Vui lòng đăng nhập để thanh toán
        </h4>
    <?php
                        endif;
    ?>
    </div>
    </div>
    </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<?php
    }
}
?>