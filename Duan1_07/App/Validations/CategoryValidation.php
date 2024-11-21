<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class CategoryValidation {

    public static function create(): bool {

        $is_valid = true;
            
        //Tên loai sa pham
        if (!isset($_POST['name']) || $_POST['name'] === '')
        {
            NotificationHelper::error('name', 'Tên loại sản phẩm không được để trống');
            $is_valid = false;
        }
            
         // trang thai
        if (!isset($_POST['status']) || ($_POST['status']) === '') {
            NotificationHelper::error('status', 'status không được để trống');
            $is_valid = false;
        }
    
        return $is_valid;
    }

    public static function edit(): bool {

        $is_valid = true;
            
        //Tên loai sa pham
        if (!isset($_POST['name']) || $_POST['name'] === '')
        {
            NotificationHelper::error('name', 'Tên loại sản phẩm không được để trống');
            $is_valid = false;
        }
            
         // trang thai
        if (!isset($_POST['status']) || ($_POST['status']) === '') {
            NotificationHelper::error('status', 'status không được để trống');
            $is_valid = false;
        }
    
        return $is_valid;
    }
    
}