<?php

namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use App\Models\Product;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Cart\Checkout;
use App\Views\Client\Pages\Cart\Order;
use App\Views\Client\Pages\Cart\Index;

class CartController
{
    public static function index()
{
    if (empty($_COOKIE['cart'])) {
        NotificationHelper::error('cart', 'Giỏ hàng trống. Vui lòng thêm sản phẩm vào');
        header('location: /products');
        exit;
    }

    $product = new Product();
    $cookie_data = $_COOKIE['cart'];
    $cart_data = json_decode($cookie_data, true);

    if (empty($cart_data)) {
        NotificationHelper::error('cart', 'Giỏ hàng trống. Vui lòng thêm sản phẩm vào');
        header('location: /products');
        exit;
    }

    // Xử lý các sản phẩm trong giỏ hàng
    foreach ($cart_data as $key => $value) {
        $product_id = $value['product_id'];
        $result = $product->getOneProduct($product_id);
        $cart_data[$key]['data'] = $result;
    }

    Header::render();
    Notification::render();
    NotificationHelper::unset();
    Index::render($cart_data);
    Footer::render();
}

public static function add()
{
    $product_id = $_POST['id'];
    $product = new Product();

    // Kiểm tra sản phẩm có tồn tại không
    $product_exists = $product->getOneProduct($product_id);
    if (!$product_exists) {
        NotificationHelper::error('product', 'Sản phẩm không tồn tại');
        header('location: /products');
        exit;
    }

    // Xử lý thêm sản phẩm vào giỏ hàng
    $cart_data = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
    $product_id_arr = array_column($cart_data, 'product_id');

    if (in_array($product_id, $product_id_arr)) {
        foreach ($cart_data as $key => $value) {
            if ($cart_data[$key]['product_id'] == $product_id) {
                $cart_data[$key]['quantity']++;
            }
        }
        NotificationHelper::success('cart', 'Đã tăng số lượng sản phẩm trong giỏ hàng');
    } else {
        $cart_data[] = [
            'product_id' => $product_id,
            'quantity' => 1,
        ];
        NotificationHelper::success('cart', 'Đã thêm sản phẩm vào giỏ hàng');
    }

    $product_data = json_encode($cart_data);
    setcookie('cart', $product_data, time() + 3600 * 24 * 30 * 12, '/');

    header('location: /cart');
    exit;
}

public static function update()
{
    $product_id = $_POST['id'];
    $quantity = $_POST['quantity'];

    // Kiểm tra số lượng hợp lệ
    if ($quantity <= 0) {
        NotificationHelper::error('cart', 'Số lượng sản phẩm phải lớn hơn 0');
        header('location: /cart');
        exit;
    }

    $cart_data = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
    $product_id_arr = array_column($cart_data, 'product_id');

    if (in_array($product_id, $product_id_arr)) {
        foreach ($cart_data as $key => $value) {
            if ($cart_data[$key]['product_id'] == $product_id) {
                $cart_data[$key]['quantity'] = $quantity;
            }
        }
        NotificationHelper::success('cart', 'Đã cập nhật số lượng sản phẩm');
    } else {
        NotificationHelper::error('cart', 'Sản phẩm không tồn tại trong giỏ hàng');
        header('location: /cart');
        exit;
    }

    $product_data = json_encode($cart_data);
    setcookie('cart', $product_data, time() + 3600 * 24 * 30 * 12, '/');

    header('location: /cart');
    exit;
}

public static function deleteItem()
{
    if (!isset($_COOKIE['cart'])) {
        NotificationHelper::error('cart', 'Giỏ hàng trống');
        header('location: /cart');
        exit;
    }

    $cart_data = json_decode($_COOKIE['cart'], true);
    $original_count = count($cart_data);

    $cart_data = array_filter($cart_data, function($item) {
        return $item['product_id'] != $_POST['id'];
    });

    if (count($cart_data) < $original_count) {
        NotificationHelper::success('cart', 'Đã xoá sản phẩm khỏi giỏ hàng');
        
        $product_data = json_encode(array_values($cart_data));
        setcookie("cart", $product_data, time() + 3600 * 24 * 30 * 12, '/');
    } else {
        NotificationHelper::error('cart', 'Không tìm thấy sản phẩm để xoá');
    }

    header('location: /cart');
    exit;
}

}
