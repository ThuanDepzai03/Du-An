<?php
// 1. KHỞI TẠO SESSION NGAY ĐẦU TIÊN
session_start();

include_once("Controller/DanhMucController.php");
include_once("Controller/SanPhamController.php");
include_once("Controller/UserController.php"); // Include thêm UserController

$danhMuc = new DanhMucController();
$sanPham = new SanPhamController();
$userCtrl = new UserController(); // Khởi tạo User Controller

// 2. LOGIC CHẶN CỬA (MIDDLEWARE)
// Nếu chưa có session 'admin_logged' VÀ hành động không phải là login/check_login
if (!isset($_SESSION['admin_logged'])) {
    // Kiểm tra xem người dùng có đang cố vào trang login không
    $action = isset($_GET['action']) ? $_GET['action'] : '';

    if ($action != 'login' && $action != 'check_login') {
        // Nếu không phải đang login thì bắt buộc chuyển hướng về trang login
        header("Location: index.php?action=login");
        exit();
    }
}

// 3. XỬ LÝ ĐIỀU HƯỚNG
if (isset($_GET['action']) && $_GET['action'] != "") {
    $action = $_GET['action'];
    switch ($action) {

        // --- CÁC CASE ĐĂNG NHẬP / ĐĂNG XUẤT ---
        case "login":
            $userCtrl->login();
            break;
        case "check_login":
            $userCtrl->check_login();
            break;
        case "logout":
            $userCtrl->logout();
            break;

        // --- CÁC CASE DANH MỤC ---
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

        // --- CÁC CASE SẢN PHẨM ---
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

        default:
            // Mặc định vào danh mục (nếu đã login)
            $danhMuc->index();
            break;
    }
} else {
    // Nếu vào trang index.php trống trơn -> Mặc định vào danh sách danh mục
    $danhMuc->index();
}
