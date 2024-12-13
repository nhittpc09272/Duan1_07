<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class OrderValidation{
    public static function create(): bool{
        $is_valid = true;

        if (!isset($_POST['name']) || $_POST['name'] === ''){
            NotificationHelper::error('name', 'Không để trống tên người nhận');
            $is_valid = false;
        }

        if (!isset($_POST['address']) || $_POST['address'] === ''){
            NotificationHelper::error('address', 'Không được để trống địa chỉ chi tiết');
            $is_valid = false;
        }

        
        if (!isset($_POST['province']) || $_POST['province'] === ''){
            NotificationHelper::error('province', 'Không để trống tỉnh thành phố');
            $is_valid = false;
        }
        
        
        if (!isset($_POST['district']) || $_POST['district'] === ''){
            NotificationHelper::error('district', 'Không để trống huyện');
            $is_valid = false;
        }
        
        
        if (!isset($_POST['ward']) || $_POST['ward'] === ''){
            NotificationHelper::error('ward', 'Không để trống huyện xã');
            $is_valid = false;
        }

        if (!isset($_POST['phone']) || $_POST['phone'] === ''){
            NotificationHelper::error('phone', 'Không để trống số điện thoại');
            $is_valid = false;
        }

        // if (!isset($_POST['email']) || $_POST['email'] === ''){
        //     NotificationHelper::error('email', 'Không để trống email');
        //     $is_valid = false;
        // }
        if (!isset($_POST['hamlet']) || $_POST['hamlet'] === ''){
            NotificationHelper::error('hamlet', 'Không để trống ấp xóm tổ');
            $is_valid = false;
        }
        
        return $is_valid;
    }

    public static function edit(): bool{
        $is_valid = true;

        if (!isset($_POST['title']) || $_POST['title'] === ''){
            NotificationHelper::error('title', 'Không để trống tên loại sản phẩm');
            $is_valid = false;
        }

        if (!isset($_POST['product_id']) || $_POST['product_id'] === ''){
            NotificationHelper::error('product_id', 'Không để trống Mieu ta');
            $is_valid = false;
        }

        
        if (!isset($_POST['description']) || $_POST['description'] === ''){
            NotificationHelper::error('description', 'Không để trống Mieu ta');
            $is_valid = false;
        }
        return $is_valid;
    }

    public static function createAddress(): bool{
        $is_valid = true;

        if (!isset($_POST['name']) || $_POST['name'] === ''){
            NotificationHelper::error('name', 'Không để trống tên người nhận');
            $is_valid = false;
        }

        if (!isset($_POST['address']) || $_POST['address'] === ''){
            NotificationHelper::error('address', 'Không được để trống địa chỉ chi tiết');
            $is_valid = false;
        }

        
        if (!isset($_POST['province']) || $_POST['province'] === ''){
            NotificationHelper::error('province', 'Không để trống tỉnh thành phố');
            $is_valid = false;
        }
        
        
        if (!isset($_POST['district']) || $_POST['district'] === ''){
            NotificationHelper::error('district', 'Không để trống huyện');
            $is_valid = false;
        }
        
        
        if (!isset($_POST['ward']) || $_POST['ward'] === ''){
            NotificationHelper::error('ward', 'Không để trống huyện xã');
            $is_valid = false;
        }

        if (!isset($_POST['tel']) || $_POST['tel'] === ''){
            NotificationHelper::error('tel', 'Không để trống tel');
            $is_valid = false;
        }
        if (!isset($_POST['hamlet']) || $_POST['hamlet'] === ''){
            NotificationHelper::error('hamlet', 'Không để trống ấp xóm tổ');
            $is_valid = false;
        }
        
        return $is_valid;
    }
}
?>