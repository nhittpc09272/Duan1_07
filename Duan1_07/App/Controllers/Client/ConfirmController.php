<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Pages\Confirms\Confirm;
use App\Views\Client\Layouts\Header;

class ConfirmController 
{
    // hiển thị danh sách
    public static function confirm()
    {
        Header::render();
        Confirm::render();
        Footer::render();
    }
}
