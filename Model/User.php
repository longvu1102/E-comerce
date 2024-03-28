<?php

class User
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getUserByUsername($username)
    {
        $stmt = $this->conn->prepare("SELECT * FROM khachhang1 WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUser($username, $newEmail, $newAddress, $newPhoneNumber, $newPassword)
    {
        $stmt = $this->conn->prepare("UPDATE khachhang1 SET email = :email, diachi = :diachi, sodienthoai = :sodienthoai, matkhau = :matkhau WHERE username = :username");
        $stmt->bindParam(':email', $newEmail);
        $stmt->bindParam(':diachi', $newAddress);
        $stmt->bindParam(':sodienthoai', $newPhoneNumber);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':matkhau', $newPassword);
        return $stmt->execute();
    }
    public function checkEmail($email)
    {
        $stmt = $this->conn->prepare("SELECT * FROM khachhang1 WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt; // Trả về đối tượng kết quả của truy vấn, không phải một mảng
    }
    public function updatePasswordByEmail($email, $newPassword)
    {
        $stmt = $this->conn->prepare("UPDATE khachhang1 SET matkhau = :matkhau WHERE email = :email");
        $stmt->bindParam(':matkhau', $newPassword);
        $stmt->bindParam(':email', $email);
        return $stmt->execute();
    }
}
