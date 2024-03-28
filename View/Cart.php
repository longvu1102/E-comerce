<?php
include_once("Model/Connect.php");
include_once("Model/GioHang.php");

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (isset($_SESSION['username'])) {
    echo '<div class="container mt-4">';
    echo '<h1 class="text-danger mb-4 font-bold">GIỎ HÀNG</h1>';

    // Tạo đối tượng GioHang và truyền kết nối đến constructor
    $gioHangModel = new GioHang($conn);
    $totalPrice = 0;

    // Khởi tạo biến đếm số thứ tự
    if (empty($_SESSION['cart'])) {
        echo '<h2 class="text-info text-center">Giỏ hàng đang trống. Vui lòng thêm sản phẩm vào giỏ hàng.</h2>';
    } else {
        $stt = 1;

        // Lấy thông tin sản phẩm từ giỏ hàng
       // Lấy thông tin sản phẩm từ giỏ hàng
foreach ($_SESSION['cart'] as $index => $cartItem) {
    // Kiểm tra tồn tại của key 'productId' và 'color'
    $productId = isset($cartItem['productId']) ? $cartItem['productId'] : null;
    $color = isset($cartItem['color']) ? $cartItem['color'] : 'Màu không rõ';
    $productInfo = $gioHangModel->getProductInfo($cartItem['productId']);

    // Tính giá cuối cùng của sản phẩm bằng cách trừ đi giảm giá (nếu có)
    $finalPrice = isset($productInfo['giamgia']) ? $productInfo['dongia'] - $productInfo['giamgia'] : $productInfo['dongia'];

    // Tính tổng giá trị của giỏ hàng
    if (is_numeric($finalPrice)) {
        $totalPrice += $finalPrice * $cartItem['quantity'];
    } else {
        // Xử lý khi giá trị không phải là số
        echo 'Lỗi: Giá trị không hợp lệ. Product ID: ' . $productId;
    }

    // Tiếp tục xử lý thông tin sản phẩm...
    echo '<div class="row mb-4">';
    echo '<div class="col-md-2">';
    echo '<img src="./uploads/' . $productInfo['hinh'] . '" alt="' . $productInfo['tenhh'] . '" class="img-thumbnail" width="100%">';
    echo '</div>';
    echo '<div class="col-md-5">';
    echo '<span class="hidden-name">' . $productInfo['tenhh'] . '</span>';
    echo '<p><strong>Màu sắc:</strong> ' . $color . '</p>';
    echo '<p><strong>Kích thước:</strong> ' . $productInfo['size'] . ' inch</p>';
    echo '</div>';
    echo '<div class="col-md-2">';
    echo '<form method="post" action="?controller=UpDate&action=UpDate">';
    echo '<label for="quantity' . $index . '" class="mb-1">Số lượng:</label>';
    echo '<input type="number" class="form-control quantity-input" id="quantity' . $index . '" name="newqty[' . $index . ']" value="' . $cartItem['quantity'] . '" data-product-id="' . $productId . '" />';
    echo '<input type="hidden" name="index" value="' . $index . '">';
    echo '<input type="submit" class="mt-2 btn btn-success" value="Cập nhật" />';
    echo '</form>';
    echo '</div>';
    echo '<div class="col-md-2">';
    echo '<p><strong>Đơn giá:</strong> ' . number_format($finalPrice) . ' VNĐ</p>';
    echo '</div>';
    echo '<div class="col-md-1">';
    echo '<p><strong>Thành tiền:</strong> <span class="total-price">' . number_format($finalPrice * $cartItem['quantity']) . '</span> VNĐ</p>';
    echo '<form method="post" action="?controller=Delete&action=Delete">';
    echo '<input type="hidden" name="index" value="' . $index . '">';
    echo '<button type="submit" class="btn btn-danger">Xóa</button>';
    echo '</form>';
    echo '</div>';
    echo '</div>';
}

    }

    // Hiển thị tổng giá trị của giỏ hàng và nút thanh toán
    echo '<div class="row mt-4">';
    echo '<div class="col-md-8 text-right">';
    echo '<h4 class="text-danger">Tổng Giá Trị Giỏ Hàng: <span id="cartTotal">' . number_format($totalPrice) . '</span> VNĐ</h4>';
    echo '</div>';
    echo '<div class="col-md-4">';
    echo '<form action="?controller=Order&action=Order" method="post">';
    echo '<button id="checkoutButton" type="submit" class="mb-4 btn btn-danger float-right" name="checkout">Thanh Toán</button>';
    echo '</form>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
} else {
    // Nếu chưa đăng nhập, hiển thị thông báo và chuyển hướng người dùng sau khi nhấn OK trong alert
    echo '<script>';
    echo 'alert("Vui lòng đăng nhập để xem giỏ hàng.");';
    echo 'window.location.href = "?controller=Login&action=Login";';
    echo '</script>';
}
?>
