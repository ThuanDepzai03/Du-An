<?php

include_once(__DIR__ . '/../Model/CartModel.php'); // sửa đường dẫn cho đúng

class CartController {
    private $cartModel;

    public function __construct() {
        $this->cartModel = new CartModel();

        // Start session only once
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Initialize cart session if not exist
        if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }

    // Add product to cart
    public function add() {
        if (!isset($_GET['idsp'])) {
            return;
        }

        $idSP = intval($_GET['idsp']);
        $exists = false;

        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['id'] == $idSP) {
                $_SESSION['cart'][$key]['soLuong'] += 1;
                $exists = true;
                break;
            }
        }

        if (!$exists) {
            $_SESSION['cart'][] = [
                "id" => $idSP,
                "soLuong" => 1
            ];
        }

        // Redirect back to cart (tùy bạn)
        header("Location: index.php?action=showcart");
        exit;
    }

    // Remove item from cart
    public function remove($idSP) {
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['id'] == $idSP) {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                break;
            }
        }

        header("Location: index.php?action=showcart");
        exit;
    }

    // Update quantity
    public function update($idSP, $soLuong) {
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['id'] == $idSP) {
                $_SESSION['cart'][$key]['soLuong'] = max(1, intval($soLuong));
                break;
            }
        }
    }

    // Load cart page
    public function index() {

        foreach ($_SESSION['cart'] as $key => $item) {
            $product = $this->cartModel->getAllProductById($item['id']);

            if ($product) {
                $_SESSION['cart'][$key]['name'] = $product['name'];
                $_SESSION['cart'][$key]['price'] = $product['price'];
                $_SESSION['cart'][$key]['img'] = $product['img'];
            } else {
                // Remove invalid product
                unset($_SESSION['cart'][$key]);
            }
        }

        // Re-index
        $_SESSION['cart'] = array_values($_SESSION['cart']);

        include_once("./Views/cart.php");
    }
}
?>
