<?php
include_once("Model/UserModel.php");

class UserController
{
    public function login()
    {
        // Hiển thị form đăng nhập
        include "Views/login.php";
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
}
