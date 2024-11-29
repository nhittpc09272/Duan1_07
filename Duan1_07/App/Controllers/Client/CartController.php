<?php

namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use App\Models\Product;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Checkouts\Checkout;
use App\Views\Client\Pages\Cart\Order;
use App\Views\Client\Pages\Cart\Index;

class CartController
{
    public static function index()
    {
        // echo "index";
        if (isset($_COOKIE['cart'])) {
            $product = new Product();
            // var_dump($product);
            

            $cookie_data = $_COOKIE['cart'];
            $cart_data = json_decode($cookie_data, true);
            if (count($cart_data)) {
                foreach ($cart_data as $key => $value) {
                    $product_id = $value['product_id'];
                    $result = $product->getOneProduct($product_id);
                    $cart_data[$key]['data'] = $result;
                }
                // var_dump($cart_data);
                Header::render();
                Notification::render();
                NotificationHelper::unset();
                Index::render($cart_data);
                Footer::render();
            } else {
                NotificationHelper::error('cart', 'Giỏ hàng trống. Vui lòng thêm sản phẩm vào');

                header('location: /products');
            }
        } else {
            NotificationHelper::error('cart', 'Giỏ hàng trống. Vui lòng thêm sản phẩm vào');

            header('location: /products');
        }
    }

    public static function add()
    {
        ob_start(); // Bắt đầu output buffering

        $product = new Product();
        Header::render();
        Footer::render();

        $product_id = $_POST['id'];

        if (isset($_COOKIE['cart'])) {
            // Nếu đã tồn tại cookie cart, lấy giá trị của cookie cart
            $cookie_data = $_COOKIE['cart'];
            $cart_data = json_decode($cookie_data, true);
        } else {
            $cart_data = [];
        }

        $product_id_arr = array_column($cart_data, 'product_id');

        if (in_array($product_id, $product_id_arr)) {
            foreach ($cart_data as $key => $value) {
                // Nếu đã có thì tăng số lượng sản phẩm
                if ($cart_data[$key]['product_id'] == $product_id) {
                    $cart_data[$key]['quantity'] = $cart_data[$key]['quantity'] + 1;
                }
            }
        } else {
            // Nếu chưa có thì thêm vào cookie cart
            $product_array = [
                'product_id' => $product_id,
                'quantity' => 1,
            ];
            $cart_data[] = $product_array;
        }

        // Chuyển array thành string để lưu vào cookie cart
        $product_data = json_encode($cart_data);

        // Lưu cookie
        setcookie('cart', $product_data, time() + 3600 * 24 * 30 * 12, '/');

        // NotificationHelper::success('cart', 'Đã thêm sản phẩm vào giỏ hàng');

        // Sau khi lưu cookie, chuyển trang
        header('location: /cart');
        exit;

        ob_end_flush(); // Kết thúc output buffering
    }

    
    public static function update()
    {
        ob_start(); // Bắt đầu output buffering

        $product_id = $_POST['id'];
        $quantity = $_POST['quantity'];

        if (isset($_COOKIE['cart'])) {
            // Nếu đã tồn tại cookie cart, lấy giá trị của cookie cart
            $cookie_data = $_COOKIE['cart'];
            $cart_data = json_decode($cookie_data, true);
        } else {
            $cart_data = array();
        }

        $product_id_arr = array_column($cart_data, 'product_id');

        // Kiểm tra product_id có tồn tại trong cookie cart chưa
        if (in_array($product_id, $product_id_arr)) {
            foreach ($cart_data as $key => $value) {
                // Nếu có thì cập nhật số lượng sản phẩm
                if ($cart_data[$key]['product_id'] == $product_id) {
                    $cart_data[$key]['quantity'] = $quantity;
                }
            }
        } else {
            // Nếu chưa có thì thêm vào cookie cart
            $product_array = array(
                'product_id' => $product_id,
                'quantity' => 1,
            );
            $cart_data[] = $product_array;
        }

        // Chuyển array thành string để lưu vào cookie cart
        $product_data = json_encode($cart_data);

        // Lưu cookie
        setcookie('cart', $product_data, time() + 3600 * 24 * 30 * 12, '/');

        NotificationHelper::success('cart', 'Đã cập nhật số lượng sản phẩm');

        // Sau khi lưu cookie, chuyển trang
        header('location: /cart');
        exit;

        ob_end_flush(); // Kết thúc output buffering
    }

    public static function deleteItem()
    {
        ob_start(); // Bắt đầu output buffering

        if (isset($_COOKIE['cart'])) {
            $cookie_data = $_COOKIE['cart'];
            $cart_data = json_decode($cookie_data, true);
            foreach ($cart_data as $key => $value) {
                if ($cart_data[$key]['product_id'] == $_POST['id']) {
                    unset($cart_data[$key]);
                    $product_data = json_encode($cart_data);

                    setcookie("cart", $product_data, time() + 3600 * 24 * 30 * 12, '/');
                }
            }
            // NotificationHelper::success('cart', 'Đã xoá sản phẩm khỏi giỏ hàng');

            header('location: /cart');
            exit;
        }

        ob_end_flush(); // Kết thúc output buffering
    }

    public static function deleteAll()
    {
        ob_start(); // Bắt đầu output buffering

        if (isset($_COOKIE['cart'])) {
            setcookie("cart", "", time() - 3600 * 24 * 30 * 12, '/');
        }

        // NotificationHelper::success('cart', 'Đã xoá giỏ hàng');

        header('location: /products');
        exit;

        ob_end_flush(); // Kết thúc output buffering
    }

    public static function checkout()
    {
        ob_start(); // Bắt đầu output buffering

        $is_login = AuthHelper::checkLogin();
        if (isset($_COOKIE['cart']) && $is_login) {
            $product = new Product();

            $cookie_data = $_COOKIE['cart'];
            $cart_data = json_decode($cookie_data, true);

            if (count($cart_data)) {
                foreach ($cart_data as $key => $value) {
                    $product_id = $value['product_id'];
                    $result = $product->getOneProduct($product_id);
                    $cart_data[$key]['data'] = $result;
                }

                Header::render();
                Notification::render();
                NotificationHelper::unset();
                Checkout::render($cart_data);
                Footer::render();
            } else {
                // NotificationHelper::error('cart', 'Giỏ hàng trống. Vui lòng thêm sản phẩm vào');
                header('location: /products');
                exit;
            }
        } else {
            // NotificationHelper::error('checkout', 'Vui lòng đăng nhập hoặc thêm sản phẩm vào giỏ hàng để thanh toán');
            header('location: /');
            exit;
        }

        ob_end_flush(); // Kết thúc output buffering
    }

    public static function order()
    {
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Order::render();
        Footer::render();
    }


}
