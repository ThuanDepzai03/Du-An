<?php
include_once("Model/ShopModel.php");

class ShopController
{

    public function Shop()
    {
        $productModel = new ShopModel();

        // 1. Lấy dữ liệu từ URL
        $min = isset($_GET['min_price']) ? (int)$_GET['min_price'] : 0;
        $max = isset($_GET['max_price']) ? (int)$_GET['max_price'] : 0;

        // Hứng thêm IDDM
        $iddm = isset($_GET['iddm']) ? (int)$_GET['iddm'] : 0;

        // 2. Gọi hàm lọc (Truyền thêm $iddm vào)
        $newProducts = $productModel->getFilteredProducts($min, $max, $iddm);

        // 3. Lấy danh mục để hiển thị cột bên trái
        $danhmuc = $productModel->loadAllDanhMuc();

        include_once("Views/shop.php");
    }
}
