<?php
// Controller/UpdateProductController.php

include_once("./Model/Connect.php");
require_once("./Model/Product.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem có giá trị product_id được gửi qua POST hay không
    if(isset($_POST['product_id'])) {
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
            'hinh' => "" // Đặt hình ảnh mặc định là rỗng ban đầu
        ];

        // Kiểm tra xem có file ảnh mới được tải lên không
        if (!empty($_FILES['product_image']['name'])) {
            // Thực hiện xử lý và lưu ảnh mới
            $targetDir = "../uploads/"; // Thư mục lưu trữ ảnh
            $targetFile = $targetDir . basename($_FILES["product_image"]["name"]); // Đường dẫn tới file ảnh
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION)); // Định dạng của file ảnh

            // Kiểm tra định dạng file ảnh
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                echo "Chỉ cho phép tải lên các file ảnh JPG, JPEG, PNG và GIF.";
                exit();
            }

            // Di chuyển file ảnh tải lên vào thư mục uploads
            if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $targetFile)) {
                // Lưu đường dẫn ảnh vào dữ liệu sản phẩm
                $productData['hinh'] = $targetFile;
            } else {
                echo "Có lỗi xảy ra khi tải lên file ảnh.";
                exit();
            }
        } else {
            // Nếu không có ảnh mới, giữ nguyên đường dẫn ảnh cũ trong cơ sở dữ liệu
            $product = new Product(connect());
            $productData['hinh'] = $product->getProductImageById($productId); // Đổi hàm getProductImageById thành phương thức thích hợp trong class Product
        }

        // Tạo một instance mới của lớp Product và truyền kết nối cơ sở dữ liệu
        $product = new Product(connect());

        // Gọi phương thức updateProduct để cập nhật sản phẩm
        if ($product->updateProduct($productId, $productData)) {
            // Sản phẩm đã được cập nhật thành công, chuyển hướng đến trang chỉnh sửa sản phẩm hoặc hiển thị thông báo thành công
            header("Location: http://localhost:3000/Admin/index.php?controller=hanghoa&action=HangHoa");
            exit();
        } else {
            // Không thể cập nhật sản phẩm, chuyển hướng đến trang lỗi hoặc hiển thị thông báo lỗi
            header("Location: http://localhost:3000/Admin/index.php?controller=hanghoa&action=HangHoa");
            exit();
        }
    } else {
        // Nếu không có product_id được gửi qua POST, chuyển hướng đến trang chính hoặc hiển thị thông báo lỗi
        header("Location: http://localhost:3000/Admin/index.php?controller=home&action=dashboard");
        exit();
    }
} elseif(isset($_GET['id'])) { // Kiểm tra nếu có id được truyền qua URL
    // Lấy ID của sản phẩm từ URL
    $productId = $_GET['id'];

    // Lấy dữ liệu sản phẩm từ cơ sở dữ liệu dựa trên productId
    $product = new Product(connect());
    $productData = $product->getProductById($productId); // Viết phương thức getProductById trong class Product

    // Kiểm tra xem sản phẩm có tồn tại không
    if($productData) {
        // Hiển thị trang chỉnh sửa sản phẩm và truyền dữ liệu của sản phẩm vào view
        include_once("View/EditHangHoa.php");
    } else {
        // Nếu không tìm thấy sản phẩm, chuyển hướng hoặc hiển thị thông báo lỗi
        header("Location: http://localhost:3000/Admin/index.php?controller=home&action=dashboard");
        exit();
    }
} else {
    // Nếu không có id, chuyển hướng đến trang chính hoặc hiển thị thông báo lỗi
    header("Location: http://localhost:3000/Admin/index.php?controller=home&action=dashboard");
    exit();
}
?>
