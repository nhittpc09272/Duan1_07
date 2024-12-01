<?php

namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\ProductVariants;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Product\Category as ProductCategory;
use App\Views\Client\Pages\Product\Detail;
use App\Views\Client\Pages\Product\Index;

class ProductController
{
    // Hiển thị danh sách
    public static function index()
    {
        $category = new Category();
        $categories = $category->getAllCategoryByStatus();
        $product = new Product();
        $products = $product->getAllProductByStatus();

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

    // Hiển thị chi tiết sản phẩm
    public static function detail($id)
    {
        $product = new Product();
        $product_detail = $product->getOneProductByStatus($id);

        // Lấy biến thể của sản phẩm
        $productVariantModel = new ProductVariants();
        $variants = $productVariantModel->getVariantsByProductId($id);

        // Tạo mảng màu sắc và kích thước từ biến thể
        $color = [];
        $size = [];
        foreach ($variants as $variant) {
            if (!in_array($variant['color'], $color)) {
                $color[] = $variant['color'];
            }
            if (!in_array($variant['size'], $size)) {
                $size[] = $variant['size'];
            }
        }

        $comment = new Comment();
        $comments = $comment->get5CommentNewestByProductAndStatus($id); // $comments chứa 5 bình luận mới nhất cho sản phẩm đó.


        $data = [ //$data là mảng chứa thông tin sản phẩm và bình luận, được chuyển tới view Detail để hiển thị.
            'product' => $product_detail,
            'color' => $color,
            'size' => $size,
            'comments' => $comments
        ];

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Detail::render($data);
        Footer::render();
    }

    // Lấy sản phẩm theo danh mục
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
