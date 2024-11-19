<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Pages\Trackings\Tracking;
use App\Views\Client\Layouts\Header;

class TrackingController 
{
    // hiển thị danh sách
    public static function tracking()
    {
        Header::render();
        Tracking::render();
        Footer::render();
    }
}
