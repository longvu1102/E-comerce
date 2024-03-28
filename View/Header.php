<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website</title>
    <!-- Add Bootstrap CSS link here -->
    <link rel="stylesheet" href="../Content/Style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    .nav-link.active {
        color: red !important;
    }
</style>


<body>
    <header class="container-fluid">
        <img src="./Content/img/imgheader1.gif" alt="" style="width:100%">
        <nav class="navbar navbar-expand-lg  bg-light">
            <!-- Logo -->
            <a class="navbar-brand" href="#">
                <img src="./Content/img/logo.png" alt="Logo" height="40px">
            </a>

            <!-- Toggler button for mobile -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <!-- Product Link -->
                    <li class="nav-item ">
                        <a class="nav-link <?php echo (isset($_GET['controller']) && $_GET['controller'] == 'Home') ? 'active' : ''; ?>" href="?controller=Home&action=Home">Trang Chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (isset($_GET['controller']) && $_GET['controller'] == 'SanPham') ? 'active' : ''; ?>" href="?controller=SanPham&action=SanPham">Sản Phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (isset($_GET['controller']) && $_GET['controller'] == 'Contact') ? 'active' : ''; ?>" href="?controller=Contact&action=Contact">Liên Hệ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (isset($_GET['controller']) && $_GET['controller'] == 'FAQ') ? 'active' : ''; ?>" href="?controller=FAQ&action=FAQ">FAQ</a>
                    </li>
                    <!-- Thêm liên kết cho trang TaiKhoan -->
                    <li class="nav-item">
                        <a class="nav-link <?php echo (isset($_GET['controller']) && $_GET['controller'] == 'TaiKhoan') ? 'active' : ''; ?>" href="?controller=TaiKhoan&action=TaiKhoan">Tài Khoản</a>
                    </li>
                </ul>


                <!-- Search Form -->
                <form class="form-inline mx-auto" action="?controller=TimKiem" method="POST" style="width:20%">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Tìm Kiếm" aria-label="Search" name="search_query">
                        <div class="input-group-append">
                            <button class="btn btn-outline" type="submit" style="border: 1px solid #ced4da; border-left: none;"><i class="fa-solid fa-magnifying-glass fa-xl" style="color: #000000;"></i></button>
                        </div>
                    </div>
                </form>






                <?php
                if (isset($_SESSION['username'])) {
                    echo '<a class="nav-link" onclick=confirmLogout() href="?controller=Logout&action=Logout"><i class="fas fa-sign-out-alt"></i> Đăng Xuất</a>';
                    echo '<p style="color: green; margin-top: 15px; margin-left: 0px;">Xin chào, ' . $_SESSION['username'] . '!</p>';
                } else {
                    echo '<a class="nav-link" href="?controller=Login&action=Login"><i class="fas fa-user"></i> Đăng Nhập</a>';
                    echo '<a class="nav-link" href="?controller=Registration&action=Registration"><i class="fas fa-address-card"></i> Đăng Ký</a>';
                }
                ?>

                <a class="nav-link" href="?controller=Cart&action=Cart">
                    <i class="fa-solid fa-cart-shopping fa-xl" style="color: #f00000;"></i>
                </a>

                <?php
                if (isset($_SESSION['username'])) {
                    // Nếu người dùng đã đăng nhập
                    if (isset($_SESSION['cart'])) {
                        $cartItemCount = count($_SESSION['cart']);
                    } else {
                        $cartItemCount = 0;
                    }
                } else {
                    // Nếu người dùng chưa đăng nhập
                    $cartItemCount = 0;
                }

                echo '<p style="color: red; margin-left:-10px;" id="cartCount">(' . $cartItemCount . ')</p>';
                ?>

                <script>
                    // Xử lý sau khi thanh toán thành công
                    // Cập nhật số lượng sản phẩm trong giỏ hàng về 0
                </script>




            </div>
        </nav>


        <!-- Carousel -->
        <div id="carouselExample" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExample" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExample" data-slide-to="1"></li>
                <li data-target="#carouselExample" data-slide-to="2"></li>
                <li data-target="#carouselExample" data-slide-to="3"></li>
                <li data-target="#carouselExample" data-slide-to="4"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./Content/img/slide1.jpg" class="d-block w-100 slide-image" alt="Slide 1">
                </div>
                <div class="carousel-item">
                    <img src="./Content/img/slide2.jpg" class="d-block w-100 h-50 slide-image" alt="Slide 2">
                </div>
                <div class="carousel-item">
                    <img src="./Content/img/slide3.jpg" class="d-block w-100 slide-image" alt="Slide 3">
                </div>
                <div class="carousel-item">
                    <img src="./Content/img/slide4.jpg" class="d-block w-100 slide-image" alt="Slide 4">
                </div>
                <div class="carousel-item">
                    <img src="./Content/img/slide5.jpg" class="d-block w-100 slide-image" alt="Slide 5">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="container-anh container-fluid mt-4">
            <div class="row">
                <div class="col-lg-3">
                    <img src="./Content/img/name10.jpg" class="anh img-fluid w-100" alt="Image 1" style="image-rendering: auto; object-fit: cover;">
                </div>

                <div class="col-lg-3">
                    <img src="./Content/img/name11.jpg" class="anh img-fluid w-100" alt="Image 2" style="image-rendering: auto; object-fit: cover;">
                </div>

                <div class="col-lg-3">
                    <img src="./Content/img/name12.jpg" class="anh img-fluid w-100" alt="Image 3" style="image-rendering: auto; object-fit: cover;">
                </div>

                <div class="col-lg-3">
                    <img src="./Content/img/name13.jpg" class="anh img-fluid w-100" alt="Image 4" style="image-rendering: auto; object-fit: cover;">
                </div>
            </div>
        </div>

    </header>
    <div class="container-anh container-fluid mt-4 text-center">
        <div class="row">
            <div class="col-lg-3 mb-4">
                <a href="?controller=SanPham&action=SanPham&category=1" class="card-link">
                    <div class="card">
                        <img src="./Content/img/dell-1.jpg" class="card-img-top" alt="Dell Image">
                        <div class="card-body">
                            <h3 class=" text-danger card-title">Dell</h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 mb-4">
                <a href="?controller=SanPham&action=SanPham&category=7" class="card-link">
                    <div class="card">
                        <img src="./Content/img/asus-1.jpg" class="card-img-top" alt="Asus Image">
                        <div class="card-body">
                            <h3 class="text-danger card-title">Asus</h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 mb-4">
                <a href="?controller=SanPham&action=SanPham&category=8" class="card-link">
                    <div class="card">
                        <img src="./Content/img/Msi-1.jpg" class="card-img-top" alt="MSI Image">
                        <div class="card-body">
                            <h3 class="text-danger card-title">MSI</h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 mb-4">
                <a href="?controller=SanPham&action=SanPham&category=10" class="card-link">
                    <div class="card">
                        <img src="./Content/img/lenovo-1.jpg" class="card-img-top" alt="Lenovo Image">
                        <div class="card-body">
                            <h3 class=" text-danger card-title">Lenovo</h3>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>


    <script>
        function confirmLogout() {
            var confirmLogout = confirm("Bạn có chắc muốn đăng xuất?");
            if (confirmLogout) {
                window.location.href = "index.php";
            }
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
<?php

?>

</html>