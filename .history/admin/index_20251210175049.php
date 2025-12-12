<?php
// 1. KHỞI TẠO SESSION
session_start();

include_once("Controller/DanhMucController.php");
include_once("Controller/SanPhamController.php");
include_once("Controller/UserController.php");
include_once("Controller/HoaDonController.php");
include_once("Helper/Helper.php");

$danhMuc = new DanhMucController();
$sanPham = new SanPhamController();
$userCtrl = new UserController();
$hoaDon = new HoaDonController();

// 2. MIDDLEWARE CHECK LOGIN
if (!isset($_SESSION['admin_logged'])) {
    $action = isset($_GET['action']) ? $_GET['action'] : '';
    if ($action != 'login' && $action != 'check_login') {
        header("Location: index.php?action=login");
        exit();
    }
}

// 3. ROUTER (ĐIỀU HƯỚNG)
if (isset($_GET['action']) && $_GET['action'] != "") {
    $action = $_GET['action'];
    switch ($action) {
        // --- CÁC CASE KHÁC (LOGIN, USER, DANHMUC, SANPHAM, HOADON) GIỮ NGUYÊN ---
        case "login":
            $userCtrl->login();
            break;
        case "check_login":
            $userCtrl->check_login();
            break;
        case "logout":
            $userCtrl->logout();
            break;

        case "listuser":
            $userCtrl->index();
            break;
        case "createuser":
            $userCtrl->create();
            break;
        case "storeuser":
            $userCtrl->store();
            break;
        case "edituser":
            $userCtrl->edit();
            break;
        case "updateuser":
            $userCtrl->update();
            break;
        case "deleteuser":
            $userCtrl->delete();
            break;

        case "listdanhmuc":
            $danhMuc->index();
            break;
        case "createdanhmuc":
            $danhMuc->create();
            break;
        case "storedanhmuc":
            $danhMuc->store();
            break;
        case "editdanhmuc":
            $danhMuc->edit();
            break;
        case "updatedanhmuc":
            $danhMuc->update();
            break;
        case "deletedanhmuc":
            $danhMuc->delete();
            break;
        case "restoredanhmuc":
            $danhMuc->restore();
            break;

        case "listsanpham":
            $sanPham->index();
            break;
        case "createsanpham":
            $sanPham->create();
            break;
        case "storesanpham":
            $sanPham->store();
            break;
        case "editsanpham":
            $sanPham->edit();
            break;
        case "updatesanpham":
            $sanPham->update();
            break;
        case "deletesanpham":
            $sanPham->delete();
            break;
        case "restoresanpham":
            $sanPham->restore();
            break;

        case "listhoadon":
            $hoaDon->index();
            break;
        case "chitiethoadon":
            $hoaDon->chiTietHoaDon();
            break;
        case "update_status":
            $hoaDon->update_status();
            break;

        // --- DASHBOARD (XỬ LÝ CHÍNH Ở ĐÂY) ---
        case "dashboard":
        default:
            // 1. Khởi tạo Model
            $spModel = new SanPham();
            $hdModel = new HoaDon();
            $userModel = new UserModel();

            // 2. Lấy số liệu đếm
            $countSanPham = $spModel->getCount();
            $countDonHang = $hdModel->getCount();
            $countUser    = $userModel->getCount();

            // 3. Lấy số liệu doanh thu (Card)
            $doanhThuHomNay = $hdModel->getDoanhThuHomNay();
            $doanhThuThang  = $hdModel->getDoanhThu30DayAgo();
            $doanhThuNam    = $hdModel->getDoanhThuNamNay();
            $tongDoanhThu   = $hdModel->getTongDoanhThu();

            // 4. Lấy dữ liệu Biểu đồ 1 Năm (Bar Chart)
            $revenueDataYear = $hdModel->getDuLieuBieuDoYear();
            $chartLabels1Year = [];
            $chartValues1Year = [];
            foreach ($revenueDataYear as $data) {
                $chartLabels1Year[] = "T" . date("m", strtotime($data['thang'] . "-01"));
                $chartValues1Year[] = (int)$data['tong_tien'];
            }
            $jsonLabels1Year = json_encode($chartLabels1Year);
            $jsonValues1Year = json_encode($chartValues1Year);

            // 5. Lấy dữ liệu Biểu đồ 1 Tháng (Line Chart)
            $revenueDataMonth = $hdModel->getDuLieuBieuDo30Day();
            $chartLabels30Days = [];
            $chartValues30Days = [];
            foreach ($revenueDataMonth as $data) {
                $chartLabels30Days[] = date("d/m", strtotime($data['ngay']));
                $chartValues30Days[] = (int)$data['tong_tien'];
            }
            $jsonLabels30Days = json_encode($chartLabels30Days);
            $jsonValues30Days = json_encode($chartValues30Days);

            include "views/dashboard.php";
            break;
    }
} else {
    // CHUYỂN HƯỚNG MẶC ĐỊNH VỀ DASHBOARD
    header("Location: index.php?action=dashboard");
    exit();
}
