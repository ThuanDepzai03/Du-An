<?php
include_once("Model/UserModel.php");

class UserController
{
    // ... (Giữ nguyên các hàm login, logout, create, store cũ) ...

    // 1. Hiển thị danh sách (Trang Quản lý tài khoản)
    public function index()
    {
        $userModel = new UserModel();
        $listUser = $userModel->getAllUsers();
        include "views/user/list.php"; // Tạo file này ở Bước 3
    }

    // 2. Hiển thị form sửa
    public function edit()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $userModel = new UserModel();
            $user = $userModel->getUserById($id); // Lấy thông tin cũ
            include "views/user/edit.php"; // Tạo file này ở Bước 4
        }
    }

    // 3. Thực hiện cập nhật vào Database
    public function update()
    {
        if (isset($_POST['btn_update'])) {
            $id = $_POST['id'];
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $tel = $_POST['tel'];
            $role = $_POST['role'];

            $userModel = new UserModel();
            $userModel->updateUser($id, $user, $pass, $email, $address, $tel, $role);

            // Cập nhật xong quay về danh sách
            echo "<script>alert('Cập nhật thành công!'); window.location.href='index.php?action=listuser';</script>";
        }
    }

    // 4. Xóa user
    public function delete()
    {
        if (isset($_GET['id'])) {
            $userModel = new UserModel();
            $userModel->deleteUser($_GET['id']);
            echo "<script>alert('Đã xóa thành công!'); window.location.href='index.php?action=listuser';</script>";
        }
    }
}
