<?php
include_once("Model/Connect.php"); // Kết nối CSDL
include_once("Model/Product.php");

// Kiểm tra xem request method có phải là POST không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $productData = array(
        'tenhh' => $_POST['product_name'],
        'dongia' => $_POST['product_price'],
        'giamgia' => isset($_POST['product_discount']) ? $_POST['product_discount'] : 0, // Kiểm tra xem có giảm giá không
        // Kiểm tra xem có file ảnh được tải lên không
        'hinh' => "",
        'Nhom' => 0, // Giả sử Nhóm là 0
        'maloai' => $_POST['product_category'], // Lấy mã loại sản phẩm từ form
        'dacbiet' => 0, // Giả sử sản phẩm không đặc biệt
        'soluotxem' => $_POST['soluotxem'], // Số lượt xem ban đầu
        'ngaylap' => date("Y-m-d"), // Ngày lập là ngày hiện tại
        'mota' => $_POST['product_description'],
        'soluongton' => $_POST['product_quantity'],
        'mausac' => isset($_POST['product_color']) ? $_POST['product_color'] : "", // Kiểm tra xem có màu sắc không
        'size' => isset($_POST['product_size']) ? $_POST['product_size'] : ""
    );  

    // Kiểm tra và lưu ảnh vào thư mục ../uploads/
    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] == UPLOAD_ERR_OK) {
        $temp_name = $_FILES['product_image']['tmp_name'];
        $file_name = basename($_FILES['product_image']['name']);
        $target_path = '../uploads/'. $file_name;
        $imageFileType = strtolower(pathinfo($target_path, PATHINFO_EXTENSION));

        // Kiểm tra loại file ảnh và di chuyển vào thư mục uploads
        if ($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif") {
            if (move_uploaded_file($temp_name, $target_path)) {
                // File ảnh đã được di chuyển thành công, tiếp tục xử lý
                // Thêm tên file ảnh vào dữ liệu sản phẩm
                $productData['hinh'] = $file_name;
            } else {
                // Xử lý lỗi khi không thể di chuyển file ảnh
                echo "Có lỗi xảy ra khi tải lên ảnh.";
            }
        } else {
            // Xử lý lỗi khi loại file ảnh không hợp lệ
            echo "Chỉ chấp nhận các tệp JPG, JPEG, PNG, GIF.";
        }
    } else {
        // Xử lý lỗi khi người dùng không chọn file ảnh hoặc có lỗi xảy ra trong quá trình tải lên
        echo "Vui lòng chọn một file ảnh hợp lệ.";
    }

    // Thêm sản phẩm vào CSDL nếu có ảnh và đủ dữ liệu
    if (!empty($productData['hinh'])) {
        $productModel = new Product($conn);
        $result = $productModel->addProduct($productData);

        if ($result) {
            // Thêm sản phẩm thành công
            // Redirect về trang Thêm sản phẩm
            header("Location: http://localhost:3000/Admin/index.php?controller=hanghoa&action=HangHoa");
            exit(); // Dừng kịch bản để chuyển hướng hoàn toàn
        } else {
            // Thêm sản phẩm thất bại
            echo "Thêm sản phẩm thất bại!";
        }
    }
}

// Hiển thị view AddLoaiSanPham.php
include_once("View/AddLoaiSanPham.php");
?>
