<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Views\Client\Components\Notification;
use App\Validations\ContactValidation;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Pages\Contacts\Contact;
use App\Views\Client\Layouts\Header;

class ContactController 
{
    public static function contact()
    {
        Header::render();
        Contact::render();
        Footer::render();
    }

    // public static function submit()
    // {
    //     // Xác thực dữ liệu từ form
    //     if (!ContactValidation::validate()) {
    //         // Nếu không hợp lệ, quay lại form liên hệ
    //         header('Location: /contact');
    //         exit();
    //     }

    //     // Nếu hợp lệ, xử lý dữ liệu (ví dụ: gửi email hoặc lưu vào cơ sở dữ liệu)
    //     // ...

    //     // Thông báo thành công
    //     NotificationHelper::success('contact', 'Gửi liên hệ thành công!');
    //     header('Location: /contact');
    //     exit();
    // }
}