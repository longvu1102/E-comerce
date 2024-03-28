<?php
include_once 'Model/Connect.php';
include_once 'Model/Pagination.php';
include_once 'Model/Product.php';

$category = isset($_GET['category']) ? $_GET['category'] : null;
$productModel = new Product($conn);

if (isset($_POST['search_query'])) {
    $search_query = $_POST['search_query'];
    $result = $productModel->searchProductByName($search_query);
    
    // Gửi kết quả tìm kiếm đến View TìmKiem.php
    include_once "./View/TimKiem.php";
} else {
    // Nếu không có yêu cầu tìm kiếm, chuyển hướng hoặc xử lý khác tại đây
    // ...
}
?>
