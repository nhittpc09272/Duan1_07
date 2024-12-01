<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;

class Search extends BaseView
{
    public static function render($data = null)
    {
?>
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-12">
                    <!-- Form tìm kiếm -->
                    <form method="GET" action="/search">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="query" value="<?= htmlspecialchars($data['query'] ?? '') ?>" placeholder="Nhập tên sản phẩm">
                            <button class="btn btn-primary" type="submit">Tìm kiếm</button>
                        </div>
                    </form>

                    <!-- Kiểm tra nếu có kết quả tìm kiếm -->
                    <?php if (isset($data['products']) && count($data['products']) > 0) : ?>
                        <h2 class="text-center mb-4">Kết quả tìm kiếm cho: "<?= htmlspecialchars($data['query']) ?>"</h2>
                        <div class="row">
                            <?php foreach ($data['products'] as $item) : ?>
                                <div class="col-md-4">
                                    <div class="card mb-4 shadow-sm">
                                        <img src="<?= APP_URL ?>/public/assets/client/img/image/<?= $item['image'] ?? 'default.jpg' ?>" class="card-img-top" alt="" style="width: 100%; display: block;" data-holder-rendered="true">
                                        <div class="card-body">
                                            <p class="card-text"><?= htmlspecialchars($item['product_name'] ?? 'Sản phẩm không có tên') ?></p>
                                            <p>Giá tiền: <?= number_format($item['price'] ?? 0) ?> đ</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <a href="/products/<?= $item['product_id'] ?>" type="button" class="btn btn-sm btn-outline-info h-50">Chi tiết</a>
                                                    <form action="#" method="post">
                                                        <input type="hidden" name="method" value="POST">
                                                        <button type="submit" class="btn btn-sm btn-outline-success">Thêm vào giỏ hàng</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else : ?>
                        <h3 class="text-center text-danger">Không tìm thấy sản phẩm nào phù hợp</h3>
                    <?php endif; ?>
                </div>
            </div>
        </div>
<?php
    }
}
