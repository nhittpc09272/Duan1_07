<?php

namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Product\Category as ProductCategory;
use App\Views\Client\Pages\Product\Detail;
use App\Views\Client\Pages\Product\Index;

class ProductController
{
    // hiển thị danh sách
    public static function index()
    {
        $category = new Category();
        $categories = $category->getAllCategoryByStatus();
        //$category và $product là các đối tượng của lớp Category và Product
        $product = new Product();
        $products = $product->getAllProductByStatus();

        // Dữ liệu này được lưu trữ trong mảng $data và được chuyển tới view Index để hiển thị trên trang web.
        $data = [
            'products' => $products,
            'categories' => $categories
        ];
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Index::render($data);
        Footer::render();
    }

    // Phương thức này hiển thị chi tiết của một sản phẩm cụ thể dựa trên ID và cũng hiển thị các bình luận mới nhất cho sản phẩm đó.
    public static function detail($id)
{
    $product = new Product();
    $product_detail = $product->getOneProductByStatus($id);

    // Nếu không tìm thấy sản phẩm, hiển thị thông báo và chuyển hướng về trang danh sách sản phẩm
    if (!$product_detail) {
        NotificationHelper::error('product_detail', 'Không thể xem sản phẩm này');
        header('location: /products');
        exit;
    }

    // Lấy bình luận mới nhất cho sản phẩm (nếu cần)
    // $comment = new Comment();
    // $comments = $comment->get5CommentNewestByProductAndStatus($id);

    // Dữ liệu để truyền vào view
    $data = [
        'product' => $product_detail,
    //     'comments' => $comments
    ];

    Header::render();
    Notification::render();
    NotificationHelper::unset();
    Detail::render($data); // Truyền dữ liệu vào đây
    Footer::render();
}


    public static function getProductByCategory($id)
    {
        $category = new Category();
        $categories = $category->getAllCategoryByStatus();

        $product = new Product();
        $products = $product->getAllProductByCategoryAndStatus($id);

        $data = [
            'products' => $products,
            'categories' => $categories
        ];

        Header::render();
        ProductCategory::render($data);
        Footer::render();
    }
}