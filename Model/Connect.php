<?php
function Connect() {
    // Thông tin kết nối CSDL
    $servername = "localhost"; // Tên máy chủ MySQL (hoặc địa chỉ IP)
    $username = "root"; // Tên người dùng MySQL
    $password = ""; // Mật khẩu MySQL
    $dbname = "doancuoiky"; // Tên CSDL bạn đã tạo

    try {
        // Tạo kết nối đến CSDL với PDO
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);

        // Thiết lập PDO để báo cáo lỗi
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    } catch (PDOException $e) {
        die("Kết nối đến CSDL thất bại: " . $e->getMessage());
    }
}

// Sử dụng hàm để kết nối CSDL
$conn = Connect();

?>
