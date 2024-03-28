<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./Content/style.css">
    <link rel="stylesheet" href="./Content/assets/css/styles.min.css">
</head>
<style>
    h2 {
        margin-left: 160px;
    }
</style>

<body>
    <div class="container">
        <h2 class="mt-2 text-center">Danh sách sản phẩm</h2>
        <div class="row mt-4">
            <div class="col-lg-11" style="margin-left: calc(12.5% + 0px);">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Danh mục</th>
                            <th>Lượt xem</th>
                            <th>Ngày</th>
                            <th>Mô tả</th>
                            <th>Số lượng</th>
                            <th>Màu sắc</th>
                            <th>Kích thước</th>
                            <th>Giá</th>
                            <th>Giảm giá</th>
                            <th>Hình ảnh</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include_once("./Model/Connect.php");
                        require_once("./Model/Product.php");

                        // Kết nối đến cơ sở dữ liệu
                        $conn = connect();

                        // Tạo một instance của lớp Product và truyền kết nối vào
                        $product = new Product($conn);

                        // Gọi hàm getAllProducts để lấy danh sách sản phẩm
                        $products = $product->getAllProducts();

                        // Hiển thị danh sách sản phẩm
                        if ($products) {
                            foreach ($products as $productItem) {
                                echo "<tr>";
                                echo "<td>{$productItem['tenhh']}</td>";

                                // Sử dụng mã danh mục để lấy tên danh mục tương ứng
                                $maloai = $productItem['maloai'];
                                $tenDanhMuc = $product->getTenDanhMuc($maloai); // Sử dụng phương thức getTenDanhMuc từ đối tượng $product

                                echo "<td>{$tenDanhMuc}</td>"; // Hiển thị tên danh mục thay vì mã danh mục
                                
                                echo "<td>{$productItem['soluotxem']}</td>";
                                echo "<td>{$productItem['ngaylap']}</td>";
                                echo "<td>{$productItem['mota']}</td>";
                                echo "<td>{$productItem['soluongton']}</td>";
                                echo "<td>{$productItem['mausac']}</td>";
                                echo "<td>{$productItem['size']}</td>";
                                echo "<td>{$productItem['dongia']}</td>";
                                echo "<td>{$productItem['giamgia']}</td>";
                                echo "<td><img src='../uploads/{$productItem['hinh']}' alt='{$productItem['tenhh']}' class='product'></td>";
                                echo "<td>
                                    <a href=\"?controller=hanghoa&action=SuaHangHoa&id={$productItem['mahh']}\" class='btn btn-edit mb-2'>Sửa</a>
                                    <a href=\"?controller=xoa&action=DeleteSanpham&id={$productItem['mahh']}\" class=\"btn btn-delete\">Xóa</a>
                                </td>";

                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='12'>Không tìm thấy sản phẩm nào.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle (bao gồm Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
