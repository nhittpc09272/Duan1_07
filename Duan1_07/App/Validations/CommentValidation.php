<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class CommentValidation {
    
    public static function createClient(): bool {
        $is_valid = true;
    
        if (!isset($_POST['content']) || $_POST['content'] === '') {
            NotificationHelper::error('content', 'Nội dung bình luận không được để trống');
            $is_valid = false;
        }
    
        if (!isset($_POST['product_id']) || $_POST['product_id'] === '') {
            NotificationHelper::error('product_id', 'Mã sản phẩm không được để trống');
            $is_valid = false;
        }
    
        if (!isset($_POST['user_id']) || $_POST['user_id'] === '') {
            NotificationHelper::error('user_id', 'Mã người dùng không được để trống');
            $is_valid = false;
        }
    
        return $is_valid;
    }


    public static function editClient(): bool {
        $is_valid = true;
    
        if (!isset($_POST['content']) || $_POST['content'] === '') {
            NotificationHelper::error('content', 'Nội dung bình luận không được để trống');
            $is_valid = false;
        }
    
        return $is_valid;
    }
    

    public static function edit(): bool {

        $is_valid = true;
            
            
         // trang thai
        if (!isset($_POST['status']) || ($_POST['status']) === '') {
            NotificationHelper::error('status', 'status không được để trống');
            $is_valid = false;
        }
    
        return $is_valid;
    }
    
}