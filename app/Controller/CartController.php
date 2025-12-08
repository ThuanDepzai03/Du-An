<?php

include_once(__DIR__ . '/../Model/CartModel.php'); // sửa đường dẫn cho đúng

class CartController {
    private $cartModel;

    public function __construct() {
        $this->cartModel = new CartModel();


        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

      
        if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }

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

        header("Location: index.php?action=showcart");
        exit;
    }


        public function update($id, $qty) {
        if ($qty < 1) $qty = 1;

        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['id'] == $id) {
                $_SESSION['cart'][$key]['soLuong'] = $qty;
                break;
            }
        }

        header("Location: index.php?action=showcart");
        exit;
    }


    public function index() {

        foreach ($_SESSION['cart'] as $key => $item) {
            $product = $this->cartModel->getAllProductById($item['id']);

            if ($product) {
                $_SESSION['cart'][$key]['name'] = $product['name'];
                $_SESSION['cart'][$key]['price'] = $product['price'];
                $_SESSION['cart'][$key]['img'] = $product['img'];
            } else {
               
                unset($_SESSION['cart'][$key]);
            }
        }

       
        $_SESSION['cart'] = array_values($_SESSION['cart']);

        include_once("./Views/cart.php");
    }
}
?>
