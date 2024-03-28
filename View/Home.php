<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Trang Chủ</title>
    <style>
        /* CSS để loại bỏ gạch dưới và màu xanh của thẻ a */
        a {
            text-decoration: none;
            color: inherit;
        }

        .card:hover img {
            transform: scale(1.1);
            transition: transform 0.3s;
        }

        h2 {
            font-weight: bold;
        }
    </style>
</head>

<body>

    <?php
    include_once("Model/Connect.php");
    include_once("Model/Product.php");

    // Tạo đối tượng Product và truyền kết nối CSDL
    $productModel = new Product($conn);

    // Include header
    include_once 'View/Header.php';
    ?>

    <div class="container-fluid mt-4">
        <h2 class="text-center">Sản Phẩm Đang Giảm Giá</h2>
        <div class="row">
            <?php
            $resultDiscountedProducts = $productModel->getDiscountedProducts();

            while ($row = $resultDiscountedProducts->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="col-lg-3 mt-4">';
                echo '<div class="card text-center">';
                echo '<a href="?controller=SanPhamChiTiet&action=SanPhamChiTiet&mahh=' . $row['mahh'] . '" style="text-decoration: none;color: inherit;">';
                echo '<img src="uploads/' . $row['hinh'] . '" class="card-img-top" alt="' . $row['tenhh'] . '">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row['tenhh'] . '</h5>';
                echo '<p class="card-text">Giá: ' . number_format($row['dongia']) . ' VNĐ</p>';
                echo '<p class="card-text">Giảm giá: ' . number_format($row['giamgia']) . ' VNĐ</p>';
                echo '</a>';
              
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <div class="container-fluid mt-4 mb-5">
        <h2 class="text-center">Sản Phẩm Mới Nhất</h2>
        <div class="row">
            <?php
            $resultNewestProducts = $productModel->getNewestProducts();

            while ($row = $resultNewestProducts->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="col-lg-3 mt-4">';
                echo '<div class="card text-center">';
                echo '<a href="?controller=SanPhamChiTiet&action=SanPhamChiTiet&mahh=' . $row['mahh'] . '">';
                echo '<img src="uploads/' . $row['hinh'] . '" class="card-img-top" alt="' . $row['tenhh'] . '">';
                echo '</a>';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row['tenhh'] . '</h5>';
                echo '<p class="card-text">Giá: ' . number_format($row['dongia']) . ' VNĐ</p>';
               
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <?php
    // Đóng kết nối
    $conn = null; // hoặc $conn = $productModel->closeConnection(); tùy vào cách bạn implement hàm đó
    ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
