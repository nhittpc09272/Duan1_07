<?php

namespace App\vnpay_php;

use App\Views\BaseView;

class vnpay_pay extends BaseView
{
    public static function render($data = null)

    {
?>

        <div class="container mt-5">
            <h3 class="text-center mb-4">Tạo mới đơn hàng</h3>
            <div class="row justify-content-center">
                <div class="col-md-6">
                <div class="card shadow">
                        <div class="card-body">
                            <form action="/createpay" id="frmCreateOrder" method="post">
                                <input type="hidden" name="method" value="POST">
                                <div class="mb-3">
                                    <label for="price" class="form-label">Số tiền</label>
                                    <input
                                        class="form-control" id="price"  name="price" type="number" min="1" max="100000000" value="<?= $data['price'] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Cổng thanh toán VNPAYQR</label>
                                    <div class="form-check d-flex">
                                        <input style="margin-top: -10px; width: 20px;" type="radio" id="bankCode" name="bankCode" value="" checked>
                                        <label for="bankCode" class="form-check-label">VNPAYQR</label>
                                    </div>
                                </div>
                                <!-- Ngôn ngữ giao diện -->
                                <div class="mb-3">
                                    <label class="form-label">Chọn ngôn ngữ giao diện thanh toán:</label>
                                    <div class="form-check d-flex">
                                        <input style="margin-top: -10px; width: 20px;" type="radio" id="language-vn" name="language" value="vn" checked>
                                        <label for="language-vn" class="form-check-label">Tiếng Việt</label>
                                    </div>
                                    <div class="form-check d-flex">
                                        <input style="margin-top: -10px; width: 20px;" type="radio" id="language-en" name="language" value="en" >
                                        <label for="language-en" class="form-check-label">Tiếng Anh</label>
                                    </div>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Thanh toán</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer text-center mt-4">
                <p>&copy; VNPAY 2020</p>
            </footer>
        </div>

<?php
    }
}
