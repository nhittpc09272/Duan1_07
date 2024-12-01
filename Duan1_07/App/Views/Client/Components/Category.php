<?php

namespace App\Views\Client\Components;

use App\Views\BaseView;

class Category extends BaseView
{
    public static function render($data = null)
    {
?>
        <div class="sidebar-categories p-3 border rounded ">
            <!-- Tiêu đề danh mục -->
            <h4 class="font-weight-bold mb-3 text-center" style="color: #555;">✨Danh Mục Sản Phẩm✨</h4>
            <ul class="list-group">
                <!-- Liên kết đến tất cả sản phẩm -->
                <li class="list-group-item d-flex justify-content-between align-items-center"
    style="cursor: pointer; transition: all 0.3s ease; transform: scale(1); background-color: #FFA87A; border: 1px solid #F8BBD0; border-radius: 10px; padding: 15px; margin-bottom: 10px;"
    onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 8px 20px rgba(0,0,0,0.15)'; this.style.backgroundColor='#F8BBD0'; this.style.borderColor='#FFD1DC';"
    onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='none'; this.style.backgroundColor='#FFA87A'; this.style.borderColor='#F8BBD0';">
    <a href="/products" class="text-decoration-none text-dark" 
       style="font-size: 1.1rem; font-weight: 500;">
        Tất Cả Sản Phẩm
    </a>
    <span class="badge badge-pill" 
          style="background-color: #FFD1DC; color: #333; font-weight: bold; font-size: 0.9rem; padding: 7px 10px; border-radius: 20px;">
          <?= count($data ?? []) ?>
    </span>
</li>

                <?php
if ($data && count($data)) {
    foreach ($data as $item) :
        $id = $item['categories_id'] ?? '#';
        $name = $item['category_name'] ?? 'Tên không xác định';
        $count = $item['product_count'] ?? 100; // Số lượng sản phẩm trong danh mục
?>
    <li class="list-group-item d-flex justify-content-between align-items-center"
        style="cursor: pointer; transition: all 0.3s ease; transform: scale(1); background-color: #E3F2FD; border: 1px solid #BBDEFB; border-radius: 10px; padding: 15px; margin-bottom: 10px; border-left: 4px solid #90CAF9;"
        onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 8px 20px rgba(0,0,0,0.15)'; this.style.backgroundColor='#BBDEFB'; this.style.borderColor='#90CAF9';"
        onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='none'; this.style.backgroundColor='#E3F2FD'; this.style.borderColor='#BBDEFB';">
        <a href="/products/categories/<?= htmlspecialchars($id) ?>" class="text-decoration-none text-dark" 
           style="font-size: 1.1rem; font-weight: 500;">
           <?= htmlspecialchars($name) ?>
        </a>
        <span class="badge badge-pill" 
              style="background-color: #90CAF9; color: #333; font-weight: bold; font-size: 0.9rem; padding: 7px 10px; border-radius: 20px;">
              <?= $count ?>
        </span>
    </li>
                <?php
                    endforeach;
                } else {
                    echo "<li class='list-group-item text-center text-muted' style='background-color: #FFF3E0; color: #FF8A65;'>Không có danh mục</li>";
                }
                ?>
            </ul>
        </div>
<?php
    }
}
?>