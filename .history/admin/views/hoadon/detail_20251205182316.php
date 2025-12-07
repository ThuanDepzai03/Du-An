<?php
include_once("views/layouts/header.php");
?>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Chi tiết hoá đơn số #<?= $id ?></h4>
            <a href="index.php?action=listhoadon" class="btn btn-primary btn-sm" style="float:right;">Quay lại danh sách</a>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical">
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
                                    <label>Trạng thái</label>
                                    <input value="<?= Helper::TRANGTHAITHANHTOAN[$hoaDon['trangthai']] ?>" type="text" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <hr>

                <h5 class="mt-4">Danh sách sản phẩm</h5>
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $tongTienTinhLai = 0;
                            if (isset($allCTHD) && is_array($allCTHD)):
                                foreach ($allCTHD as $sp):
                                    // Tính thành tiền từng món
                                    $thanhTien = $sp['gia'] * $sp['soluong'];
                                    $tongTienTinhLai += $thanhTien;
                            ?>
                                    <tr>
                                        <td>
                                            <img src="../admin/<?= htmlspecialchars($sp['img'] ?? 'default.png') ?>" width="50" style="object-fit: contain;">
                                        </td>
                                        <td><?= $sp['name'] ?? 'Tên SP lỗi' ?></td>
                                        <td><?= $sp['soluong'] ?></td>
                                        <td><?= number_format($sp['gia']) ?> ₫</td>
                                        <td style="font-weight:bold;"><?= number_format($thanhTien) ?> ₫</td>
                                    </tr>
                            <?php endforeach;
                            endif; ?>

                            <tr class="table-primary">
                                <td colspan="4" class="text-end" style="font-weight: bold;">TỔNG CỘNG:</td>
                                <td style="font-weight: bold; color: #d32f2f; font-size: 1.1em;">
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
<?php
include_once("views/layouts/footer.php");
?>