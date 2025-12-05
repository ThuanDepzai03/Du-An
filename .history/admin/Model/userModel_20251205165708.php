<?php
include_once("pdo.php");

class UserModel
{
    // ... (Giữ nguyên các hàm checkLogin, insertUser cũ) ...

    // 1. Lấy danh sách tất cả tài khoản
    public function getAllUsers()
    {
        $sql = "SELECT * FROM nguoidung ORDER BY id DESC";
        return pdo_query($sql);
    }

    // 2. Lấy thông tin 1 tài khoản theo ID (để đổ dữ liệu vào form sửa)
    public function getUserById($id)
    {
        $sql = "SELECT * FROM nguoidung WHERE id = ?";
        return pdo_query_one($sql, $id);
    }

    // 3. Cập nhật tài khoản
    public function updateUser($id, $user, $pass, $email, $address, $tel, $role)
    {
        $sql = "UPDATE nguoidung SET user=?, pass=?, email=?, address=?, tel=?, role=? WHERE id=?";
        pdo_execute($sql, $user, $pass, $email, $address, $tel, $role, $id);
    }

    // 4. Xóa tài khoản (Thêm luôn cho đủ bộ)
    public function deleteUser($id)
    {
        $sql = "DELETE FROM nguoidung WHERE id=?";
        pdo_execute($sql, $id);
    }
}
