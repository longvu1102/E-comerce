<?php
ob_start(); // Bắt đầu bộ đệm đầu ra

// Xử lý khi form được submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['update_password'])) {
        // Bao gồm tệp Connect.php và UserModel.php
        include_once("Model/Connect.php");
        include_once("Model/UserModel.php");

        // Khởi tạo đối tượng UserModel
        $userModel = new UserModel($conn);

        // Lấy username từ session
        $username = $_SESSION['username'];

        // Lấy mật khẩu cũ và mật khẩu mới từ form
        $oldPassword = $_POST['oldPassword'];
        $newPassword = $_POST['newPassword'];

        // Lấy thông tin người dùng từ cơ sở dữ liệu
        $userData = $userModel->getUserByUsername($username);

        // Kiểm tra tính đúng đắn của mật khẩu cũ bằng hàm password_verify
        if (password_verify($oldPassword, $userData['password'])) {
            // Nếu mật khẩu cũ đúng, thực hiện mã hóa mật khẩu mới
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            // Thực hiện cập nhật mật khẩu mới đã mã hóa vào cơ sở dữ liệu
            $userModel->updatePassword($username, $hashedPassword);
            echo '<script>alert("Mật khẩu đã được cập nhật thành công.");</script>';
            header("Location: ?controller=Dashboard&action=Dashboard"); // Chuyển hướng về trang Dashboard
            exit();
        } else {
            echo '<script>alert("Mật khẩu cũ không đúng.");</script>';
        }
    }
}
?>
<?php include_once("View/UpdatePass.php"); ?>