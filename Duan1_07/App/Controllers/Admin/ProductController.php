<?php

namespace App\Controllers\Admin;


use App\Helpers\NotificationHelper;
use App\Models\Category;
use App\Models\Product;
use App\Validations\ProductValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\Product\Create;
use App\Views\Admin\Pages\Product\Edit;
use App\Views\Admin\Pages\Product\Index;

class ProductController
{


    // hiển thị danh sách
    public static function index()
    {

        $product = new Product();
        $data = $product->getAllProductJoinCategory();

        // echo '<pre';
        // var_dump($data);
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị giao diện danh sách
        Index::render($data);
        //Footer::render();
    }


    // hiển thị giao diện form thêm
    public static function create()
    {
        $category = new Category();
        $data = $category->getAllCategory();
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị form thêm
        Create::render($data);
        //Footer::render();
    }


    // xử lý chức năng thêm
    public static function store()
    {
        // Validation các trường dữ liệu
        $is_valid = ProductValidation::create();

        if (!$is_valid) {
            $_SESSION['notification'] = [
                'type' => 'error',
                'message' => 'Thêm sản phẩm thất bại.'
            ];
            header('Location: /admin/products/create');
            exit();
        }

        $name = $_POST['product_name'];

        // Kiểm tra tên sản phẩm có tồn tại => không được trùng tên
        $product = new Product();
        $is_exits = $product->getOneProductByName($name);

        if ($is_exits) {
            $_SESSION['notification'] = [
                'type' => 'error',
                'message' => 'Tên sản phẩm đã tồn tại.'
            ];
            header('Location: /admin/products/create');
            exit();
        }

        // Thêm vào database
        $data = [
            'product_name' => $name,
            'price' => $_POST['price'],
            'stock_quantity' => $_POST['stock_quantity'],
            'description' => $_POST['description'],
            'status' => $_POST['status'],
            'category_id' => $_POST['categories_id'],
            'discount_price' => $_POST['discount_price'],
        ];

        $is_upload = ProductValidation::uploadImage();
        if ($is_upload) {
            $data['image'] = $is_upload;
        }

        $result = $product->createProduct($data);

        if ($result) {
            $_SESSION['notification'] = [
                'type' => 'success',
                'message' => 'Thêm sản phẩm thành công.'
            ];
            header('Location: /admin/products');
            exit();
        } else {
            $_SESSION['notification'] = [
                'type' => 'error',
                'message' => 'Thêm sản phẩm thất bại.'
            ];
            header('Location: /admin/products/create');
            exit();
        }
    }



    // // hiển thị chi tiết
    // public static function show()
    // {
    // }


    // hiển thị giao diện form sửa
    public static function edit(int $id)
    {

        $product = new Product();
        $data_product = $product->getOneProduct($id);

        $category = new Category();
        $data_category = $category->getAllCategory();


        if (!$data_product) {
            NotificationHelper::error('edit', 'Không thể xem sản phẩm này');
            header('location: /admin/products');
            exit;
        }

        $data = [
            'products' => $data_product,
            'categories' => $data_category,
        ];

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị form sửa
        Edit::render($data);
        //Footer::render();

    }


    // xử lý chức năng sửa (cập nhật)
    public static function update(int $id)
    {
        // Validation các trường dữ liệu
        $is_valid = ProductValidation::edit();

        if (!$is_valid) {
            $_SESSION['notification'] = [
                'type' => 'error',
                'message' => 'Cập nhật sản phẩm thất bại.'
            ];
            header("Location: /admin/products/$id");
            exit();
        }

        $name = $_POST['product_name'];
        $status = $_POST['status'];

        // Kiểm tra tên sản phẩm có tồn tại => không được trùng tên
        $product = new Product();
        $is_exits = $product->getOneProductByName($name);

        if ($is_exits && $is_exits['id'] != $id) {
            $_SESSION['notification'] = [
                'type' => 'error',
                'message' => 'Tên sản phẩm đã tồn tại.'
            ];
            header("Location: /admin/products/$id");
            exit();
        }

        // Thực hiện cập nhật
        $data = [
            'product_name' => $name,
            'price' => $_POST['price'],
            'description' => $_POST['description'],
            'status' => $_POST['status'],
            'category_id' => $_POST['categories_id'],
        ];

        $is_upload = ProductValidation::uploadImage();
        if ($is_upload) {
            $data['image'] = $is_upload;
        }

        $result = $product->updateProduct($id, $data);

        if ($result) {
            $_SESSION['notification'] = [
                'type' => 'success',
                'message' => 'Cập nhật sản phẩm thành công.'
            ];
            header('Location: /admin/products');
            exit();
        } else {
            $_SESSION['notification'] = [
                'type' => 'error',
                'message' => 'Cập nhật sản phẩm thất bại.'
            ];
            header("Location: /admin/products/$id");
            exit();
        }
    }



    // thực hiện xoá
    public static function delete(int $id)
{
    $product = new Product();
    $result = $product->deleteProduct($id);

    if ($result) {
        $_SESSION['notification'] = [
            'type' => 'success',
            'message' => 'Xóa sản phẩm thành công.'
        ];
    } else {
        $_SESSION['notification'] = [
            'type' => 'error',
            'message' => 'Xóa sản phẩm thất bại.'
        ];
    }

    header('Location: /admin/products');
    exit();
}

}
