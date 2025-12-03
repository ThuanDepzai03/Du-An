<?php
include_once("pdo.php");

class ShopModel
{
    // Lấy sản phẩm mới (Mặc định)
    public function getNewProducts()
    {
        $sql = "SELECT sp.*, dm.name AS category_name 
                FROM sanpham sp 
                LEFT JOIN danhmuc dm ON sp.iddm = dm.id 
                ORDER BY sp.id DESC"; // Thêm DESC để lấy sp mới nhất lên đầu
        return pdo_query($sql);
    }

    // Lấy sản phẩm theo danh mục
    public function loadProductsByDanhMuc($id_dm)
    {
        $sql = "SELECT * FROM sanpham WHERE iddm = ?";
        return pdo_query($sql, $id_dm);
    }

    // Lấy tất cả danh mục
    public function loadAllDanhMuc()
    {
        $sql = "SELECT * FROM danhmuc ORDER BY id ASC";
        return pdo_query($sql);
    }

    /**
     * HÀM MỚI: Lấy sản phẩm có hỗ trợ lọc giá
     * @param int $min Giá thấp nhất
     * @param int $max Giá cao nhất (0 nghĩa là không giới hạn)
     */
    public function getFilteredProducts($min = 0, $max = 0)
    {
        // Thêm tham số $iddm vào hàm (mặc định là 0)
public function getFilteredProducts($min = 0, $max = 0, $iddm = 0)
{
    $sql = "SELECT sp.*, dm.name AS category_name 
            FROM sanpham sp 
            LEFT JOIN danhmuc dm ON sp.iddm = dm.id 
            WHERE 1=1"; 

    // 1. Lọc theo giá
    if ($min > 0) $sql .= " AND sp.price >= " . (int)$min;
    if ($max > 0) $sql .= " AND sp.price <= " . (int)$max;

    // 2. Lọc theo danh mục (Code mới thêm)
    if ($iddm > 0) {
        $sql .= " AND sp.iddm = " . (int)$iddm;
    }

    $sql .= " ORDER BY sp.id DESC";
    return pdo_query($sql);
}
    }
}
