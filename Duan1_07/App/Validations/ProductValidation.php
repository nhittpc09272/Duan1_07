<?php


namespace App\Validations;

use App\Helpers\NotificationHelper;

class ProductValidation {
    public static function create() : bool {
        $is_valid = true;

        //Tên loại
        if (!isset($_POST['product_name']) || $_POST['product_name'] === '') {
            NotificationHelper::error('product_name', 'Không để trống tên sản phẩm');
            $is_valid = false;
        }

        //giá tiền
        if (!isset($_POST['price']) || $_POST['price'] === '') {
            NotificationHelper::error('price', 'Không để trống giá tiền');
            $is_valid = false;
        } elseif((int) $_POST['price'] <= 0){
            NotificationHelper::error('price', 'Giá tiền phải lớn hơn 0');
            $is_valid = false;
        }

        //giá giảm
        // if (!isset($_POST['discount_price']) || $_POST['discount_price'] === '') {
        //     NotificationHelper::error('discount_price', 'Không để trống giá giảm');
        //     $is_valid = false;
        // } elseif((int) $_POST['discount_price'] < 0){
        //     NotificationHelper::error('discount_price', 'Giá giảm phải lớn hơn hoặc bằng 0');
        //     $is_valid = false;
        // } elseif((int) $_POST['discount_price'] > (int) $_POST['price']) {
        //     NotificationHelper::error('discount_price', 'Giá giảm phải nhỏ hơn giá tiền');
        //     $is_valid = false;
        // }
      

        //id loại sản phẩm
        if (!isset($_POST['categories_id']) || $_POST['categories_id'] === '') {
            NotificationHelper::error('category_id', 'Không để trống loại sản phẩm');
            $is_valid = false;
        }

        //nổi bậc
        // if (!isset($_POST['is_feature']) || $_POST['is_feature'] === '') {
        //     NotificationHelper::error('is_feature', 'Không để trống nổi bậc');
        //     $is_valid = false;
        // }

        //trạng thái
        if (!isset($_POST['status']) || $_POST['status'] === '') {
            NotificationHelper::error('status', 'Không để trống trạng thái');
            $is_valid = false;
        }

        return $is_valid;
    }

    public static function edit() : bool {
        return self::create();
    }

    public static function uploadImage(){
        if (!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])){
            return false;
        }

        //noi luu anh
        $target_dir = '/public/assets/client/img/image/';

        //kiem tra loai file upload co hop le khong
        $imageFileType = strtolower(pathinfo(basename($_FILES['image']['name']), PATHINFO_EXTENSION));

        if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'webp' && $imageFileType != 'jpeg' && $imageFileType != 'gif'){
            NotificationHelper::error('type_upload','Ảnh sai định dạng');
            return false;
        }
        //thay doi them file thanh dang ngay gio phut giay
        $nameImage = date('YmdHmi') . '.' . $imageFileType;

        //duong dan day du de luu tru file
        $target_file = $target_dir. $nameImage;

        if(!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)){
            NotificationHelper::error('move_upload','Lỗi khi upload ảnh vào thư mục luư trữ');
            return false;
        }
        return $nameImage;
    }
}
