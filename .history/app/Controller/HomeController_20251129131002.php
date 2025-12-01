<?php
include_once("Model/HomeModel.php");

class HomeController
{

    public function home()
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
