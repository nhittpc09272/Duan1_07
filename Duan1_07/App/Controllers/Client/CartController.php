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
        if (isset($_COOKIE['cart'])) {
            $product = new Product();
            $cookie_data = $_COOKIE['cart'];
            $cart_data = json_decode($cookie_data, true);

            if (count($cart_data)) {
                foreach ($cart_data as $key => $value) {
                    $product_id = $value['product_id'];
                    $variant_id = $value['variant_id'] ?? null;

                    // Lấy thông tin sản phẩm
                    $result = $product->getOneProduct($product_id);
                    $cart_data[$key]['data'] = $result;

                    // Lấy thông tin biến thể (nếu có)
                    if ($variant_id) {
                        $variant = $product->getVariantById($variant_id);
                        $cart_data[$key]['variant'] = $variant; // Lưu thông tin biến thể vào giỏ hàng
                    } else {
                        $cart_data[$key]['variant'] = null;
                    }
                }

                // Render giỏ hàng với thông tin đầy đủ (bao gồm cả thông tin biến thể)
                Header::render();
                Notification::render();
                NotificationHelper::unset();
                Index::render($cart_data); // Render giỏ hàng với thông tin đầy đủ
                Footer::render();
            } else {
                NotificationHelper::error('cart', 'Giỏ hàng trống. Vui lòng thêm sản phẩm vào');
                header('location: /products');
                exit;
            }
        } else {
            NotificationHelper::error('cart', 'Giỏ hàng trống. Vui lòng thêm sản phẩm vào');
            header('location: /products');
            exit;
        }
    }





    public static function add()
    {
        ob_start(); // Start output buffering
    
        $product = new Product();
        Header::render();
        Footer::render();
    
        $product_id = $_POST['id'];
    
        // Start session if not already started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
        // Initialize cart if not already set
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    
        // Check if product already exists in the cart
        $product_id_arr = array_column($_SESSION['cart'], 'product_id');
    
        if (in_array($product_id, $product_id_arr)) {
            // If product is already in the cart, increase the quantity
            foreach ($_SESSION['cart'] as $key => $value) {
                if ($_SESSION['cart'][$key]['product_id'] == $product_id) {
                    $_SESSION['cart'][$key]['quantity'] += 1;
                }
            }
        } else {
            // If product is not in the cart, add it
            $product_array = [
                'product_id' => $product_id,
                'quantity' => 1,
            ];
            $_SESSION['cart'][] = $product_array;
        }
    
        // Optionally, you can store a success notification (uncomment if needed)
        // NotificationHelper::success('cart', 'Product added to cart successfully.');
    
        // Redirect to the cart page after adding the item
        header('Location: /cart');
        exit;
    
        ob_end_flush(); // End output buffering
    }
    





    public static function update()
    {
        ob_start(); // Bắt đầu output buffering

        $product_id = $_POST['id'];
        $variant_id = $_POST['variant_id']; // Nhận variant_id
        $quantity = $_POST['quantity'];

        if (isset($_COOKIE['cart'])) {
            // Nếu đã tồn tại cookie cart, lấy giá trị của cookie cart
            $cookie_data = $_COOKIE['cart'];
            $cart_data = json_decode($cookie_data, true);
        } else {
            $cart_data = array();
        }

        $product_id_arr = array_column($cart_data, 'product_id');
        $variant_id_arr = array_column($cart_data, 'variant_id');

        // Kiểm tra product_id và variant_id có tồn tại trong cookie cart chưa
        if (in_array($product_id, $product_id_arr) && in_array($variant_id, $variant_id_arr)) {
            foreach ($cart_data as $key => $value) {
                // Nếu có thì cập nhật số lượng sản phẩm
                if ($cart_data[$key]['product_id'] == $product_id && $cart_data[$key]['variant_id'] == $variant_id) {
                    $cart_data[$key]['quantity'] = $quantity;
                }
            }
        } else {
            // Nếu chưa có thì thêm vào cookie cart
            $product_array = array(
                'product_id' => $product_id,
                'variant_id' => $variant_id, // Lưu thêm variant_id
                'quantity' => 1,
            );
            $cart_data[] = $product_array;
        }

        // Chuyển array thành string để lưu vào cookie cart
        $product_data = json_encode($cart_data);

        // Lưu cookie
        setcookie('cart', $product_data, time() + 3600 * 24 * 30 * 12, '/');

        // NotificationHelper::success('cart', 'Đã cập nhật số lượng sản phẩm');

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
                if ($cart_data[$key]['product_id'] == $_POST['id'] && $cart_data[$key]['variant_id'] == $_POST['variant_id']) {
                    unset($cart_data[$key]);
                    $product_data = json_encode($cart_data);

                    setcookie("cart", $product_data, time() + 3600 * 24 * 30 * 12, '/');
                }
            }

            header('location: /cart');
            exit;
        }

        ob_end_flush(); // Kết thúc output buffering
    }


    public static function deleteAll()
    {
        ob_start(); // Bắt đầu output buffering

        if (isset($_COOKIE['cart'])) {
            // Xóa giỏ hàng (cookie)
            setcookie("cart", "", time() - 3600 * 24 * 30 * 12, '/');

            // Lưu thông báo vào session
            $_SESSION['notification'] = [
                'type' => 'success',
                'message' => 'Đã xoá sản phẩm giỏ hàng'
            ];
        } else {
            // Nếu không có giỏ hàng trong cookie
            $_SESSION['notification'] = [
                'type' => 'error',
                'message' => 'Giỏ hàng trống. Không có sản phẩm để xóa.'
            ];
        }

        // Chuyển hướng về trang sản phẩm
        header('location: /products');
        exit;

        ob_end_flush(); // Kết thúc output buffering
    }

    public static function checkout()
    {
        ob_start();

        $is_login = AuthHelper::checkLogin();
        if (isset($_COOKIE['cart']) && $is_login) {
            $product = new Product();

            $cookie_data = $_COOKIE['cart'];
            $cart_data = json_decode($cookie_data, true);

            if (count($cart_data)) {
                foreach ($cart_data as $key => $value) {
                    $product_id = $value['product_id'];
                    $variant_id = $value['variant_id'];
                    $result = $product->getOneProduct($product_id);
                    $cart_data[$key]['data'] = $result;

                    // Lấy thông tin biến thể
                    $variant = $product->getVariantById($variant_id);
                    $cart_data[$key]['variant'] = $variant;
                }

                Header::render();
                Notification::render();
                NotificationHelper::unset();
                Checkout::render($cart_data); // Render giỏ hàng với thông tin biến thể
                Footer::render();
            } else {
                header('location: /products');
                exit;
            }
        } else {
            header('location: /');
            exit;
        }

        ob_end_flush();
    }


    public static function order()
    {
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Order::render();
        Footer::render();
    }

    // Controller xử lý thêm sản phẩm vào giỏ hàng
    // public function addToCart()
    // {

    //     // Lấy thông tin sản phẩm và các biến thể
    //     $productId = $_POST['id'] ?? null;
    //     $color = $_POST['selected_color'] ?? null;
    //     $size = $_POST['selected_size'] ?? null;

    //     // Kiểm tra giỏ hàng
    //     if (!isset($_SESSION['cart'])) {
    //         $_SESSION['cart'] = [];
    //     }

    //     // Thêm sản phẩm vào giỏ hàng
    //     $_SESSION['cart'][] = [
    //         'product_id' => $productId,
    //         'color' => $color,
    //         'size' => $size,
    //         var_dump($_SESSION['cart'])
    //     ];

    //     // Chuyển hướng về trang giỏ hàng
    //     header('Location: /cart');
    // }
    public function addToCart()
    {
        // Start session to use $_SESSION
        session_start();

        // Lấy thông tin sản phẩm và các biến thể
        $productId = $_POST['id'] ?? null;
        $color = $_POST['selected_color'] ?? null;
        $size = $_POST['selected_size'] ?? null;

        // Kiểm tra giỏ hàng, nếu chưa có thì tạo mới
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Lấy các biến thể từ cơ sở dữ liệu
        $variants = $this->getProductVariants($productId);  // Đảm bảo bạn có phương thức này

        // Kiểm tra nếu có biến thể hợp lệ
        $variantExists = false;
        foreach ($variants as $variant) {
            if ($variant['color'] == $color && $variant['size'] == $size) {
                $variantExists = true;
                break;
            }
        }

        if (!$variantExists) {
            echo "Màu sắc và kích thước không hợp lệ!";
            return;
        }

        // Thêm sản phẩm vào giỏ hàng
        $_SESSION['cart'][] = [
            'product_id' => $productId,
            'quantity' => $_POST['quantity'] ?? 1,
            'variant' => [
                'color' => $color,
                'size' => $size,
            ]
        ];

        // Chuyển hướng về trang giỏ hàng
        header('Location: /cart');
        exit;
    }






    public function getProductVariants($productId)
    {
        global $mysqli;  // Đảm bảo bạn có kết nối MySQLi đúng

        // Truy vấn lấy thông tin biến thể của sản phẩm
        $stmt = $mysqli->prepare("SELECT color, size FROM product_variants WHERE product_id = ?");
        $stmt->bind_param("i", $productId);  // Ràng buộc tham số là integer
        $stmt->execute();
        $result = $stmt->get_result();

        $variants = [];
        while ($row = $result->fetch_assoc()) {
            $variants[] = $row;  // Lưu mỗi biến thể vào mảng
        }

        $stmt->close();
        return $variants;
    }
}
