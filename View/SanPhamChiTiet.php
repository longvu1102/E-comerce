<?php
include_once("Model/Connect.php");
include_once("Model/BinhLuan.php");
include_once("Model/Product.php");

$binhLuanModel = new BinhLuan($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mahh = $_POST['txtmahh'];
    $makh = isset($_SESSION['id']) ? $_SESSION['id'] : 1;
    $noidung = $_POST['comment'];

    try {
        $result = $binhLuanModel->insertComment($mahh, $makh, $noidung);

        if ($result) {
            echo "Bình luận được chèn thành công.";
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit();
        } else {
            echo "Không thể chèn bình luận.";
        }
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}

$mahh = isset($_GET['mahh']) ? $_GET['mahh'] : null;

if ($mahh === null) {
    echo "Product ID is missing.";
    exit;
}

$comments = $binhLuanModel->getComments($mahh);
$productModel = new Product($conn);

$productId = isset($_GET['mahh']) ? $_GET['mahh'] : null;

if ($productId) {
    $productDetail = $productModel->getProductDetail($productId);

    if ($productDetail) {
        // Phần HTML hiển thị chi tiết sản phẩm
?>
        <div class="container-fluid">
            <div class="row text-center">
                <h3 class="mb-5 font-weight-bold">CHI TIẾT SẢN PHẨM</h3>
            </div>

            <div class="row justify-content-center">
                <form action="?controller=Cart&action=addToCart" method="post">
                    <div class="col-lg-12">
                        <!-- Phần hiển thị ảnh và thông tin sản phẩm -->
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="preview">
                                    <div class="tab-content">
                                        <div class="tab-pane active mr-5">
                                            <img src="./uploads/<?php echo $productDetail['hinh']; ?>" alt="" width="350px" height="350px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="details text-center">
                                    <!-- Các thông tin chi tiết sản phẩm -->
                                    <input type="hidden" name="mahh" value="<?php echo $productDetail['mahh']; ?>" />
                                    <h3 class="product-title"><?php echo $productDetail['tenhh']; ?></h3>
                                    <div class="rating">
                                        <!-- Đánh giá sản phẩm nếu có -->
                                    </div>
                                    <p class="product-description">
                                        <?php echo $productDetail['mota']; ?>
                                    </p>
                                    <h4 class="price">Giá bán:
                                        <?php
                                        $dongia = $productDetail['dongia'];
                                        $giamgia = $productDetail['giamgia'];

                                        if ($giamgia != 0) {
                                            $giaban = $dongia - $giamgia;
                                        } else {
                                            $giaban = $dongia;
                                        }

                                        echo number_format($giaban); // Hiển thị giá bán đã tính toán
                                        ?> VNĐ
                                    </h4>

                                    <h5 class="colors">Màu:
                                        <!-- Dropdown chọn màu sắc -->
                                        <select name="mymausac" class="form-control" style="width:150px; margin-left:210px">
                                            <?php
                                            // Truy vấn cơ sở dữ liệu để lấy thông tin về màu
                                            $queryColors = "SELECT DISTINCT mausac FROM hanghoa WHERE maloai = :maloai";
                                            $stmt = $conn->prepare($queryColors);
                                            $stmt->bindParam(':maloai', $productDetail['maloai']);
                                            $stmt->execute();

                                            while ($rowColor = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                $selected = ($rowColor['mausac'] == $productDetail['mausac']) ? 'selected' : '';
                                                echo "<option value='" . $rowColor['mausac'] . "' $selected>" . $rowColor['mausac'] . "</option>";
                                            }
                                            ?>
                                        </select><br>

                                        <!-- Hiển thị thông tin về kích thước và số lượng -->
                                        <input type="hidden" name="size" id="size" value="0" />
                                        Kích Thước: <?php echo $productDetail['size']; ?> inch
                                        </br></br>
                                        Số Lượng:
                                        <input type="number" id="soluong" name="soluong" min="1" max="100" value="1" size="10" />
                                    </h5>
                                    <!-- Nút mua ngay và các tương tác khác -->

                                    <div class="action">
                                        <button class="add-to-cart btn btn-danger" type="submit" data-toggle="modal" data-target="#myModal">Thêm Vào Giỏ Hàng </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Phần hiển thị bình luận -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h5 class="mt-4 mb-3"><b>Bình luận</b></h5>
                        <hr>

                        <!-- Form bình luận -->
                        <form action="" method="post">
                            <div class="form-group row">
                                <input type="hidden" name="txtmahh" value="<?php echo $productDetail['mahh']; ?>" />
                                <div class="col-md-8">
                                    <textarea class="form-control" name="comment" rows="2" placeholder="Thêm bình luận"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <input type="submit" class="btn btn-primary float-left mt-2" id="submitButton" value="Bình Luận" />
                                </div>
                            </div>
                        </form>

                        <!-- Hiển thị bình luận -->
                <?php
                $comments = $binhLuanModel->getComments($productId);
                include("BinhLuan.php"); // Separate the comment display logic into a new file
            } else {
                echo "Không tìm thấy sản phẩm.";
            }
        } else {
            echo "Không có mã sản phẩm được cung cấp.";
        }
        $conn = null;
                ?>