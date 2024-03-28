<!-- EditHangHoa.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <!-- Add your stylesheet link here -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./Content/style.css">
</head>

<body>
    <div class="container-lg mt-5">
        <div class="col-lg-11" style="margin-left: calc(12.5% + 15px);">
            <h1 class="mb-4 text-center">Cập Nhật Sản Phẩm</h1>
            <form action="index.php?controller=hanghoa&action=SuaHangHoa" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="product_name">Tên sản phẩm:</label>
                    <input type="text" class="form-control" name="product_name" value="<?php echo $productData['tenhh']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="product_description">Mô tả sản phẩm:</label>
                    <textarea class="form-control" name="product_description" id="product_description"><?php echo $productData['mota']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="product_date">Ngày Lập:</label>
                    <input type="date" class="form-control" name="product_date" value="<?php echo $productData['ngaylap']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="product_views">Số lượt xem</label>
                    <input type="number" class="form-control" name="product_views" value="<?php echo $productData['soluotxem'];?>" required>
                </div>
                <div class="form-group">
                    <label for="product_price">Giá sản phẩm:</label>
                    <input type="text" class="form-control" name="product_price" value="<?php echo $productData['dongia']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="product_discount">Giảm giá:</label>
                    <input type="text" class="form-control" name="product_discount" value="<?php echo $productData['giamgia']; ?>">
                </div>
                <div class="form-group">
                    <label for="product_color">Màu sắc sản phẩm:</label>
                    <select class="form-control" name="product_color">
                        <option value="Bạc" <?php if ($productData['mausac'] == 'Bạc') echo 'selected'; ?>>Bạc</option>
                        <option value="Xám" <?php if ($productData['mausac'] == 'Xám') echo 'selected'; ?>>Xám</option>
                        <option value="Đen" <?php if ($productData['mausac'] == 'Đen') echo 'selected'; ?>>Đen</option>
                        <option value="Trắng" <?php if ($productData['mausac'] == 'Trắng') echo 'selected'; ?>>Trắng</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="product_image">Hình ảnh sản phẩm:</label>
                    <input type="file" class="form-control-file" name="product_image" accept="image/*">
                </div>
                <div class="form-group">
                    <label for="product_category">Loại sản phẩm:</label>
                    <select class="form-control" name="product_category">
                        <option value="1" <?php if ($productData['maloai'] == '1') echo 'selected'; ?>>Dell</option>
                        <option value="7" <?php if ($productData['maloai'] == '7') echo 'selected'; ?>>Asus</option>
                        <option value="8" <?php if ($productData['maloai'] == '8') echo 'selected'; ?>>Msi</option>
                        <option value="10" <?php if ($productData['maloai'] == '10') echo 'selected'; ?>>Lenovo</option>
                        <option value="16" <?php if ($productData['maloai'] == '16') echo 'selected'; ?>>TUF</option>
                        <!-- Add more categories here if needed -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="product_size">Kích thước (inch):</label>
                    <input type="text" class="form-control" name="product_size" value="<?php echo $productData['size']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="product_quantity">Số lượng sản phẩm:</label>
                    <input type="number" class="form-control" name="product_quantity" value="<?php echo $productData['soluongton']; ?>" required>
                </div>
                <input type="hidden" name="product_id" value="<?php echo $productData['mahh']; ?>">
                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#product_description'))
            .catch(error => {
                console.error(error);
            });
    </script>
</body>

</html>