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

    // 1. Tính doanh thu HÔM NAY
    public function getDoanhThuHomNay()
    {
        $sql = "SELECT SUM(tongtien) as total FROM hoadon 
                WHERE trangthai = 2 AND DATE(ngaygiodat) = CURDATE()";
        $row = pdo_query_one($sql);
        return $row['total'] ?? 0;
    }

    // 2. Tính doanh thu 
    public function getDoanhThu30DayAgo()
    {
        $sql = "SELECT SUM(tongtien) as total FROM hoadon 
                WHERE trangthai = 2 AND ngaygiodat >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)";
        $row = pdo_query_one($sql);
        return $row['total'] ?? 0;
    }
    public function getTongDoanhThu()
    {
        $sql = "SELECT SUM(tongtien) as total FROM hoadon 
                WHERE trangthai = 2 AND ngaygiodat >= DATE_SUB(CURDATE(), INTERVAL 999 DAY)";
        $row = pdo_query_one($sql);
        return $row['total'] ?? 0;
    }

    public function getDoanhThuNamNay()
    {
        $sql = "SELECT SUM(tongtien) as total FROM hoadon 
            WHERE trangthai = 2 AND YEAR(ngaygiodat) = YEAR(CURDATE())";
        $row = pdo_query_one($sql);
        return $row['total'] ?? 0;
    }
    // Du lieu bieu do
    public function getDuLieuBieuDo30Day()
    {
        $sql = "SELECT DATE(ngaygiodat) as ngay, SUM(tongtien) as tong_tien 
                FROM hoadon 
                WHERE trangthai = 2 
                AND ngaygiodat >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)
                GROUP BY DATE(ngaygiodat)
                ORDER BY ngay ASC";
        return pdo_query($sql);
    }
    public function getDuLieuBieuDoYear()
    {
        $sql = "SELECT DATE_FORMAT(ngaygiodat, '%Y-%m') as thang, SUM(tongtien) as tong_tien 
                FROM hoadon 
                WHERE trangthai = 2 
                AND ngaygiodat >= DATE_SUB(CURDATE(), INTERVAL 12 MONTH)
                GROUP BY DATE_FORMAT(ngaygiodat, '%Y-%m')
                ORDER BY thang ASC";
        return pdo_query($sql);
    }
    public function getThongKeTheoThang()
    {
        $sql = "SELECT 
                DATE_FORMAT(ngaygiodat, '%m/%Y') AS thang,
                SUM(tongtien) AS tong_tien
            FROM hoadon
            WHERE trangthai = 2
            AND ngaygiodat >= DATE_SUB(CURDATE(), INTERVAL 12 MONTH)
            GROUP BY DATE_FORMAT(ngaygiodat, '%Y-%m')
            ORDER BY ngaygiodat ASC";

        return pdo_query($sql);
    }
}
