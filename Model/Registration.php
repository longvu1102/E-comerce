<?php
// Kết nối tới CSDL bằng PDO
include_once("Connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tenkh = $_POST['tenkh'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $sodienthoai = $_POST['tel'];
    $diachi = $_POST['diachi'];

    // Kiểm tra dữ liệu và thực hiện thêm vào cơ sở dữ liệu
    if (empty($tenkh) || empty($username) || empty($password) || empty($email) || empty($diachi) || empty($sodienthoai)) {
        echo "<script>alert('Vui lòng nhập đầy đủ thông tin.'); window.location.href='javascript: history.go(-1)';</script>";
        exit;
    }

    // Mã khóa mật khẩu 
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Kiểm tra tên đăng nhập đã có người dùng chưa
    $check_username_query = "SELECT username FROM khachhang1 WHERE username=:username";
    $check_username_statement = $conn->prepare($check_username_query);
    $check_username_statement->bindParam(':username', $username);
    $check_username_statement->execute();

    if ($check_username_statement->rowCount() > 0) {
        echo "<script>alert('Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác.'); window.location.href='javascript: history.go(-1)';</script>";
        exit;
    }

    // Kiểm tra email đã có người dùng chưa
    $check_email_query = "SELECT email FROM khachhang1 WHERE email=:email";
    $check_email_statement = $conn->prepare($check_email_query);
    $check_email_statement->bindParam(':email', $email);
    $check_email_statement->execute();

    if ($check_email_statement->rowCount() > 0) {
        echo "<script>alert('Email này đã có người dùng. Vui lòng chọn Email khác.'); window.location.href='javascript: history.go(-1)';</script>";
        exit;
    }

    // Thêm thông tin thành viên vào bảng
    $insert_query = "INSERT INTO khachhang1 (tenkh, username, matkhau, email, sodienthoai, diachi) VALUES (:tenkh, :username, :hashed_password, :email, :sodienthoai, :diachi)";
    $insert_statement = $conn->prepare($insert_query);
    $insert_statement->bindParam(':tenkh', $tenkh);
    $insert_statement->bindParam(':username', $username);
    $insert_statement->bindParam(':hashed_password', $hashed_password);
    $insert_statement->bindParam(':email', $email);
    $insert_statement->bindParam(':sodienthoai', $sodienthoai);
    $insert_statement->bindParam(':diachi', $diachi);

    $insert_result = $insert_statement->execute();

    // Kiểm tra và xử lý chuyển hướng
    if ($insert_result) {
        echo "<script>alert('Quá trình đăng ký thành công. Bạn có thể đăng nhập ngay bây giờ.'); window.location.href = 'http://localhost:8080/BaiTapThucHanh/DoAnCuoiKy/index.php?controller=Login&action=Login';</script>";
    } else {
        echo "<script>alert('Có lỗi xảy ra trong quá trình đăng ký. Thử lại.'); window.location.href='javascript: history.go(-1)';</script>";
    }

    // Đóng kết nối
    $conn = null;
} else {
    // Nếu không phải là phương thức POST, xử lý theo ý bạn (hiển thị form đăng ký, ví dụ).
    // Ví dụ: header("Location: registration.php"); exit;
}
?>
