<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Variant;
use App\Models\Product;
use App\Validations\VariantValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\Variant\Create;
use App\Views\Admin\Pages\Variant\Edit;
use App\Views\Admin\Pages\Variant\Index;

class VariantController
{


    // hiển thị danh sách
    public static function index()
    {
        $variantModel = new Variant();
        $data = $variantModel->getAllVariant(); // Lấy dữ liệu từ model

        Header::render();
        Index::render($data); // Truyền dữ liệu vào view
        Footer::render();
    }





    // hiển thị giao diện form thêm
    public static function create()
    {
        $productModel = new Product();
        $products = $productModel->getAllProduct(); // Lấy tất cả sản phẩm từ bảng products

        Header::render();
        // Truyền danh sách sản phẩm vào view
        Create::render(['products' => $products]);
        Footer::render();
    }



    // xử lý chức năng thêm
    // public static function store()
    // {
    //     // Validation các trường dữ liệu
    //     $is_valid = VariantValidation::create();

    //     if (!$is_valid) {
    //         NotificationHelper::error('store', 'Thêm biến thể thất bại');
    //         header('location: /admin/variants/create');
    //         exit;
    //     }

    //     // Lấy dữ liệu từ form
    //     $size = $_POST['size'];
    //     $color = $_POST['color'];
    //     $status = $_POST['status'];
    //     $product_id = $_POST['product_id'] ?? null; // Lấy product_id từ form

    //     // Kiểm tra nếu product_id không được chọn
    //     if (empty($product_id)) {
    //         NotificationHelper::error('store', 'Vui lòng chọn sản phẩm.');
    //         header('location: /admin/variants/create');
    //         exit;
    //     }

    //     // Kiểm tra biến thể đã tồn tại
    //     $variant = new Variant();
    //     $is_exits = $variant->getOneVariantByName($size, $color);

    //     if ($is_exits) {
    //         NotificationHelper::error('store', 'Biến thể đã tồn tại');
    //         header('location: /admin/variants/create');
    //         exit;
    //     }

    //     // Thêm vào database
    //     $data = [
    //         'product_id' => $product_id, // Thêm product_id vào dữ liệu
    //         'size' => $size,
    //         'color' => $color,
    //         'status' => $status,
    //     ];

    //     // Gọi phương thức tạo biến thể mới trong model Variant
    //     $result = $variant->createVariant($data);

    //     // Kiểm tra kết quả và thông báo
    //     if ($result) {
    //         NotificationHelper::success('store', 'Thêm biến thể thành công');
    //         header('location: /admin/variants');
    //     } else {
    //         NotificationHelper::error('store', 'Thêm biến thể thất bại');
    //         header('location: /admin/variants');
    //     }
    // }
    public static function store()
    {
        // Validation các trường dữ liệu
        $is_valid = VariantValidation::create();

        if (!$is_valid) {
            $_SESSION['notification'] = [
                'type' => 'error',
                'message' => 'Thêm biến thể thất bại'
            ];
            header('location: /admin/variants/create');
            exit;
        }

        // Lấy dữ liệu từ form
        $size = $_POST['size'];
        $color = $_POST['color'];
        $status = $_POST['status'];
        $product_id = $_POST['product_id'] ?? null; // Lấy product_id từ form

        // Kiểm tra nếu product_id không được chọn
        if (empty($product_id)) {
            $_SESSION['notification'] = [
                'type' => 'error',
                'message' => 'Vui lòng chọn sản phẩm.'
            ];
            header('location: /admin/variants/create');
            exit;
        }

        // Kiểm tra biến thể đã tồn tại
        $variant = new Variant();
        $is_exits = $variant->getOneVariantByName($size, $color);

        if ($is_exits) {
            $_SESSION['notification'] = [
                'type' => 'error',
                'message' => 'Biến thể đã tồn tại'
            ];
            header('location: /admin/variants/create');
            exit;
        }

        // Thêm vào database
        $data = [
            'product_id' => $product_id, // Thêm product_id vào dữ liệu
            'size' => $size,
            'color' => $color,
            'status' => $status,
        ];

        // Gọi phương thức tạo biến thể mới trong model Variant
        $result = $variant->createVariant($data);

        // Kiểm tra kết quả và thông báo
        if ($result) {
            $_SESSION['notification'] = [
                'type' => 'success',
                'message' => 'Thêm biến thể thành công'
            ];
            header('location: /admin/variants');
        } else {
            $_SESSION['notification'] = [
                'type' => 'error',
                'message' => 'Thêm biến thể thất bại'
            ];
            header('location: /admin/variants');
        }
        exit;
    }






    // hiển thị chi tiết
    public static function show() {}


    // hiển thị giao diện form sửa
    public static function edit(int $id)
    {
        // giả sử data là mảng dữ liệu lấy được từ database
        // $data = [
        //     'id' => $id,
        //     'name' => 'Category 1',
        //     'status' => 1
        // ];
        $variant = new Variant();
        $data = $variant->getOneVariant($id);

        if (!$data) {
            NotificationHelper::error('edit', 'Không thể xem biến thể này');
            header('location: /admin/variants');
            exit;
        }
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị form sửa
        Edit::render($data);
        Footer::render();
    }


    // xử lý chức năng sửa (cập nhật)
    // public static function update(int $id)
    // {
    //     // Lấy dữ liệu từ $_POST
    //     $size = $_POST['size'] ?? '';
    //     $color = $_POST['color'] ?? '';
    //     $status = $_POST['status'] ?? '';
    //     $product_id = $_POST['product_id'] ?? null;

    //     // Kiểm tra nếu product_id là null hoặc không hợp lệ
    //     if ($product_id === null || !is_numeric($product_id) || $product_id <= 0) {
    //         NotificationHelper::error('update', 'ID sản phẩm không hợp lệ');
    //         header("location: /admin/variants/$id");
    //         exit;
    //     }

