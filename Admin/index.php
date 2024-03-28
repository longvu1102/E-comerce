<?php
set_include_path(get_include_path() . PATH_SEPARATOR . realpath('Model/'));
spl_autoload_extensions('.php');
spl_autoload_register();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" type="image/png" href="./Content//assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="./Content/style.css">
    <link rel="stylesheet" href="./Content/assets/css/styles.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="NEW-INTEGRITY-VALUE" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="NEW-INTEGRITY-VALUE" crossorigin="anonymous">
    <Title></Title>

</head>

<body>
    <?php
    ob_start(); // Bắt đầu bộ đệm đầu ra
    include_once("View/Header.php");

    ?>

    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <?php
        $controller = "Dangnhap"; // Controller mặc định nếu không có action và chưa đăng nhập
        if (isset($_SESSION['username'])) {
            // Nếu tồn tại session username (đã đăng nhập)
            if (isset($_GET['action'])) {
                $controller = $_GET['action'];
            }
        }

        // Kiểm tra xem controller có tồn tại không trước khi include
        if (file_exists("Controller/$controller.php")) {
            include_once("Controller/$controller.php");
        } else {
            echo "Controller không tồn tại";
        }
        ob_end_flush(); // Gửi đầu ra từ bộ đệm
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="./Content/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="./Content/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./Content/assets/js/sidebarmenu.js"></script>
    <script src="./Content/assets/js/app.min.js"></script>
    <script src="./Content/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="./Content/assets/libs/simplebar/dist/simplebar.js"></script>



</body>

</html>