<?php
include_once("Model/Connect.php");

// Hàm thêm sản phẩm vào giỏ hàngfunction addToCart($productId, $quantity, $color, $tenhh) {
    function addToCart($productId, $quantity, $color, $tenhh) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
    
        $itemKey = $productId . '_' . $color;
    
        if (array_key_exists($itemKey, $_SESSION['cart'])) {
            $_SESSION['cart'][$itemKey]['quantity'] += $quantity;
        } else {
            $_SESSION['cart'][$itemKey] = array(
                'productId' => $productId,
                'quantity' => $quantity,
                'color' => $color,
                'tenhh' => $tenhh, // Thêm thông tin về tên sản phẩm vào biến $_SESSION['cart']
            );
        }
    }
    
    
    



// Hàm xử lý yêu cầu thêm vào giỏ hàng
// Hàm xử lý yêu cầu thêm vào giỏ hàng
function handleAddToCartRequest() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $productId = $_POST['mahh'];
        $quantity = $_POST['soluong'];
        $color = $_POST['mymausac'];
        $tenhh = $_POST['tenhh']; // Đảm bảo rằng tenhh được lấy từ dữ liệu POST
        addToCart($productId, $quantity, $color, $tenhh);
        
       
        

        // Redirect người dùng đến trang giỏ hàng sau khi thêm vào giỏ hàng
        header("Location: ?controller=Cart&action=Cart");
        exit();
    }
}


// Gọi hàm xử lý yêu cầu thêm vào giỏ hàng
handleAddToCartRequest();

// Include trang View/Cart.php
include("View/Cart.php");
