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
                        <?php foreach ($allHoaDon as $item) { ?>
                            <tr>
                                <td><?= $item['id'] ?></td>
                                <td><?= $item['tenkhachhang'] ?></td>
                                <td><?= $item['sdt'] ?></td>
                                <td><?= $item['ngaygiodat'] ?></td>
                                <td><?= number_format($item['tongtien']) ?>VND</td>
                                <td><?= Helper::TRANGTHAITHANHTOAN[$item['trangthai']] ?></td>
                                <td>
                                    <a href="index.php?action=chitiethoadon&id=<?= $item['id'] ?>"
                                        class="btn btn-secondary">Chi tiết hóa đơn</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
    <style>
        /* ===== NỀN TỔNG ===== */
        body {
            background: #0f1117 !important;
            color: #ffffff;
        }

        /* ===== SIDEBAR ===== */
        #sidebar,
        .sidebar-wrapper {
            background: #151823 !important;
        }

        .sidebar-menu .menu .sidebar-item a {
            color: #ffffff !important;
        }

        .sidebar-menu .menu .sidebar-item.active a {
            background: linear-gradient(90deg, #ff2e63, #ff4d7a) !important;
            color: #fff !important;
        }

        /* ===== LOGO ===== */
        .sidebar-header {
            background: #151823 !important;
        }

        /* ===== MAIN CONTENT ===== */
        #main {
            background: #0f1117 !important;
        }

        /* ===== CARD / BẢNG ===== */
        .card,
        .dataTable-container,
        .table {
            background: #1c1f2b !important;
            color: #ffffff !important;
            border-radius: 12px;
        }

        /* ===== TIÊU ĐỀ ===== */
        h1,
        h2,
        h3,
        h4,
        h5 {
            color: #ffffff !important;
        }

        /* ===== NÚT ===== */
        .btn-primary {
            background: linear-gradient(90deg, #ff2e63, #ff4d7a) !important;
            border: none !important;
        }

        .btn-primary:hover {
            background: #ff4d7a !important;
        }

        /* ===== NÚT SỬA / XOÁ ===== */
        .btn-warning {
            background: #f0ad4e !important;
            border: none;
        }

        .btn-danger {
            background: #ff2e63 !important;
            border: none;
        }

        /* ===== FOOTER ===== */
        footer {
            background: #151823 !important;
            color: #b5b5b5 !important;
        }
    </style>
</div>
<?php
include_once("views/layouts/footer.php");

?>