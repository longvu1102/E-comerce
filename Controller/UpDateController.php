<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['newqty']) && isset($_POST['index'])) {
    $index = $_POST['index'];
    $newQuantity = $_POST['newqty'][$index];

    // Cập nhật số lượng trong giỏ hàng
    $_SESSION['cart'][$index]['quantity'] = $newQuantity;

    // Tính toán lại tổng giá trị và số lượng giỏ hàng
    $totalPrice = calculateTotalPrice($_SESSION['cart']);
    $cartCount = count($_SESSION['cart']);

    // Chuyển hướng người dùng về trang giỏ hàng sau khi cập nhật
    header('Location: ?controller=Cart&action=Cart');
    exit();
}

// Hàm tính tổng giá trị giỏ hàng
function calculateTotalPrice($cart) {
    $totalPrice = 0;
    foreach ($cart as $cartItem) {
        $totalPrice += $cartItem['productInfo']['dongia'] * $cartItem['quantity'];
    }
    return $totalPrice;
}
?>
