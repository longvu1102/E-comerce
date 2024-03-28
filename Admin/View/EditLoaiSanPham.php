<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Loại Sản Phẩm</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./Content/assets/css/styles.min.css">
    <style>
        html,
        body {
            height: 100%;
        }

        .card {
            width: 30rem;
            max-width: 100%;
        }
    </style>
</head>

<body>
    <div class="d-flex align-items-center justify-content-center h-100">
        <div class="card">
            <div class="card-body">
                <form action="index.php?controller=loaisanpham&action=SuaLoaiSanPham" method="POST">
                    <h1 class="card-title">Thêm Loại Sản Phẩm</h1>
                    <div class="form-group">
                        <label for="category_name">Tên Loại:</label>
                        <input type="text" class="form-control" id="category_name" name="category_name" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm Loại</button>
                </form>

                <hr />

                <h2>Danh sách loại sản phẩm</h2>
                <?php
                require_once './Model/Connect.php';
                require_once './Model/UserModel.php';

                // tạo một đối tượng Connect mới
               

                // tạo một đối tượng Product mới
                $product = new Product(connect());

                $categories = $product->getCategories();
                foreach ($categories as $category) {
                    echo "<p>" . htmlspecialchars($category['tenloai'], ENT_QUOTES) . "</p>";
                }
                ?>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>