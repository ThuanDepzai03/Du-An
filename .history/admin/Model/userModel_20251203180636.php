<?php
include_once("pdo.php");

class UserModel
{
    public function checkLogin($user, $pass)
    {
        // Kiểm tra user, pass và role = 1 (Admin)
        // Lưu ý: role trong database của bạn là 'tinyint', giá trị 1 là admin (theo hướng dẫn trước)
        $sql = "SELECT * FROM nguoidung WHERE user = ? AND pass = ? AND role = 1";
        return pdo_query_one($sql, $user, $pass);
    }
}
