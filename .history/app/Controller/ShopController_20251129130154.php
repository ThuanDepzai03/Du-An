<?php
include_once("Model/ShopModel.php");

class ShopController
{

    public function index()
    {
        $productModel = new HomeModel();

        $newProducts = $productModel->getNewProducts();
        $danhmuc = $productModel->loadAllDanhMuc();

        $productsByDanhMuc = [];

        foreach ($danhmuc as $dm) {
            $productsByDanhMuc[$dm['id']] = $productModel->loadProductsByDanhMuc($dm['id']);
        }

        include_once("Views/home.php");
    }
}
