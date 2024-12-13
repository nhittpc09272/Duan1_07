<?php
namespace App\Controllers\Client;


class Cart
{
    public static function data($item)
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        $_SESSION['cart'][] = $item;
    }

    public static function getItems()
    {
        return $_SESSION['cart'] ?? [];
    }
}
