<?php
class ShopController
{
    public function shop()
    {
        include_once("app/Model/SanPham.php");

        $spModel = new SanPham();
        $products = $spModel->getAllSanPham();

        include_once("app/Views/shop.php");
    }
}
