<?php
// Trong UserModel.php

class UserModel
{
    public function displayUsers() {
        global $conn;
    
        // Thực hiện truy vấn để lấy tất cả thông tin người dùng trừ mật khẩu
        $query = "SELECT makh, tenkh, username, email, diachi, sodienthoai, vaitro FROM khachhang1";
        $stmt = $conn->prepare($query);
        $stmt->execute();
    
        // Lấy tất cả dữ liệu và trả về dạng mảng kết hợp
        $usersData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $usersData;
    }
    
    public function deleteUser($makh) {
        global $conn;
    
        // Thực hiện truy vấn để xóa người dùng theo mã khách hàng
        $query = "DELETE FROM khachhang1 WHERE makh = :makh";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':makh', $makh);
        $stmt->execute();
    
        // Trả về số dòng đã bị xóa
        return $stmt->rowCount();
    }
   
    public function updatePassword($username, $newPassword)
    {
        global $conn;

        // Thực hiện truy vấn cập nhật mật khẩu mới
        $query = "UPDATE users SET password = :newPassword WHERE username = :username";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':newPassword', $newPassword);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
    }
    public function isPasswordCorrect($username, $oldPassword)
    {
        global $conn;

        // Thực hiện truy vấn kiểm tra tính đúng đắn của mật khẩu cũ
        $query = "SELECT * FROM users WHERE username = :username AND password = :password";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $oldPassword);
        $stmt->execute();

        // Đếm số dòng kết quả
        $count = $stmt->rowCount();

        // Nếu số dòng kết quả là 1, tức là mật khẩu cũ đúng
        if ($count == 1) {
            return true;
        } else {
            return false;
        }
    }
    public function getUserByUsername($username)
    {
        global $conn;

        // Thực hiện truy vấn để lấy thông tin người dùng dựa trên tên đăng nhập
        $query = "SELECT * FROM users WHERE username = :username";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        // Lấy dòng dữ liệu từ kết quả truy vấn
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

        return $userData;
    }
}
