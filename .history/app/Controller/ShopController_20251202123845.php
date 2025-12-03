<?php
include_once("Model/ShopModel.php");

class ShopController
{

    public function Shop()
    {
        $productModel = new ShopModel();

        // 1. HỨNG DỮ LIỆU TỪ URL (GET)
        // Kiểm tra xem người dùng có nhập giá lọc không, nếu không thì mặc định là 0
        $min = isset($_GET['min_price']) ? (int)$_GET['min_price'] : 0;
        $max = isset($_GET['max_price']) ? (int)$_GET['max_price'] : 0;

        // 2. GỌI HÀM LỌC Ở MODEL (Thay vì gọi getNewProducts như cũ)
        // Nếu $min và $max đều bằng 0, hàm này sẽ trả về tất cả sản phẩm
        $newProducts = $productModel->getFilteredProducts($min, $max);

        // 3. Lấy danh mục để hiển thị sidebar bên trái
        $danhmuc = $productModel->loadAllDanhMuc();

        // (Phần này giữ nguyên nếu view cũ của bạn vẫn dùng các tabs danh mục)
        $productsByDanhMuc = [];
        foreach ($danhmuc as $dm) {
            $productsByDanhMuc[$dm['id']] = $productModel->loadProductsByDanhMuc($dm['id']);
        }

        include_once("Views/shop.php");
    }
}
