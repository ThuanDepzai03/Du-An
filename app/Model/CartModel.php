<?php
include_once("pdo.php"); 

class CartModel {

    // Lấy sản phẩm theo ID
    public function getAllProductById($id) {
        $sql = "SELECT * FROM sanpham WHERE deleted = 0 AND id = ?";
        return pdo_query_one($sql, $id);
    }

    // Insert hóa đơn, trả về ID của hóa đơn vừa tạo
    public function insertHoaDon($ten, $diaChi, $sdt, $tongTien, $pttt) {
        $sql = "INSERT INTO hoadon (tenkhachhang, diachi, sdt, tongtien, pttt) VALUES (?,?,?,?,?)";
        return pdo_execute_return_id($sql, $ten, $diaChi, $sdt, $tongTien, $pttt);
    }

    // Insert chi tiết hóa đơn
    public function insertCTHoaDon($hoaDonID, $sanPhamID, $soLuong, $gia) {
        $sql = "INSERT INTO chitiethoadon (id_hoadon, id_sanpham, soluong, gia) VALUES (?,?,?,?)";
        return pdo_execute($sql, $hoaDonID, $sanPhamID, $soLuong, $gia);
    }
}
?>
