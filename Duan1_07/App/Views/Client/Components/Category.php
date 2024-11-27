<?php

namespace App\Views\Client\Components;

use App\Views\BaseView;

class Category extends BaseView
{
    public static function render($data = null)
    {
?>
        <div class="sidebar-categories">
            <div class="head mb-4" style="font-size: 20px; font-weight: bold; color: #333;">Danh Mục Sản Phẩm</div>
            <ul class="main-categories list-unstyled">
                <li><a href="/products" class="text-decoration-none">Tất cả sản phẩm</a></li>
                <?php
                if ($data && count($data)) {
                    foreach ($data as $item) :
                        $id = $item['categories_id'] ?? '#';
                        $name = $item['category_name'] ?? 'Tên không xác định';
                ?>
                        <li><a href="/products/categories/<?= htmlspecialchars($id) ?>" class="text-decoration-none"><?= htmlspecialchars($name) ?></a></li>
                <?php
                    endforeach;
                } else {
                    echo "<li><p class='text-muted'>Không có danh mục</p></li>";
                }
                ?>
            </ul>
        </div>
<?php
    }
}
?>