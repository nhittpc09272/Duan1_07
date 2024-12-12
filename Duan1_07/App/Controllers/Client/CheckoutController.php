<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Pages\Checkouts\Checkout;
use App\vnpay_php\vnpay_pay;
use App\vnpay_php\vnpay_create_payment;
use App\vnpay_php\vnpay_return;
use App\Models\Order;
use App\Validations\OrderValidation;
use App\Views\Client\Layouts\Header;

class CheckoutController
{
    // hiển thị danh sách
    public static function checkout()
    {
        Header::render();
        Checkout::render();
        Footer::render();
    }
    
    public function placeOrder()
    {
        // Set thông báo vào session
        $_SESSION['notification'] = [
            'type' => 'success',
            'message' => 'Đặt hàng thành công!',
        ];
    
        // Chuyển hướng về trang sản phẩm
        header('Location: /products');
        exit();
    }
    
}
