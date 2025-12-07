<?php
include_once("pdo.php");

class HoaDon
{
    public function getAll()
    {
        $sql = "select * from hoadon";
        return pdo_query($sql);
    }
    public function getAllCthdByIdHoaDon($id_hoadon)
    {
        $sql = "SELECT ct.*, sp.name, sp.img 
            FROM chitiethoadon ct 
            JOIN sanpham sp ON ct.id_sanpham = sp.id 
            WHERE ct.id_hoadon = ?";
        return pdo_query($sql, $id_hoadon);
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
    public function updateStatus($id, $trangthai)
    {
        $sql = "UPDATE hoadon SET trangthai = ? WHERE id = ?";
        pdo_execute($sql, $trangthai, $id);
    }
    // Đếm tổng số đơn hàng
    public function getCount()
    {
        $sql = "SELECT count(*) as total FROM hoadon";
        $row = pdo_query_one($sql);
        return $row['total'];
    }

    // Tính tổng doanh thu (Chỉ tính đơn đã hoàn thành/giao hàng thành công - trạng thái = 3)
    public function getRevenue()
    {
        $sql = "SELECT SUM(tongtien) as total FROM hoadon WHERE trangthai = 3";
        $row = pdo_query_one($sql);
        return $row['total'] ?? 0; // Nếu chưa có đơn nào thì trả về 0
    }
}
