<?php

namespace App\Controllers\Client;

use App\Models\Product; // Gọi model Product để lấy dữ liệu
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Product\Search; // View hiển thị kết quả tìm kiếm

class searchController
{
    // Hiển thị kết quả tìm kiếm
    public static function search()
    {
        // Lấy từ khóa từ request
        $query = isset($_GET['query']) ? trim($_GET['query']) : '';

        // Nếu có từ khóa, tìm kiếm sản phẩm
        $products = [];
        if ($query !== '') {
            // Tạo đối tượng Product để sử dụng phương thức truy vấn tìm kiếm
            $productModel = new Product();
            
            // Tìm kiếm sản phẩm theo tên
            $products = $productModel->searchProductsByName($query);
        }

        // Hiển thị giao diện với kết quả
        Header::render();
        Search::render([
            'products' => $products,
            'query' => $query,
        ]);
        Footer::render();
    }
}
