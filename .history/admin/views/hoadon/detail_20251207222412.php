<?php include_once("views/layouts/header.php"); ?>
<link rel="stylesheet" href="views/assets/css/app.css">


<div class="col-12">
    <div class="card" style="color: #151823">
        <div class="card-header">
            <h4 class="card-title">Chi tiết hoá đơn số #<?= $id ?></h4>
            <a href="index.php?action=listhoadon" class="btn btn-primary btn-sm" style="float:right;">Quay lại danh sách</a>
        </div>
        <div class="card-content">
            <div class="card-body">

                <div class="form-body">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>Tên khách hàng</label>
                                <input value="<?= $hoaDon['tenkhachhang'] ?>" type="text" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input value="<?= $hoaDon['sdt'] ?>" type="text" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Địa chỉ giao hàng</label>
                                <input value="<?= $hoaDon['diachi'] ?>" type="text" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label>Ngày đặt</label>
                                <input value="<?= $hoaDon['ngaygiodat'] ?>" type="text" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label>Thanh toán</label>
                                <input value="<?= $hoaDon['pttt'] == 0 ? "Tiền mặt (COD)" : "Chuyển khoản" ?>" type="text" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label style="font-weight: bold; color: #007bff;">Cập nhật Trạng thái</label>
                                <form action="index.php?action=update_status" method="POST" class="d-flex gap-2">
                                    <input type="hidden" name="id" value="<?= $hoaDon['id'] ?>">
                                    <select name="trangthai" id="select_trangthai" class="form-select">
                                        <option value="0" <?= $hoaDon['trangthai'] == 0 ? 'selected' : '' ?>>Đơn hàng mới</option>
                                        <option value="1" <?= $hoaDon['trangthai'] == 1 ? 'selected' : '' ?>>Đang xử lý</option>
                                        <option value="2" <?= $hoaDon['trangthai'] == 2 ? 'selected' : '' ?>>Đang giao hàng</option>
                                        <option value="3" <?= $hoaDon['trangthai'] == 3 ? 'selected' : '' ?>>Đã giao hàng</option>
                                        <option value="4" <?= $hoaDon['trangthai'] == 4 ? 'selected' : '' ?>>Đã hủy</option>
                                    </select>
                                    <button type="submit" class="btn btn-warning btn-sm">Lưu</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

                <h5 class="mt-4">Sản phẩm đã mua</h5>
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($allCTHD) && is_array($allCTHD)):
                                foreach ($allCTHD as $sp):
                                    $thanhTien = $sp['gia'] * $sp['soluong'];
                            ?>
                                    <tr>
                                        <td>
                                            <img src="../admin/<?= htmlspecialchars($sp['img'] ?? '') ?>" width="50" style="object-fit: contain;">
                                        </td>
                                        <td><?= $sp['name'] ?></td>
                                        <td><?= $sp['soluong'] ?></td>
                                        <td><?= number_format($sp['gia']) ?> ₫</td>
                                        <td style="font-weight:bold; color: #d32f2f;"><?= number_format($thanhTien) ?> ₫</td>
                                    </tr>
                            <?php endforeach;
                            endif; ?>

                            <tr style="background-color: #f8f9fa;">
                                <td colspan="4" class="text-end" style="font-weight: bold;">TỔNG THANH TOÁN:</td>
                                <td style="font-weight: bold; color: #d32f2f; font-size: 1.2em;">
                                    <?= number_format($hoaDon['tongtien']) ?> VND
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once("views/layouts/footer.php"); ?>

<script>
    var trangThaiHienTai = <?= $hoaDon['trangthai'] ?>;
    var menu = document.getElementById('select_trangthai');
    for (var i = 0; i < menu.options.length; i++) {
        if (parseInt(menu.options[i].value) < trangThaiHienTai) {
            menu.options[i].disabled = true; // Không cho chọn lại trạng thái cũ
            menu.options[i].style.color = "#ccc";
        }
    }
</script>