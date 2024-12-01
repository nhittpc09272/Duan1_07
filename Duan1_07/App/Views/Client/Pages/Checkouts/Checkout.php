<?php

namespace App\Views\Client\Pages\Checkouts;

use App\Views\BaseView;

class Checkout extends BaseView
{
    public static function render($data = null)
    {
        // Đảm bảo các biến được khởi tạo
        $id = isset($data['id']) ? $data['id'] : null;
        $result = isset($data['user']) ? $data['user'] : [
            'firstName' => '',
            'lastName' => '',
            'phoneNumber' => '',
            'address' => ''
        ];
        $priceInVND = isset($data['priceInVND']) ? $data['priceInVND'] : 100000000;
        $message = isset($data['message']) ? $data['message'] : '';
?>

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

        <!--================Checkout Area =================-->
        <section class="checkout_area section_gap">
            <div class="container">
                <div class="billing_details">
                    <div class="row">
                        <div class="col-lg-8">
                            <h3>Thông tin thanh toán</h3>
                            <form class="row contact_form" action="checkout.php" method="post">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id ?? '', ENT_QUOTES, 'UTF-8'); ?>">

                                <div class="col-md-6 form-group p_star">
                                    <label for="first" class="font-bold mb-2">Họ <span class="text-danger"> * </span></label>
                                    <input type="text" class="form-control" id="first" name="firstName"
                                        value="<?php echo htmlspecialchars($result['firstName']); ?>">
                                </div>
                                <div class="col-md-6 form-group p_star">
                                    <label for="last" class="font-bold mb-2">Tên <span class="text-danger"> * </span></label>
                                    <input type="text" class="form-control" id="last" name="lastName"
                                        value="<?php echo htmlspecialchars($result['lastName']); ?>">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <label for="number" class="font-bold mb-2">Số điện thoại <span class="text-danger"> * </span></label>
                                    <input type="text" class="form-control" id="number" name="phoneNumber"
                                        value="<?php echo htmlspecialchars($result['phoneNumber']); ?>">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <label for="email" class="font-bold mb-2">Địa chỉ email (nếu có)</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Địa chỉ email (nếu có)">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <label for="address" class="font-bold mb-2">Địa chỉ nhận hàng: <span class="text-danger"> * </span></label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        value="<?php echo htmlspecialchars($result['address']); ?>">
                                </div>

                                <hr />
                                <div class="col-md-12 form-group">
                                    <div class="creat_account">
                                        <h5 for="f-option3">Ghi chú</h5>
                                    </div>
                                    <textarea class="form-control" name="message" id="message" rows="1"><?php echo htmlspecialchars($message); ?></textarea>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" name="submit" class="btn btn-warning">Cập nhật</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-4">
                            <div class="order_box">
                                <h2>Đơn hàng của tôi</h2>
                                <div class="payment_item active">
                                    <div class="radion_btn">
                                        <input type="radio" id="f-option6" name="selector">
                                        <label for="f-option6">Thanh toán khi nhận hàng</label>
                                        <img src="img/product/card.jpg" alt="">
                                        <div class="check"></div>
                                    </div>
                                    <form action="/App/Views/Client/Pages/Checkouts/congThanhToanvnpay.php" method="POST">
                                        <input type="hidden" name="total_congthanhtoan" value="<?php echo htmlspecialchars($priceInVND); ?>">
                                        <button class="btn btn-danger" name="redirect" id="redirect">Thanh toán VnPay</button>
                                    </form>
                                </div>
                                <div class="creat_account">
                                    <input type="checkbox" checked id="f-option4" name="selector">
                                    <label for="f-option4">Tôi đã đọc và chấp nhận </label>
                                    <a href="#">dịch vụ & điều khoản*</a>
                                </div>
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
                                <a onclick="return confirm('Bằng việc ấn đồng ý, bạn sẽ chấp nhận điều khoản, dịch vụ, và thanh toán đơn hàng này ?')" class="primary-btn" href="?orderId=order">Thanh toán</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php
    }
}
?>