<?php
include_once("Model/HomeModel.php");

class HomeController
{

    public function home()
    {
        $productModel = new HomeModel();

        // Lấy danh mục
        $danhmuc = $productModel->loadAllDanhMuc();

        // Lấy id danh mục từ URL
        $iddm = $_GET['iddm'] ?? 'all';

        if ($iddm === 'all') {
            // Nếu là tất cả → lấy sản phẩm mới
            $newProducts = $productModel->getNewProducts();
        } else {
            // Nếu có danh mục → lấy sản phẩm theo danh mục
            $newProducts = $productModel->loadProductsByDanhMuc($iddm);
        }

        include_once("Views/home.php");
    }
}
