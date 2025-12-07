<?php
include_once("pdo.php");

class HoaDon
{
    public function getAll()
    {
        $sql = "select * from hoadon";
        return pdo_query($sql);
    }
    public function getAllCthdByIdHoaDon($id)
    {
        $sql = "select * from chitiethoadon where id_hoadon = ?";
        return pdo_query($sql, $id);
    }

    public function insert($ten)
    {
        $sql = "insert into danhmuc (name) values (?)";
        pdo_execute($sql, $ten);
    }

    public function getOne($id)
    {
        $sql = "select * from hoadon where id = ?";
        return pdo_query_one($sql, $id);
    }

    public function update($id, $ten)
    {
        $sql = "update hoadon set `name` = ? where id = ?";
        pdo_execute($sql, $ten, $id);
    }


    public function delete($id)
    {
        $sql = "update hoadon set deleted = 1 where id = ?";
        pdo_execute($sql, $id);
    }
    public function restore($id)
    {
        $sql = "update hoadon set deleted = 0 where id = ?";
        pdo_execute($sql, $id);
    }
}
