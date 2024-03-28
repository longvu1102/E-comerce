<?php
include_once("Model/Connect.php");
ob_start();


// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    // Display an alert and wait for a moment before redirecting
    echo "<script>alert('Vui Lòng Đăng Nhập !'); setTimeout(function() { window.location.href = '?controller=Login&action=Login'; }, 1000);</script>";
    exit();
}
// Define $userInfo outside of the conditional
$userInfo = [];

// Retrieve user information if the user is logged in
if (isset($_SESSION['username'])) {
    $userModel = new User($conn);
    $userInfo = $userModel->getUserByUsername($_SESSION['username']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newEmail = isset($_POST['newEmail']) ? $_POST['newEmail'] : '';
    $newAddress = isset($_POST['newAddress']) ? $_POST['newAddress'] : '';
    $newPhoneNumber = isset($_POST['newPhoneNumber']) ? $_POST['newPhoneNumber'] : '';
    $newPassword = isset($_POST['newPassword']) ? $_POST['newPassword'] : '';
    $currentPassword = isset($_POST['currentPassword']) ? $_POST['currentPassword'] : '';

    // Kiểm tra mật khẩu cũ trước khi cập nhật
    if (password_verify($currentPassword, $userInfo['matkhau'])) {
        // Kiểm tra và cập nhật chỉ những trường được điền vào
        if ($newEmail !== '') {
            $userInfo['email'] = $newEmail;
        }

        if ($newAddress !== '') {
            $userInfo['diachi'] = $newAddress;
        }

        if ($newPhoneNumber !== '') {
            $userInfo['sodienthoai'] = $newPhoneNumber;
        }

        if ($newPassword !== '') {
            // Hash mật khẩu mới trước khi lưu vào cơ sở dữ liệu
            $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $userInfo['matkhau'] = $hashedNewPassword;
        }

        $success = $userModel->updateUser($_SESSION['username'], $userInfo['email'], $userInfo['diachi'], $userInfo['sodienthoai'], $userInfo['matkhau']);

        if ($success) {
            echo "<script>alert('Cập Nhật Thông Tin Thành Công');</script>";
        } else {
            echo "<script>alert('Cập Nhật Thông Tin Thất Bại');</script>";
        }
    } else {
        echo "<script>alert('Mật khẩu cũ không đúng');</script>";
    }
    header("refresh: 1");
    exit();
}

include_once("View/TaiKhoan.php");
?>
