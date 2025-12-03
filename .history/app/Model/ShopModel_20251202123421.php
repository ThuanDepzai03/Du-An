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
    // Trong Model lấy sản phẩm
$sql = "SELECT * FROM sanpham WHERE 1=1"; // Kỹ thuật 1=1 để nối chuỗi dễ hơn

if (isset($_GET['min_price']) && $_GET['min_price'] != '') {
    $min = (int)$_GET['min_price'];
    $sql .= " AND price >= $min";
}

if (isset($_GET['max_price']) && $_GET['max_price'] != '') {
    $max = (int)$_GET['max_price'];
    $sql .= " AND price <= $max";
}

// ... Thực thi query
}
