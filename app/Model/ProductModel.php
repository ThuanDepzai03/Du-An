<?php
include_once("pdo.php");

class ProductModel {

    public function getProductById($id) {
        $sql = "SELECT sp.*, dm.name AS category_name
                FROM sanpham sp
                LEFT JOIN danhmuc dm ON sp.iddm = dm.id
                WHERE sp.id = ?";
        return pdo_query_one($sql, $id);
    }

    // Nếu muốn, có thể thêm hàm lấy sản phẩm liên quan, tìm kiếm, v.v.
}
