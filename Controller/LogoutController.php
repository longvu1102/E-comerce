<?php
// Bắt đầu phiên làm việc (session)
session_start();

// Xử lý đăng xuất
if (isset($_SESSION['username'])) {
    // Nếu người dùng đã đăng nhập

    // Hủy giá trị của biến session 'username' để đăng xuất người dùng
    unset($_SESSION['username']);

    // Chuyển hướng người dùng về trang chủ (index.php)
    header('Location: index.php');

    // Ngừng thực thi để không lệnh thừa được thực hiện sau khi chuyển hướng
    exit;
}
   
?>
