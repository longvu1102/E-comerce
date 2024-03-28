<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản Phẩm</title>
    <!-- Link thư viện Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./Content/style.css">
    <link rel="stylesheet" href="./Content/assets/css/styles.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<style>

</style>

<body>
    <div class="container-lg mt-5">
        <div class="col-lg-11" style="margin-left: calc(12.5% + 15px);">
            <h1 class="mb-4 text-center">Thêm Sản Phẩm</h1>

            <form action="?controller=sanpham&action=ThemSanPham" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="product_name">Tên Sản Phẩm:</label>
                    <input type="text" class="form-control" name="product_name" required>
                </div>

                <div class="form-group">
                    <label for="product_description">Mô Tả Sản Phẩm:</label>
                    <textarea class="form-control" name="product_description" id="product_description"></textarea>
                </div>
                <div class="form-group">
                    <label for="product_date">Ngày Lập:</label>
                    <input type="date" class="form-control" name="product_date" required>
                </div>
                <div class="form-group">
                    <label for="soluotxem">Số lượt xem</label>
                    <input type="number" class="form-control" name="soluotxem" required>
                </div>

                <div class="form-group">
                    <label for="product_price">Giá Sản Phẩm:</label>
                    <input type="text" class="form-control" name="product_price" required>
                </div>

                <div class="form-group">
                    <label for="product_discount">Giảm Giá Sản Phẩm:</label>
                    <input type="text" class="form-control" name="product_discount">
                </div>

                <div class="form-group">
                    <label for="product_color">Màu Sắc Sản Phẩm:</label>
                    <select class="form-control" name="product_color">
                        <option value=" Màu Bạc">Bạc</option>
                        <option value="Màu Xám">Xám</option>
                        <option value="Màu Đen">Đen</option>
                        <option value="Màu Trắng">Trắng</option>
                    </select>
                </div>


                <div class="form-group">
                    <label for="product_image">Hình Ảnh Sản Phẩm:</label>
                    <input type="file" class="form-control-file" name="product_image" accept="image/*">
                </div>


                <div class="form-group">
                    <label for="product_category">Loại Sản Phẩm:</label>
                    <select class="form-control" name="product_category">
                        <option value="1">Laptop Dell</option>
                        <option value="7">Laptop Asus</option>
                        <option value="8">Laptop MSI</option>
                        <option value="10">Laptop Lenovo</option>
                       
                        <!-- Thêm các nhóm sản phẩm khác vào đây nếu cần -->
                    </select>
                </div>

                <div class="form-group">
                    <label for="product_size">Size (inch):</label>
                    <input type="text" class="form-control" name="product_size" required>
                </div>

                <div class="form-group">
                    <label for="product_quantity">Số Lượng Sản Phẩm:</label>
                    <input type="number" class="form-control" name="product_quantity" required>
                </div>

                <button type="submit" class="btn btn-primary">Thêm Sản Phẩm</button>
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