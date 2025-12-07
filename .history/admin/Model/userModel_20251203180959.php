<?php
include_once("pdo.php");

class UserModel
{
    public function checkLogin($user, $pass)
    {
        $sql = "SELECT * FROM nguoidung WHERE user = ? AND pass = ? AND role = 1";
        return pdo_query_one($sql, $user, $pass);
    }

    // --- THÊM HÀM NÀY ---
    public function insertUser($user, $pass, $email, $address, $tel, $role)
    {
        $sql = "INSERT INTO nguoidung(user, pass, email, address, tel, role) VALUES(?, ?, ?, ?, ?, ?)";
        // pdo_execute là hàm thực thi lệnh thêm/sửa/xóa (thường đi kèm bộ thư viện pdo.php)
        pdo_execute($sql, $user, $pass, $email, $address, $tel, $role);
    }
}
