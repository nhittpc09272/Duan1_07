<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class ContactValidation {
    
    public static function validate(): bool {
        $is_valid = true;

        // Kiểm tra tên
        if (!isset($_POST['name']) || trim($_POST['name']) === '') {
            NotificationHelper::error('name', 'Tên không được để trống');
            $is_valid = false;
        }

        // Kiểm tra email
        if (!isset($_POST['email']) || trim($_POST['email']) === '' || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            NotificationHelper::error('email', 'Email không hợp lệ');
            $is_valid = false;
        }

        // Kiểm tra nội dung
        if (!isset($_POST['message']) || trim($_POST['message']) === '') {
            NotificationHelper::error('message', 'Nội dung không được để trống');
            $is_valid = false;
        }

        return $is_valid;
    }
}