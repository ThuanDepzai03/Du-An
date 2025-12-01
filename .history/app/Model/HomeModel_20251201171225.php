<?php
include_once("pdo.php");

class HomeModel
{
    public function getNewProducts()
    {
        $sql = "SELECT sp.*, dm.name AS category_name
            FROM sanpham sp
            LEFT JOIN danhmuc dm ON sp.iddm = dm.id
            ORDER BY sp.id DESC LIMIT 8";
        return pdo_query($sql);
    }

    // Đã thêm từ khóa public
    public function loadProductsByDanhMuc($iddm)
    {
        $sql = "SELECT sp.*, dm.name AS category_name
                FROM sanpham sp
                JOIN danhmuc dm ON sp.iddm = dm.id
                WHERE sp.iddm = ?";
        return pdo_query($sql, $iddm);
    }

    // Giữ lại 1 hàm duy nhất, xóa hàm trùng ở dưới đi
    public function loadAllDanhMuc()
    {
        $sql = "SELECT * FROM danhmuc ORDER BY id ASC";
        return pdo_query($sql);
    }
}
