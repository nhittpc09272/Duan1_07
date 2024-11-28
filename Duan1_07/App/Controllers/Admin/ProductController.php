<?php

namespace App\Controllers\Admin;


use App\Helpers\NotificationHelper;
use App\Models\Category;
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
        // giả sử data là mảng dữ liệu lấy được từ database
        $data = [
            [
                'id' => 1,
                'name' => 'Giày Nike Air Force 1',
                'image' => 'https://example.com/images/nike-air-force-1.jpg',
                'price' => 3500000,
                'quantity' => 20,
                'status' => 1
            ],
            [
                'id' => 2,
                'name' => 'Giày Adidas Ultraboost 22',
                'image' => 'https://example.com/images/adidas-ultraboost-22.jpg',
                'price' => 4500000,
                'quantity' => 15,
                'status' => 1
            ],
            [
                'id' => 3,
                'name' => 'Giày Converse Chuck Taylor All Star',
                'image' => 'https://example.com/images/converse-chuck-taylor.jpg',
                'price' => 1200000,
                'quantity' => 30,
                'status' => 1
            ],
            [
                'id' => 4,
                'name' => 'Giày Vans Old Skool',
                'image' => 'https://example.com/images/vans-old-skool.jpg',
                'price' => 1600000,
                'quantity' => 25,
                'status' => 1
            ],
            [
                'id' => 5,
                'name' => 'Giày Puma Suede Classic',
                'image' => 'https://example.com/images/puma-suede-classic.jpg',
                'price' => 2000000,
                'quantity' => 10,
                'status' => 0
            ]
        ];
        
        

        Header::render();
        // hiển thị giao diện danh sách
        Index::render($data);
        Footer::render();
    }


    // hiển thị giao diện form thêm
    public static function create()
    {
        Header::render();
        // hiển thị form thêm
        Create::render();
        Footer::render();
    }


    // xử lý chức năng thêm
    public static function store()
    {
        echo 'Thực hiện lưu vào database';
    }


    // hiển thị chi tiết
    public static function show()
    {
    }


    // hiển thị giao diện form sửa
    public static function edit(int $id)
    {
        // giả sử data là mảng dữ liệu lấy được từ database
        $data = [
            'id' => $id,
            'name' => 'Category 1',
            'status' => 1
        ];
        if ($data) {
            Header::render();
            // hiển thị form sửa
            Edit::render($data);
            Footer::render();
        } else {
            header('location: /admin/products');
        }
    }


    // xử lý chức năng sửa (cập nhật)
    public static function update(int $id)
    {
        echo 'Thực hiện cập nhật vào database';

    }


    // thực hiện xoá
    public static function delete(int $id)
    {
        echo 'Thực hiện xoá';
        
    }
}
