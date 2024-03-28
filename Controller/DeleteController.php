<?php
session_start();

// Kiểm tra xem có index được gửi từ form không
if (isset($_POST['index'])) {
    $index = $_POST['index'];

    // Kiểm tra xem giỏ hàng có tồn tại không
    if (isset($_SESSION['cart'])) {
        // Xóa sản phẩm khỏi giỏ hàng bằng cách sử dụng index
        unset($_SESSION['cart'][$index]);
        // Hiển thị thông báo "Đã xóa thành công" bằng PHP
        echo '<script>alert("Đã xóa thành công!");</script>';
        // Thực hiện chuyển hướng về trang giỏ hàng hoặc trang khác tùy ý
        header("Location: http://localhost:8080/BaiTapThucHanh/DoAnCuoiKy/index.php?controller=Cart&action=Cart");
        exit();
    }
}
?>
