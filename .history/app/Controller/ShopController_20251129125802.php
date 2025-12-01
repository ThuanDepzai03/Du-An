<?php
include_once("app/Model/pdo.php");

class SanPham
{

    public function getAllSanPham()
    {
        $db = new Connect();
        $sql = "SELECT * FROM sanpham";   // tên bảng của bạn
        return $db->getList($sql);
    }
}
