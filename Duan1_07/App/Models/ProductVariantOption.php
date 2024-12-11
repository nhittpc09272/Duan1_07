<?php

namespace App\Models;

class ProductVariantOption extends BaseModel
{
    protected $table = 'product_variant_options'; // Tên bảng
    protected $id = 'product_variant_option_id'; // Khóa chính

    // Constants cho trạng thái
    const STATUS_ENABLE = 1;
    const STATUS_DISABLE = 0;

    
}


