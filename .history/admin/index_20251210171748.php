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

        // --- NHÓM 1: ĐĂNG NHẬP / ĐĂNG XUẤT (Bị thiếu đoạn này) ---
        case "login":
            $userCtrl->login();
            break;
        case "check_login":
            $userCtrl->check_login();
            break;
        case "logout":
            $userCtrl->logout();
            break;

        // --- NHÓM 2: QUẢN LÝ TÀI KHOẢN (User) ---
        case "listuser":     // Xem danh sách
            $userCtrl->index();
            break;
        case "createuser":   // Hiện form thêm (Bị thiếu)
            $userCtrl->create();
            break;
        case "storeuser":    // Lưu người dùng mới (Bị thiếu)
            $userCtrl->store();
            break;
        case "edituser":     // Hiện form sửa
            $userCtrl->edit();
            break;
        case "updateuser":   // Lưu cập nhật
            $userCtrl->update();
            break;
        case "deleteuser":   // Xóa
            $userCtrl->delete();
            break;

        // --- NHÓM 3: DANH MỤC ---
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

        // --- NHÓM 4: SẢN PHẨM ---
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
        case "dashboard":
        default: // Gộp chung xử lý cho cả case dashboard và default
            // 1. Khởi tạo Model
            $spModel = new SanPham();
            $hdModel = new HoaDon();
            $userModel = new UserModel();

            // 2. Lấy số liệu đếm (Count)
            $countSanPham = $spModel->getCount();
            $countDonHang = $hdModel->getCount();
            $countUser    = $userModel->getCount();

            // 3. Lấy số liệu doanh thu (Revenue)
            $doanhThuHomNay = $hdModel->getDoanhThuHomNay();      // Doanh thu hôm nay
            $doanhThuThang  = $hdModel->getDoanhThu30DayAgo();    // Doanh thu 30 ngày
            $doanhThuNam    = $hdModel->getDoanhThuNamNay();      // Doanh thu năm nay
            $tongDoanhThu   = $hdModel->getTongDoanhThu();        // Tổng doanh thu toàn thời gian

            // 4. Lấy dữ liệu Biểu đồ 1 Năm (Chart Year)
            $revenueDataYear = $hdModel->getDuLieuBieuDoYear();
            $chartLabels1Year = [];
            $chartValues1Year = [];
            foreach ($revenueDataYear as $data) {
                // Format: Tháng 12/2025
                $chartLabels1Year[] = "T" . date("m", strtotime($data['thang'] . "-01"));
                $chartValues1Year[] = (int)$data['tong_tien'];
            }
            $jsonLabels1Year = json_encode($chartLabels1Year);
            $jsonValues1Year = json_encode($chartValues1Year);

            // 5. Lấy dữ liệu Biểu đồ 1 Tháng (Chart Month)
            $revenueDataMonth = $hdModel->getDuLieuBieuDo30Day();
            $chartLabels30Days = [];
            $chartValues30Days = [];
            foreach ($revenueDataMonth as $data) {
                $chartLabels30Days[] = date("d/m", strtotime($data['ngay']));
                $chartValues30Days[] = (int)$data['tong_tien'];
            }
            $jsonLabels30Days = json_encode($chartLabels30Days);
            $jsonValues30Days = json_encode($chartValues30Days);

            // 6. Hiển thị View
            include "views/dashboard.php";
            break;
    }
} else {
    // 1. Initialize Models
    $spModel = new SanPham();
    $hdModel = new HoaDon();
    $userModel = new UserModel();

    // 2. Get Count Data
    $countSanPham = $spModel->getCount();
    $countDonHang = $hdModel->getCount();
    $countUser    = $userModel->getCount();

    // 3. Get Revenue Data (This fixes the "Undefined variable" error)
    $doanhThuHomNay = $hdModel->getDoanhThuHomNay();
    $doanhThuThang  = $hdModel->getDoanhThu30DayAgo();
    $doanhThuNam = $hdModel->getDoanhThuNamNay();
    $tongDoanhThu = $hdModel->getTongDoanhThu();

    // 4. Get Chart Data (Required for the chart to work)
    $revenueData30 = $hdModel->getDuLieuBieuDo30Day();
    $revenueData = $hdModel->getDuLieuBieuDoYear();
    $chartLabels = [];
    $chartValues = [];

    foreach ($revenueData as $data) {
        $chartLabels[] = date("d/m", strtotime($data['ngay']));
        $chartValues[] = (int)$data['tong_tien'];
    }

    $jsonLabels = json_encode($chartLabels);
    $jsonValues = json_encode($chartValues);

    include "views/dashboard.php";
}
