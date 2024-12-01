<?php

namespace App\Controllers;

use App\Helpers\NotificationHelper;
use App\Models\ProductVariants;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Product\Detail;

class ProductVariantController
{
    // Hiển thị tất cả biến thể của một sản phẩm
    public static function detail($productId)
    {
        $productVariantModel = new ProductVariants();
        $variants = $productVariantModel->getVariantsByProductId($productId);

        $data = [
            'variants' => $variants,
            'product_id' => $productId
        ];

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Detail::render($data); // Gọi view Variants
        Footer::render();
    }
}
