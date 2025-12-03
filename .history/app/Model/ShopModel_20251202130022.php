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
        $sql .= " AND sp.iddm=" . (int)$iddm;
    }

    $sql .= " ORDER BY sp.id DESC";
    return pdo_query($sql);
    }