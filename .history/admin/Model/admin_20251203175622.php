<?php
include_once("pdo.php");

class UserModel
{
    public function checkLogin($user, $pass)
    {
        // Lưu ý: Code này đang check pass thường (chưa mã hóa) để khớp với dữ liệu test của bạn
        $sql = "SELECT * FROM nguoidung WHERE user = ? AND pass = ? AND role = 1";
        // role = 1 là Admin (bạn nhớ set role=1 trong database cho tài khoản admin nhé)

        return pdo_query_one($sql, $user, $pass);
    }
}
