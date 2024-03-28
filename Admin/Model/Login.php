<?php
class Login
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    
    // Phương thức kiểm tra đăng nhập cho admin
    public function isAdminLoginValid($username, $password)
    {
        // Thực hiện logic kiểm tra đăng nhập ở đây
        // Ví dụ đơn giản: Kiểm tra trong CSDL
        $query = "SELECT * FROM users WHERE username = :username AND password = :password AND role = 'admin'";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result !== false;
    }
}
?>
