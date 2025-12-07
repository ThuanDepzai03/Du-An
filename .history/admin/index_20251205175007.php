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

        default:
            $danhMuc->index();
            break;
    }
} else {
    $danhMuc->index();
}
