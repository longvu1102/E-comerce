<?php
ob_start(); // Bắt đầu bộ đệm đầu ra

// Bao gồm các tệp và khởi tạo các biến cần thiết
include_once("Model/Connect.php");
include_once("Model/UserModel.php");
include_once("Model/Login.php");

// Kiểm tra xác thực đăng nhập
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login_admin'])) {
    $loginModel = new Login($conn);
    $userModel = new UserModel($conn);

    $username = $_POST['username_admin'];
    $password = $_POST['password_admin'];

    // Lấy thông tin người dùng từ database
    $userData = $userModel->getUserByUsername($username);

    if ($userData && password_verify($password, $userData['password'])) {
        $_SESSION['username'] = $username;

        // Hiển thị thông báo đăng nhập thành công
        echo '<script>alert("Đăng nhập thành công! Vui lòng đổi mật khẩu để tăng tính bảo mật.");</script>';

        // URL chuyển hướng
        $redirect_url = "http://localhost:3000/Admin/?controller=UpdatePass&action=UpdatePass";

        // Chuyển hướng đến trang cập nhật mật khẩu
        header('Location: ' . $redirect_url);
        exit();
    } else {
        echo '<script>alert("Tên đăng nhập hoặc mật khẩu không chính xác.");</script>';
    }
}

// Hiển thị nội dung HTML
include_once("View/DangNhap.php");
?>
