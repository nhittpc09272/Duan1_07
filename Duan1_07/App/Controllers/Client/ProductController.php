<?php

namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\ProductVariants;
use App\Models\ProductVariantOptions;
use App\Models\ProductVariantOptionCombinations; // Nếu cần để lấy các kết hợp tùy chọn
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

        // Lấy biến thể của sản phẩm từ bảng product_variants (chứ không phải product_variant_option_combinations)
        $productVariantModel = new ProductVariants();
        $variants = $productVariantModel->getVariantsByProductId($id); // Bạn cần thêm phương thức getVariantsByProductId trong model ProductVariants

        // Tạo mảng màu sắc và kích thước từ kết quả biến thể
        $colors = [];
        $sizes = [];
        foreach ($variants as $variant) {
            // Lấy màu sắc và kích thước từ bảng product_variants
            if (isset($variant['color'])) {
                $colors[] = $variant['color'];
            }
            if (isset($variant['size'])) {
                $sizes[] = $variant['size'];
            }
        }

        $comment = new Comment();
        $comments = $comment->get5CommentNewestByProductAndStatus($id);

        $data = [
            'product' => $product_detail,
            'colors' => array_unique($colors),  // Chỉ lấy các màu sắc duy nhất
            'sizes' => array_unique($sizes),    // Chỉ lấy các kích thước duy nhất
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