    //     // Kiểm tra sự tồn tại của sản phẩm trong cơ sở dữ liệu
    //     $variant = new Variant();
    //     // $is_product_exist = $variant->checkProductExists($product_id);
    //     // if (!$is_product_exist) {
    //     //     NotificationHelper::error('update', 'Sản phẩm không tồn tại');
    //     //     header("location: /admin/variants/$id");
    //     //     exit;
    //     // }

    //     // Kiểm tra tính hợp lệ của dữ liệu
    //     $is_valid = VariantValidation::edit();
    //     if (!$is_valid) {
    //         NotificationHelper::error('update', 'Cập nhật biến thể thất bại');
    //         header("location: /admin/variants/$id");
    //         exit;
    //     }

    //     // Kiểm tra xem biến thể có tồn tại không (theo tên size và color)
    //     $is_exists = $variant->getOneVariantByName($size, $color);
    //     if ($is_exists) {
    //         if ($is_exists['variant_id'] != $id) {
    //             NotificationHelper::error('update', 'Tên biến thể đã tồn tại');
    //             header("location: /admin/variants/$id");
    //             exit;
    //         }
    //     }

    //     // Cập nhật dữ liệu cho biến thể
    //     $data = [
    //         'product_id' => $product_id, // Thêm product_id vào dữ liệu
    //         'size' => $size,
    //         'color' => $color,
    //         'status' => $status,
    //     ];

    //     // Gọi phương thức updateVariant và truyền đúng tham số
    //     $result = $variant->updateVariant($id, $data);

    //     // Xử lý kết quả cập nhật
    //     if ($result) {
    //         NotificationHelper::success('update', 'Cập nhật biến thể thành công');
    //         header('location: /admin/variants');
    //     } else {
    //         NotificationHelper::error('update', 'Cập nhật biến thể thất bại');
    //         header("location: /admin/variants/$id");
    //     }
    // }

    public static function update(int $id)
    {
        // Lấy dữ liệu từ $_POST
        $size = $_POST['size'] ?? '';
        $color = $_POST['color'] ?? '';
        $status = $_POST['status'] ?? '';
        $product_id = $_POST['product_id'] ?? null;

        // Kiểm tra nếu product_id là null hoặc không hợp lệ
        if ($product_id === null || !is_numeric($product_id) || $product_id <= 0) {
            $_SESSION['notification'] = [
                'type' => 'error',
                'message' => 'ID sản phẩm không hợp lệ'
            ];
            header("location: /admin/variants/$id");
            exit;
        }

        // Kiểm tra sự tồn tại của sản phẩm trong cơ sở dữ liệu
        $variant = new Variant();
        // $is_product_exist = $variant->checkProductExists($product_id);
        // if (!$is_product_exist) {
        //     $_SESSION['notification'] = [
        //         'type' => 'error',
        //         'message' => 'Sản phẩm không tồn tại'
        //     ];
        //     header("location: /admin/variants/$id");
        //     exit;
        // }

        // Kiểm tra tính hợp lệ của dữ liệu
        $is_valid = VariantValidation::edit();
        if (!$is_valid) {
            $_SESSION['notification'] = [
                'type' => 'error',
                'message' => 'Cập nhật biến thể thất bại'
            ];
            header("location: /admin/variants/$id");
            exit;
        }

        // Kiểm tra xem biến thể có tồn tại không (theo tên size và color)
        $is_exists = $variant->getOneVariantByName($size, $color);
        if ($is_exists) {
            if ($is_exists['variant_id'] != $id) {
                $_SESSION['notification'] = [
                    'type' => 'error',
                    'message' => 'Tên biến thể đã tồn tại'
                ];
                header("location: /admin/variants/$id");
                exit;
            }
        }

        // Cập nhật dữ liệu cho biến thể
        $data = [
            'product_id' => $product_id, // Thêm product_id vào dữ liệu
            'size' => $size,
            'color' => $color,
            'status' => $status,
        ];

        // Gọi phương thức updateVariant và truyền đúng tham số
        $result = $variant->updateVariant($id, $data);

        // Xử lý kết quả cập nhật
        if ($result) {
            $_SESSION['notification'] = [
                'type' => 'success',
                'message' => 'Cập nhật biến thể thành công'
            ];
            header('location: /admin/variants');
        } else {
            $_SESSION['notification'] = [
                'type' => 'error',
                'message' => 'Cập nhật biến thể thất bại'
            ];
            header("location: /admin/variants/$id");
        }
        exit;
    }






    // thực hiện xoá
    // public function delete(int $id)
    // {
    //     // Kiểm tra nếu biến thể tồn tại và thực hiện xóa
    //     $variant = new Variant();
    //     $result = $variant->deleteVariant($id);

    //     if ($result) {
    //         NotificationHelper::success('delete', 'Xóa biến thể thành công');
    //     } else {
    //         NotificationHelper::error('delete', 'Xóa biến thể thất bại');
    //     }

    //     // Điều hướng lại trang danh sách biến thể
    //     header('Location: /admin/variants');
    //     exit;
    // }
    public function delete(int $id)
    {
        // Kiểm tra nếu biến thể tồn tại và thực hiện xóa
        $variant = new Variant();
        $result = $variant->deleteVariant($id);

        // Lưu thông báo vào session
        if ($result) {
            $_SESSION['notification'] = [
                'type' => 'success',
                'message' => 'Xóa biến thể thành công'
            ];
        } else {
            $_SESSION['notification'] = [
                'type' => 'error',
                'message' => 'Xóa biến thể thất bại'
            ];
        }

        // Điều hướng lại trang danh sách biến thể
        header('Location: /admin/variants');
        exit;
    }
}
