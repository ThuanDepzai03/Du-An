<?php
include_once ("Model/ProductModel.php");


class ProductController {
    public function detail() {
        $productModel = new ProductModel();
        if (!isset($_GET['id']) || $_GET['id'] <= 0) {
            echo "<h3>Sản phẩm không tồn tại</h3>";
            return;
        }

        $id = $_GET['id'];
        $product = $productModel->getProductById($id);

        if (!$product) {
            echo "<h3>Sản phẩm không tồn tại</h3>";
            return;
        }

        include_once ("Views/detail.php");
    }
}
