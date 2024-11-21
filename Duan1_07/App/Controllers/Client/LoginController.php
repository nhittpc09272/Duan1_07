<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Account\Login;

class loginController 
{
    // hiển thị danh sách
    public static function login()
    {
        Header::render();
        Login::render();
        Footer::render();
    }
}
