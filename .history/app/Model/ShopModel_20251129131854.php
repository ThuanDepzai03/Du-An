<?php
include_once("pdo.php");

class ShopModel
{

    public function getNewProducts()
    {
        $sql = "SELECT sp.*, dm.name AS category_name
            FROM sanpham sp
            LEFT JOIN danhmuc dm ON sp.iddm = dm.id
            ORDER BY sp.id ";
        return pdo_query($sql);
    }
    public function loadProductsByDanhMuc($id_dm)
    {
        $sql = "SELECT * FROM sanpham WHERE iddm = ?";
        return pdo_query($sql, $id_dm); // ✔ KHÔNG dùng [$id_dm]
    }


    public function loadAllDanhMuc()
    {
        $sql = "SELECT * FROM danhmuc ORDER BY id ASC";
        return pdo_query($sql);
    }
}
