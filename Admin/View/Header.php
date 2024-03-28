<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
   
</style>
<body>
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div>
            <div class="brand-logo d-flex align-items-center justify-content-between">
                <a href="" class="text-nowrap logo-img">
                    <img src="./Content/assets/images/logos/dark-logo.svg" width="180" alt="" />
                </a>
                <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                    <i class="ti ti-x fs-8"></i>
                </div>

            </div>
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                <ul id="sidebarnav">
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Home</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="index.php?controller=home&action=dashboard" aria-expanded="false">
                            <span>
                                <i class="ti ti-layout-dashboard"></i>
                            </span>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>
                    <!-- Kiểm tra xem đã đăng nhập hay chưa -->
                    <?php if (!isset($_SESSION['username'])) : ?>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Authentication</span>
                        </li>
                       
                    <?php else : ?>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Tài Khoản</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="index.php?controller=UpdatePass&action=UpdatePass" aria-expanded="false">
                                <span>
                                    <i class="ti ti-settings"></i>
                                </span>
                                <span class="hide-menu">Đổi Mật Khẩu</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="?controller=LogOut&action=LogOut" aria-expanded="false">
                                <span>
                                    <i class="ti ti-power-off"></i>
                                </span>
                                <span class="hide-menu">Logout</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <!-- Quản lý sản phẩm -->
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Quản lý sản phẩm</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="index.php?controller=hanghoa&action=HangHoa" aria-expanded="false">
                            <span>
                                <i class="ti ti-package"></i>
                            </span>
                            <span class="hide-menu">Hàng Hóa</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="index.php?controller=sanpham&action=ThemSanPham" aria-expanded="false">
                            <span>
                                <i class="ti ti-plus"></i>
                            </span>
                            <span class="hide-menu">Thêm Sản Phẩm</span>
                        </a>
                    </li>
                    
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="index.php?controller=loaisanpham&action=SuaLoaiSanPham" aria-expanded="false">
                            <span>
                                <i class="ti ti-menu-alt"></i>
                            </span>
                            <span class="hide-menu">Thêm Danh Mục Sản Phẩm </span>
                        </a>
                    </li>
                    <!--Quan Ly Khach Hang-->
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Quản lý khách hàng</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="?controller=QlyKhachHang&action=QlyKhachHang" aria-expanded="false">
                            <span>
                                <i class="ti ti-menu-alt"></i>
                            </span>
                            <span class="hide-menu">Quản lý khách hàng</span>
                        </a>
                    </li>
                    <!-- Thống kê -->
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Thống Kê</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="index.php?controller=ThongKeThang&action=ThongKeThang" aria-expanded="false">
                            <span>
                                <i class="ti ti-stats-up"></i>
                            </span>
                            <span class="hide-menu">Thống kê theo Tháng</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="index.php?controller=ThongKeQuy&action=ThongKeQuy" aria-expanded="false">
                            <span>
                                <i class="ti ti-stats-down"></i>
                            </span>
                            <span class="hide-menu">Thống kê theo Quý</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="index.php?controller=ThongKeNam&action=ThongKeNam" aria-expanded="false">
                            <span>
                                <i class="ti ti-stats"></i>
                            </span>
                            <span class="hide-menu">Thống kê theo Năm</span>
                        </a>
                    </li>
                </ul>
                <div class="unlimited-access hide-menu bg-light-primary position-relative mb-7 mt-5 rounded">
                    <div class="d-flex">
                        <div class="unlimited-access-title me-3">
                            <h6 class="fw-semibold fs-4 mb-6 text-dark w-85">Upgrade to pro</h6>
                            <a href="https://adminmart.com/product/modernize-bootstrap-5-admin-template/" target="_blank" class="btn btn-primary fs-2 fw-semibold lh-sm">Buy Pro</a>
                        </div>
                        <div class="unlimited-access-img">
                            <img src="./Content/assets/images/backgrounds/rocket.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>

</body>

</html>