<?php
include_once("Model/UserModel.php");

class UserController
{
    public function login()
    {
        // Hiển thị form đăng nhập
        include "Views/login.php";
    }
    public function create()
    {
        include "views/user/add.php";
    }
    public function check_login()
    {
        if (isset($_POST['btn_login'])) {
            $user = $_POST['user'];
            $pass = $_POST['pass'];

            $userModel = new UserModel();
            $result = $userModel->checkLogin($user, $pass);

            if ($result) {
                // Đăng nhập thành công -> Lưu session
                $_SESSION['admin_logged'] = true;
                $_SESSION['admin_name'] = $result['hovaten']; // Hoặc $result['user']

                // Chuyển hướng vào trang quản trị chính
                header("Location: index.php");
            } else {
                // Đăng nhập thất bại
                $error = "Sai tài khoản, mật khẩu hoặc không có quyền Admin!";
                include "Views/login.php";
            }
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header("Location: index.php?action=login");
    }
    public function store()
    {
        if (isset($_POST['btn_add'])) {
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $tel = $_POST['tel'];
            $role = $_POST['role']; // 1 là Admin, 0 là User

            $userModel = new UserModel();
            $userModel->insertUser($user, $pass, $email, $address, $tel, $role);

            // Thêm xong thì quay về danh sách hoặc thông báo
            echo "<script>alert('Thêm tài khoản thành công!'); window.location.href='index.php';</script>";
        }
    }
}
