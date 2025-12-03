<?php 
include_once("./Views/layout/header.php");

// Tính tổng tiền
$tongTien = 0;
foreach ($_SESSION['cart'] as $item) {
    $tongTien += $item['price'] * $item['soLuong'];
}
?>

<div class="container my-5">
    <h1 class="mb-4 text-center">🛒 Giỏ Hàng Của Bạn</h1>

    <div class="card shadow-sm">
        <div class="card-header bg-light">
            <h5 class="mb-0">Các Sản Phẩm Trong Giỏ</h5>
        </div>
        <div class="card-body p-0">
            <table class="table align-middle table-borderless m-0">
                <thead class="bg-light">
                    <tr>
                        <th scope="col" class="col-6">Sản Phẩm</th>
                        <th scope="col" class="text-center col-2">Đơn Giá</th>
                        <th scope="col" class="text-center col-2">Số Lượng</th>
                        <th scope="col" class="text-end col-2">Thành Tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($_SESSION['cart'] as $item): ?>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="/admin/<?= htmlspecialchars($item['img']) ?>" class="rounded me-3" style="width: 80px; height: 80px; object-fit: cover;" alt="<?= htmlspecialchars($item['name']) ?>">
                                <div>
                                    <h6 class="mb-0"><?= htmlspecialchars($item['name']) ?></h6>
                                </div>
                            </div>
                        </td>
                        <td class="text-center fw-bold text-success"><?= number_format($item['price']) ?>₫</td>
                        <td class="text-center"><?= $item['soLuong'] ?></td>
                        <td class="text-end fw-bold text-danger"><?= number_format($item['price'] * $item['soLuong']) ?>₫</td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-end fw-bold">Tổng tiền:</td>
                        <td class="text-end fw-bold text-danger"><?= number_format($tongTien) ?>₫</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <div class="mt-4 text-end">
        <a href="index.php?action=showcheckout" class="btn btn-primary btn-lg">Thanh toán</a>
    </div>
</div>

<?php 
include_once("./Views/layout/footer.php"); 
?>
