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
        echo "index";
        if (isset($_COOKIE['cart'])) {
            $product = new Product();
            var_dump($product);
            

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

    // public static function add()
    // {
    //     // Kiểm tra xem người dùng có đăng nhập hay không
    //     if (!AuthHelper::checkLogin()) {
    //         NotificationHelper::error('login', 'Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng');
    //         header('Location: /login');
    //         exit();
    //     }

    //     // Lấy ID sản phẩm từ POST
    //     $productId = (int)$_POST['id'];

    //     // Kiểm tra xem sản phẩm có tồn tại không
    //     $productModel = new Product();
    //     $product = $productModel->getOne($productId);

    //     if (!$product) {
    //         var_dump($product);
    //         NotificationHelper::error('product', 'Sản phẩm không tồn tại');
    //         header('Location: /');
    //         exit();
    //     }

    //     // Thêm sản phẩm vào giỏ hàng
    //     if (!isset($_SESSION['cart'])) {
    //         $_SESSION['cart'] = [];
    //     }

    //     // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
    //     $found = false;
    //     foreach ($_SESSION['cart'] as &$cartItem) {
    //         if ($cartItem['id'] === $productId) {
    //             $cartItem['quantity'] += 1; // Tăng số lượng nếu sản phẩm đã có
    //             $found = true;
    //             break;
    //         }
    //     }

    //     // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới
    //     if (!$found) {
    //         $_SESSION['cart'][] = [
    //             'id' => $productId,
    //             'name' => $product['name'],
    //             'price' => $product['price'],
    //             'quantity' => 1,
    //         ];
    //     }

    //     NotificationHelper::success('cart', 'Sản phẩm đã được thêm vào giỏ hàng');
    //     header('Location: /cart'); // Chuyển hướng đến giỏ hàng
    // }

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

    // public static function add()
    // {
    //     // Kiểm tra xem có dữ liệu từ form không
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         $product_id = $_POST['product_id'];
    //         $product_name = $_POST['product_name'];
    //         $product_price = $_POST['product_price'];
    //         $product_image = $_POST['product_image'];
    //         $quantity = $_POST['quantity'];

    //         // Tạo một mảng sản phẩm
    //         $product = [
    //             'id' => $product_id,
    //             'name' => $product_name,
    //             'price' => $product_price,
    //             'image' => $product_image,
    //             'quantity' => $quantity,
    //         ];
            

    //         // Kiểm tra xem giỏ hàng đã tồn tại trong session chưa
    //         if (!isset($_SESSION['cart'])) {
    //             $_SESSION['cart'] = [];
    //         }

    //         // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
    //         $found = false;
    //         foreach ($_SESSION['cart'] as &$item) {
    //             if ($item['id'] === $product_id) {
    //                 $item['quantity'] += $quantity; // Cập nhật số lượng
    //                 $found = true;
    //                 break;
    //             }
    //         }

    //         // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới
    //         if (!$found) {
    //             $_SESSION['cart'][] = $product;
    //         }

    //         NotificationHelper::success('/cart', 'Thêm sản phẩm vào giỏ hàng thành công!');
    //         header('Location: /cart'); // Chuyển hướng đến trang giỏ hàng
    //         exit();
    //     }
    // }

}
