<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Pages\Account\Login;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Account\Register;

class AccountController 
{
    // hiển thị danh sách
    public static function login()
    {
        Header::render();
        Login::render();
        Footer::render();
    }

    public static function register()
    {
        Header::render();
        Register::render();
        Footer::render();
    }
}
