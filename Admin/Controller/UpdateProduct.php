<?php
// Controller/UpdateProductController.php

include_once("./Model/Connect.php");
require_once("./Model/Product.php");

// Kiểm tra nếu form đã được submit để chỉnh sửa sản phẩm
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy ID của sản phẩm từ form
    $productId = $_POST['product_id'];

    // Lấy dữ liệu sản phẩm từ form
    $productData = [
        'tenhh' => $_POST['product_name'],
        'maloai' => $_POST['product_category'],
        'soluotxem' => $_POST['product_views'],
        'ngaylap' => $_POST['product_date'],
        'mota' => $_POST['product_description'],
        'soluongton' => $_POST['product_quantity'],
        'mausac' => $_POST['product_color'],
        'size' => $_POST['product_size'],
        'dongia' => $_POST['product_price'],
        'giamgia' => $_POST['product_discount'],
        'hinh' => $_POST['product_image'] // Giả sử đây là đường dẫn hoặc URL của hình ảnh
    ];

    // Tạo một instance mới của lớp Product và truyền kết nối cơ sở dữ liệu
    $product = new Product(connect());

    // Gọi phương thức updateProduct để cập nhật sản phẩm
    if ($product->updateProduct($productId, $productData)) {
        // Sản phẩm đã được cập nhật thành công, chuyển hướng đến trang chỉnh sửa sản phẩm hoặc hiển thị thông báo thành công
        header("Location: EditHangHoa.php?productId=$productId");
        exit();
    } else {
        // Không thể cập nhật sản phẩm, chuyển hướng đến trang lỗi hoặc hiển thị thông báo lỗi
        header("Location: your_error_page.php");
        exit();
    }
} else {
    // Form không được submit, chuyển hướng đến trang chính hoặc hiển thị thông báo lỗi
    header("Location: your_homepage.php");
    exit();
}
?>
