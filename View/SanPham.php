<?php
include_once 'Model/Connect.php';
include_once 'Model/Pagination.php';
include_once 'Model/Product.php';
// Tạo một đối tượng Pagination
$pagination = new Pagination($conn, 8); // Điều chỉnh giới hạn theo cần thiết
// Lấy sản phẩm dựa trên danh mục đã chọn hoặc tất cả sản phẩm nếu không có danh mục nào được chọn
// Lấy sản phẩm dựa trên danh mục đã chọn hoặc tất cả sản phẩm nếu không có danh mục nào được chọn
$category = isset($_GET['category']) ? $_GET['category'] : null;

// Lấy sản phẩm dựa trên danh mục đã chọn hoặc tất cả sản phẩm nếu không có danh mục nào được chọn
$productModel = new Product($conn);

if ($category) {
    $result = $productModel->getAllProductsByCategory($category);
} else {
    $result = $pagination->getProducts($category);
}

// Hiển thị danh sách sản phẩm
echo '<div class="mt-5 text-center">';
echo '<div class="row">';
if ($result->rowCount() > 0) {
    echo '<h2 class="text-center">' . getCategoryName($category) . '</h2>';
    echo '<div class="row">';

    while ($set = $result->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="col-lg-3 col-md-4 mb-4">';
        echo '<div class="card text-center">';
        echo '<a href="?controller=SanPhamChiTiet&action=SanPhamChiTiet&mahh=' . $set['mahh'] . '" style="text-decoration: none;color: inherit;">';
        echo '<button class="btn btn-danger btn-new border-rounded-circle" id="may4" value="lap 4">New</button>';
        echo '<img src="uploads/' . $set['hinh'] . '" class="card-img-top" alt="">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $set['tenhh'] . '</h5>';
        echo '<p class="card-text" style="color: red;">';

        if ($set['giamgia'] != 0) {
            echo "Giảm Giá: " . $set['giamgia'] . '<sup><u>đ</u></sup><br>';
        }
        echo 'Giá Gốc : ' . $set['dongia'] . '</p>';
        echo '<p class="card-text">';

        if ($set['giamgia'] != 0) {
            echo "Giá: " . ($set['dongia'] - $set['giamgia']) . '<sup><u>đ</u></sup>';
        } else {
            echo "Giá: " . $set['dongia'] . '<sup><u>đ</u></sup>';
        }

        echo '</p>';
        echo '</div>';
        echo '</a>';
        echo '</div>';
        echo '</div>';
    }

    echo '</div>';
    echo '</div>';

    $pagination->displayPagination($category);
} else {
    // Hiển thị thông báo khi không có sản phẩm
    echo '<div class="text-center mt-5"><p>Không có sản phẩm nào trong danh mục này.</p></div>';
}

// Đóng kết nối CSDL
$conn = null;

function getCategoryName($categoryId)
{
    switch ($categoryId) {
        case 1:
            return 'Dell';
        case 7:
            return 'Asus';
        case 8:
            return 'MSI';
        case 10:
            return 'Lenovo';
        // Các trường hợp khác nếu có
        default:
            return 'Tất Cả Sản Phẩm';
    }
}
?>
