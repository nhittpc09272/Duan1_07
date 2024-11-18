<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Pages\Blogs\Blog;
use App\Views\Client\Layouts\Header;

class BlogController 
{
    // hiển thị danh sách
    public static function Blog()
    {
        Header::render();
        Blog::render();
        Footer::render();
    }
}
