<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Pages\Checkouts\Checkout;
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
}