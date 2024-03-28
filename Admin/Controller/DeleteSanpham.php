<?php
// controllers/XoaController.php

include_once("./Model/Connect.php");
require_once("./Model/Product.php");

// Kiểm tra xem request method có phải là GET không
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Kiểm tra xem controller và action có tồn tại không
    if (isset($_GET['controller']) && isset($_GET['action']) && $_GET['controller'] == 'xoa' && $_GET['action'] == 'DeleteSanpham') {
        // Kiểm tra xem có truyền id của sản phẩm muốn xóa không
        if (isset($_GET['id'])) {
            // Lấy id của sản phẩm từ URL
            $productId = $_GET['id'];

            // Kết nối đến cơ sở dữ liệu
            $conn = connect();

            // Tạo một instance của lớp Product và truyền kết nối vào
            $product = new Product($conn);

            // Gọi phương thức xóa sản phẩm với id tương ứng
            $result = $product->deleteProduct($productId);

            if ($result) {
                // Nếu xóa sản phẩm thành công, chuyển hướng về trang danh sách sản phẩm
                echo "<script>alert('Xóa sản phẩm thành công!'); window.location.href = 'http://localhost:3000/Admin/index.php?controller=hanghoa&action=HangHoa';</script>";
                exit();
            } else {
                // Nếu xóa sản phẩm thất bại, hiển thị thông báo lỗi
                echo "Xóa sản phẩm thất bại!";
            }
        } else {
            // Nếu không có id sản phẩm được truyền, hiển thị thông báo lỗi
            echo "Không có sản phẩm để xóa!";
        }
    } else {
        // Nếu controller hoặc action không tồn tại, hiển thị thông báo lỗi
        echo "Controller hoặc action không hợp lệ!";
    }
}
?>
