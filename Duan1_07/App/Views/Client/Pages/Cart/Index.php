<?php
namespace App\Views\Client\Pages\Cart;

use App\Helpers\AuthHelper;
use App\Views\BaseView;

class Index extends BaseView
{
    public static function render($data = null)
    {
        $is_login = AuthHelper::checkLogin();
        $total_price = 0;
        $item_count = 0;

        // Tính tổng giá và số lượng sản phẩm
        foreach ($data as $cart) {
            if ($cart['data']) {
                $unit_price = $cart['quantity'] * ($cart['data']['price'] - $cart['data']['discount_price']);
                $total_price += $unit_price;
                $item_count += $cart['quantity'];
            }
        }
?>
    <style>
        :root {
            --primary-color: #000;
            --secondary-color: #666;
            --border-color: #e0e0e0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f5f5f5;
            color: var(--primary-color);
        }

        .cart-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            gap: 30px;
        }

        .cart-items {
            flex: 2;
            background-color: white;
            padding: 20px;
            border: 1px solid var(--border-color);
        }

        .cart-summary {
            flex: 1;
            background-color: white;
            padding: 20px;
            border: 1px solid var(--border-color);
            height: fit-content;
        }

        .cart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .cart-header h1 {
            font-size: 24px;
            font-weight: 600;
        }

        .cart-item {
            display: flex;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid var(--border-color);
        }

        .cart-item img {
            width: 120px;
            height: 160px;
            object-fit: cover;
            margin-right: 20px;
        }

        .item-details {
            flex-grow: 1;
        }

        .item-details h3 {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .item-details p {
            color: var(--secondary-color);
            font-size: 14px;
        }

        .quantity-control {
            display: flex;
            align-items: center;
            border: 1px solid var(--border-color);
            width: 120px;
        }

        .quantity-control button {
            background: none;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        .quantity-control input {
            width: 50px;
            text-align: center;
            border: none;
            font-size: 16px;
        }

        .item-price {
            font-weight: 600;
            text-align: right;
        }

        .original-price {
            text-decoration: line-through;
            color: #888;
            font-size: 14px;
        }

        .discounted-price {
            color: red;
        }

        .cart-summary-details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .checkout-btn {
            width: 100%;
            padding: 15px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
        }

        .remove-btn {
            background: none;
            border: none;
            color: var(--secondary-color);
            cursor: pointer;
            margin-top: 10px;
        }

        .cart-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="cart-container">
        <div class="cart-items">
            <div class="cart-header">
                <h1>Giỏ hàng (<?= $item_count ?> sản phẩm)</h1>
                <a href="/products">Tiếp tục mua sắm</a>
            </div>

            <?php foreach ($data as $cart): ?>
                <?php if ($cart['data']): ?>
                    <div class="cart-item">
                        <img src="<?= APP_URL ?>/public/assets/client/img/image/<?= $cart['data']['image'] ?>" alt="<?= $cart['data']['product_name'] ?>">
                        
                        <div class="item-details">
                            <h3><?= $cart['data']['product_name'] ?></h3>
                            <p>Mã sản phẩm: <?= $cart['data']['product_id'] ?></p>
                            
                            <form action="/cart/update" method="post" class="quantity-control">
                                <input type="hidden" name="method" value="PUT">
                                <button type="button" onclick="this.parentNode.querySelector('input[name=quantity]').stepDown()">&#8722;</button>
                                <input type="number" name="quantity" value="<?= $cart['quantity'] ?>" min="1" max="99" onchange="this.form.submit()">
                                <button type="button" onclick="this.parentNode.querySelector('input[name=quantity]').stepUp()">&#43;</button>
                                <input type="hidden" name="id" value="<?= $cart['data']['product_id'] ?>">
                                <input type="hidden" name="update-cart-item">
                            </form>
                            
                            <form action="cart/delete" method="post">
                                <input type="hidden" name="method" value="DELETE">
                                <input type="hidden" name="id" value="<?= $cart['data']['product_id'] ?>">
                                <button class="remove-btn" type="submit">Xóa</button>
                            </form>
                        </div>
                        
                        <div class="item-price">
                            <?php if ($cart['data']['discount_price'] > 0): ?>
                                <div class="original-price"><?= number_format($cart['data']['price']) ?>đ</div>
                                <div class="discounted-price"><?= number_format($cart['data']['price'] - $cart['data']['discount_price']) ?>đ</div>
                            <?php else: ?>
                                <?= number_format($cart['data']['price']) ?>đ
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <div class="cart-summary">
            <div class="cart-summary-details">
                <span>Tạm tính</span>
                <span><?= number_format($total_price) ?>đ</span>
            </div>
            
            <div class="cart-summary-details">
                <span>Phí vận chuyển</span>
                <span>30. 000đ</span>
            </div>
            
            <div class="cart-summary-details">
                <strong>Tổng cộng</strong>
                <strong><?= number_format($total_price + 30000) ?>đ</strong>
            </div>
            
            <div class="cart-actions">
                <form action="/cart/delete-all" method="post">
                    <input type="hidden" name="method" value="DELETE">
                    <button class="btn btn-danger" name="delete-cart" type="submit">Xóa giỏ hàng</button>
                </form>

                <?php if ($is_login): ?>
                    <a href="/checkout" class="checkout-btn">Tiến hành thanh toán</a>
                <?php else: ?>
                    <div class="text-center">
                        <span class="text-danger">Vui lòng đăng nhập để thanh toán</span><br>
                        <a href="/login" class="btn btn-outline-dark mt-2">Đăng nhập</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
<?php
    }
}