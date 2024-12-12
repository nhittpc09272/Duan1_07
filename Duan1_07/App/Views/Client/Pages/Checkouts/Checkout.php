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

            /* Thông tin đơn hàng */
            .checkout-order-section {
                background-color: #f8f9fa;
                border-radius: 12px;
                padding: 25px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            .checkout-order-section h3 {
                color: #333;
                margin-bottom: 20px;
                border-bottom: 2px solid #e9ecef;
                padding-bottom: 10px;
                font-weight: 600;
            }

            .order-form-grid {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
            }

            .form-group-checkout {
                display: flex;
                flex-direction: column;
            }

            .form-group-checkout label {
                margin-bottom: 8px;
                color: #495057;
                font-weight: 500;
            }

            .form-group-checkout label span {
                color: red;
                margin-left: 4px;
            }

            .form-control-checkout {
                padding: 10px;
                border: 1px solid #ced4da;
                border-radius: 6px;
                transition: all 0.3s ease;
            }

            .form-control-checkout:focus {
                border-color: #3498db;
                box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
            }

            .full-width-input {
                grid-column: span 2;
            }

            /* Thông tin tài khoản */
            .account-info-section {
                background-color: #f8f9fa;
                border-radius: 12px;
                padding: 25px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            .account-info-header {
                text-align: center;
                color: #333;
                margin-bottom: 20px;
                border-bottom: 2px solid #e9ecef;
                padding-bottom: 10px;
                font-weight: 600;
            }

            .form-group-account {
                margin-bottom: 15px;
            }

            .form-group-account label {
                display: block;
                margin-bottom: 8px;
                color: #495057;
                font-weight: 500;
            }

            .form-control-account {
                width: 100%;
                padding: 10px;
                border: 1px solid #ced4da;
                border-radius: 6px;
                transition: all 0.3s ease;
            }

            .form-control-account:disabled {
                background-color: #e9ecef;
                opacity: 1;
            }

            .form-control-account:focus {
                border-color: #3498db;
                box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
            }

            .payment-methods {
                margin-top: 20px;
            }

            .payment-option {
                display: flex;
                align-items: center;
                padding: 10px;
                border: 1px solid #ddd;
                border-radius: 6px;
                margin-bottom: 10px;
            }

            .payment-option img {
                margin-right: 10px;
                width: 24px;
                height: 24px;
            }

            .payment-buttons {
                display: flex;
                gap: 10px;
                margin-top: 15px;
            }

            .login-prompt {
                color: #dc3545;
                text-align: center;
                padding: 20px;
                background-color: #fff;
                border-radius: 8px;
            }
        </style>
        <div class="container mt-5 mb-5">
            <h1 class="text-center mb-5" style="margin-top: 100px;">Thanh toán</h1>

            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="checkout-order-section">
                        <h3>Thông tin đơn hàng</h3>
                        <?php
                        foreach ($data['addressModel'] as $item):
                        ?>
                            <form action="/pays" method="POST">
                                <div class="order-form-grid">
                                    <div class="form-group-checkout">
                                        <label>Tên<span>*</span></label>
                                        <input
                                            type="text"
                                            class="form-control-checkout"
                                            id="name"
                                            name="name"
                                            value="<?= $item['name'] ?>"
                                            placeholder="Nhập họ và tên"
                                            required>
                                    </div>

                                    <div class="form-group-checkout full-width-input">
                                        <label>Địa chỉ chi tiết</label>
                                        <input
                                            type="text"
                                            class="form-control-checkout"
                                            id="address"
                                            name="address"
                                            value="<?= $item['address'] ?>"
                                            placeholder="Nhập địa chỉ chi tiết">
                                    </div>

                                    <div class="form-group-checkout">
                                        <label>Tỉnh, Thành phố<span>*</span></label>
                                        <input
                                            type="text"
                                            class="form-control-checkout"
                                            id="province"
                                            name="province"
                                            value="<?= $item['province'] ?>"
                                            placeholder="Nhập tỉnh/thành phố"
                                            required>
                                    </div>

                                    <div class="form-group-checkout">
                                        <label>Huyện hoặc quận</label>
                                        <input
                                            type="text"
                                            class="form-control-checkout"
                                            id="district"
                                            name="district"
                                            value="<?= $item['district'] ?>"
                                            placeholder="Nhập huyện/quận">
                                    </div>

                                    <div class="form-group-checkout">
                                        <label>Quận / xã<span>*</span></label>
                                        <input
                                            type="text"
                                            class="form-control-checkout"
                                            id="ward"
                                            name="ward"
                                            value="<?= $item['ward'] ?>"
                                            placeholder="Nhập quận/xã"
                                            required>
                                    </div>

                                    <div class="form-group-checkout">
                                        <label>Số điện thoại<span>*</span></label>
                                        <input
                                            type="tel"
                                            class="form-control-checkout"
                                            id="phone"
                                            name="phone"
                                            value="<?= $item['tel'] ?>"
                                            placeholder="Nhập số điện thoại"
                                            required>
                                    </div>

                                    <div class="form-group-checkout">
                                        <label>Tên ấp, xóm, tổ</label>
                                        <input type="text"
                                            class="form-control-checkout"
                                            id="hamlet"
                                            name="hamlet"
                                            value="Khác"
                                            placeholder="Nhập tên ấp/xóm/tổ">
                                    </div>
                                </div>

                            <?php
                        endforeach;
                            ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-lg-6 col-md-6">
                        <!-- <form action="/pays" method="POST"> -->
                        <input type="hidden" name="method" id="" value="POST">
                        <h3>Đơn hàng của bạn</h3>
                        <div class="order_table table-responsive mb-30">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Lựa chọn</th>
                                    </tr>
                                </thead>
                                <?php
                                $index = 0;
                                foreach ($data['products'] as $item):
                                    $index += $item['price'] * $item['quantity']
                                ?>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h6 class="fw-bold"><?= $item['name'] ?> </h6>
                                            </td>
                                            <td> <?= $item['price'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Số lượng</td>
                                            <td><?= $item['quantity'] ?></td>
                                        </tr>
                                        <?php
                                        if ($item['variant']):
                                        ?>
                                            <tr>
                                                <td>Màu sắc</td>
                                                <td><?= $item['variant'] ?></td>
                                            </tr>
                                        <?php
                                        endif;
                                        ?>
                                        <?php
                                        if ($item['variant2']):
                                        ?>
                                            <tr>
                                                <td>Chất liệu</td>
                                                <td><?= $item['variant2'] ?></td>
                                            </tr>
                                        <?php
                                        endif;
                                        ?>
                                    </tbody>
                                <?php
                                endforeach;
                                ?>
                                <tfoot>
                                    <tr class="order_total">
                                        <th>Phí vận chuyển</th>
                                        <td><strong class="text-danger"><?= $data['transport'] ?></strong></td>
                                    </tr>
                                    <tr class="order_total">
                                        <th>Tổng</th>
                                        <td><strong class="text-danger"><?= $index = $index + $data['transport'] ?></strong></td>
                                        <input type="hidden" name="totalprice" id="totalprice" value="<?= $index ?>">
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment_method">
                            <div class="panel-default">
                                <input id="payment" name="check_method" type="radio" data-target="createp_account">
                                <label for="payment" data-toggle="collapse" data-target="#method" aria-controls="method">Tạo tài khoản?</label>

                                <div id="method" class="collapse one" data-parent="#accordion">
                                    <div class="card-body1">
                                        <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="order_button">
                                <button type="submit">Thanh toán VN PAY</button>
                            </div>
                        </div>
                    </form>
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