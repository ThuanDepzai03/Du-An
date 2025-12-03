<?php
include_once("Model/ShopModel.php");

class ShopController
{

    public function Shop()
    {
        $productModel = new ShopModel();

        // Lấy các tham số lọc cũ
        $min = isset($_GET['min_price']) ? (int)$_GET['min_price'] : 0;
        $max = isset($_GET['max_price']) ? (int)$_GET['max_price'] : 0;
        $iddm = isset($_GET['iddm']) ? (int)$_GET['iddm'] : 0;

        // LẤY THAM SỐ SẮP XẾP (Code mới thêm)
        $sort = isset($_GET['sort']) ? (int)$_GET['sort'] : 0;

        // Truyền $sort vào hàm
        $newProducts = $productModel->getFilteredProducts($min, $max, $iddm, $sort);

        $danhmuc = $productModel->loadAllDanhMuc();
        include_once("Views/shop.php");
    }
}
