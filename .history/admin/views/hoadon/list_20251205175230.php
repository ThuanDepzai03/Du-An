<?php
include_once("views/layouts/header.php");
?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Quản lý hóa đơn</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Hóa Đơn</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">

                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tên Khách Hàng</th>
                            <th>Số điện thoại</th>
                            <th>Ngày giờ đặt</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allHoaDon as $item) { ?>]
                        <tr>
                            <td><?= $item['id'] ?></td>
                            <td><?= $item['tenkhachhang'] ?></td>
                            <td><?= $item['sdt'] ?></td>
                            <td><?= $item['ngaygiodat'] ?></td>
                            <td><?= number_format($item['tongtien']) ?></td>
                            <td><?= Helper::TRANGTHAITHANHTOAN[$item['trangthai']] ?></td>
                            <td>
                                <a href="index.php?action=editdanhmuc&id=<?= $item['id'] ?>"
                                    class="btn btn-secondary">Chi tiết hóa đơn</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
<?php
include_once("views/layouts/footer.php");
?>