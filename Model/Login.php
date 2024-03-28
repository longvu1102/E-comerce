<?php
// Kết nối tới CSDL bằng PDO
include('Connect.php');

// Kiểm tra xem form đăng nhập đã được submit chưa
if (isset($_POST['dangnhap'])) {
    // Lấy dữ liệu nhập vào từ form
    $username = isset($_POST['username']) ? addslashes($_POST['username']) : '';
    $password = isset($_POST['password']) ? addslashes($_POST['password']) : '';

    // Kiểm tra xem đã nhập đủ tên đăng nhập và mật khẩu chưa
    if (!$username || !$password) {
        // Thông báo lỗi và chuyển hướng trở lại trang trước
        echo "<script>alert('Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu.');</script>";
        echo "<script>window.location.href='javascript: history.go(-1)';</script>";
        exit;
    }

    // Sử dụng PDO để thực hiện truy vấn kiểm tra tên đăng nhập
    $stmt = $conn->prepare("SELECT username, matkhau FROM khachhang1 WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Kiểm tra xem tên đăng nhập có tồn tại không
    if (empty($result)) {
        // Thông báo lỗi và chuyển hướng trở lại trang trước
        echo "<script>alert('Tên đăng nhập này không tồn tại.');</script>";
        echo "<script>window.location.href='javascript: history.go(-1)';</script>";
        exit;
    }

    // So sánh mật khẩu đã mã hóa
    if (password_verify($password, $result['matkhau'])) {
        // Đăng nhập thành công, bắt đầu phiên làm việc
        session_start();
        $_SESSION['username'] = $result['username'];
        $_SESSION['tenkh'] = $result['tenkh'];

        // Thông báo đăng nhập thành công và chuyển hướng đến trang chính
        echo "<script>alert('Xin chào " . $username . ". Bạn đã đăng nhập thành công.');</script>";
        echo "<script>window.location.href='http://localhost:3000/index.php';</script>";
        die(); // Dừng chương trình để ngăn chặn mã lệnh tiếp theo được thực hiện
    } else {
        // Sai mật khẩu, thông báo lỗi và chuyển hướng trở lại trang trước
        echo "<script>alert('Mật khẩu không đúng.');</script>";
        echo "<script>window.location.href='javascript: history.go(-1)';</script>";
        exit;
    }
}
?>
