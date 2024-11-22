<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Pages\Carts\Cart;
use App\Views\Client\Layouts\Header;

class CartController 
{
    // hiển thị danh sách
    public static function cart()
    {
        Header::render();
        Cart::render();
        Footer::render();
    }
}
