<?php
session_start(); // Khởi động session

// Kiểm tra nếu người dùng đã gửi form cập nhật mật khẩu mới
if(isset($_POST['submit_new_password'])) {
    // Đảm bảo session 'email' tồn tại và không rỗng
    if(isset($_SESSION['email']) && !empty($_SESSION['email'])) {
        // Lấy thông tin email từ session
        $email = $_SESSION['email'][0]['email'];

        // Lấy mật khẩu mới từ form
        $newPassword = $_POST['new_password'];

        // Mã hóa mật khẩu mới
        $hashed_password = password_hash($newPassword, PASSWORD_BCRYPT);

        // Kết nối đến cơ sở dữ liệu
        $conn = new PDO("mysql:host=localhost;dbname=doancuoiky;charset=utf8mb4", "root", "");

        // Cập nhật mật khẩu mới đã mã hóa vào cơ sở dữ liệu
        $stmt = $conn->prepare("UPDATE khachhang1 SET matkhau = :matkhau WHERE email = :email");
        $stmt->bindParam(':matkhau', $hashed_password);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Sau khi cập nhật mật khẩu, chuyển hướng đến trang đăng nhập
        header("Location: http://localhost:3000/?controller=Login&action=Login");
        exit();
    } else {
        // Session 'email' không tồn tại hoặc rỗng
        echo '<script> alert("Không tìm thấy thông tin email");</script>';
    }
}
?>
