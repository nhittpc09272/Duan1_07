<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class VariantValidation
{

    public static function create(): bool
    {

        $is_valid = true;

        //Tên loai san pham
        if (!isset($_POST['size']) || $_POST['size'] === '') {
            NotificationHelper::error('size', 'Size không được để trống');
            $is_valid = false;
        }
        if (!isset($_POST['color']) || $_POST['color'] === '') {
            NotificationHelper::error('color', 'Màu không được để trống');
            $is_valid = false;
        }

        // trang thai
        if (!isset($_POST['status']) || ($_POST['status']) === '') {
            NotificationHelper::error('status', 'status không được để trống');
            $is_valid = false;
        }

        return $is_valid;
    }

    public static function edit(): bool
    {

        $is_valid = true;

        //Tên loai sa pham
        if (!isset($_POST['size']) || $_POST['size'] === '') {
            NotificationHelper::error('size', 'Size không được để trống');
            $is_valid = false;
        }
        if (!isset($_POST['color']) || $_POST['color'] === '') {
            NotificationHelper::error('color', 'Màu không được để trống');
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
