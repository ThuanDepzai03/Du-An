<?php
include_once("views/layouts/header.php");
?>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Chi tiết hoá đơn số <?= $id ?></h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical" action="index.php?action=storedanhmuc" method="post">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-vertical">Tên khách hàng</label>
                                    <input value="<?= $hoaDon['tenkhachhang'] ?>" type="text" id="first-name-vertical" class="form-control">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-vertical">Địa chỉ</label>
                                    <input value="<?= $hoaDon['diachi'] ?>" type="text" id="first-name-vertical" class="form-control">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-vertical">Số điện thoại</label>
                                    <input value="<?= $hoaDon['diachi'] ?>" type="text" id="first-name-vertical" class="form-control">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-vertical">Ngày giờ đặt</label>
                                    <input value="<?= $hoaDon['diachi'] ?>" type="text" id="first-name-vertical" class="form-control">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-vertical">Phương thức thanh toán</label>
                                    <input value="<?= $hoaDon['diachi'] ?>" type="text" id="first-name-vertical" class="form-control">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-vertical">Trạng thái</label>
                                    <input value="<?= $hoaDon['diachi'] ?>" type="text" id="first-name-vertical" class="form-control">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-vertical">Tổng tiền</label>
                                    <input value="<?= $hoaDon['diachi'] ?>" type="text" id="first-name-vertical" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Thêm</button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Làm mới</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include_once("views/layouts/footer.php");
?>