<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Pages\Contacts\Contact;
use App\Views\Client\Layouts\Header;

class ContactController 
{
    // hiển thị danh sách
    public static function contact()
    {
        Header::render();
        Contact::render();
        Footer::render();
    }
}
