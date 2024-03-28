<?php
session_start(); // Khởi động session

if(isset($_POST['submit_verification_code'])) {
    $verification_code = $_POST['verification_code']; // Lấy mã xác nhận từ form

    // Kiểm tra xem mã xác nhận có tồn tại trong session email hay không
    if(isset($_SESSION['email']) && !empty($_SESSION['email'])) {
        $emailInfo = $_SESSION['email'][0]; // Lấy thông tin email từ session

        // So sánh mã xác nhận từ form với mã xác nhận đã lưu trong session
        if(isset($emailInfo['id']) && $emailInfo['id'] == $verification_code) {
            // Mã xác nhận hợp lệ, hiển thị cảnh báo và yêu cầu người dùng cập nhật mật khẩu mới
            echo '<script> alert("Mã xác nhận đúng, vui lòng cập nhật mật khẩu mới.");</script>';
            include_once "../View/UpdatePass.php";

            exit();
        } else {
            // Mã xác nhận không hợp lệ, hiển thị thông báo lỗi
            echo '<script> alert("Mã xác nhận không chính xác");</script>';
        }
    } else {
        // Session email không tồn tại hoặc rỗng, hiển thị thông báo lỗi
        echo '<script> alert("Không tìm thấy thông tin email");</script>';
    }
}

// Nếu không có yêu cầu xác thực hoặc xác thực không thành công, hiển thị form nhập mã xác nhận
include_once "./View/ResetPass.php";
?>
