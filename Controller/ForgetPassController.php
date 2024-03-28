<?php


$conn = new PDO("mysql:host=localhost;dbname=doancuoiky;charset=utf8mb4", "root", ""); // Kết nối đến cơ sở dữ liệu

// Kiểm tra nếu người dùng nhấn nút submit trong form quên mật khẩu
if(isset($_POST['submit_email'])) {
    $email = $_POST['email']; // Lấy email từ form
    $_SESSION['email'] = array(); // Khởi tạo session để lưu thông tin email

    // Kiểm tra xem email này có tồn tại trong cơ sở dữ liệu hay không
    $kh = new user($conn); // Khởi tạo đối tượng User
    $checkemail = $kh->checkEmail($email)->rowCount(); // Sử dụng hàm checkEmail để kiểm tra email trong cơ sở dữ liệu

    if($checkemail > 0) {
        // Email tồn tại trong cơ sở dữ liệu, tiến hành gửi email
        $code = random_int(10000, 1000000); // Tạo mã code ngẫu nhiên

        // Lưu thông tin mã code và email vào session
        $item = array(
            'id' => $code,
            'email' => $email,
        );
        $_SESSION['email'][] = $item;

        // Tiến hành gửi email
        $mail = new PHPMailer();
        $mail->CharSet = "utf-8";
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->Username = "vul7896@gmail.com"; // Địa chỉ email của trang web
        $mail->Password = "pslw lvyt mlfb jzsp"; // Mật khẩu ứng dụng
        $mail->SMTPSecure = "tls";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = "587";
        $mail->From = 'vul7896@gmail.com';
        $mail->FromName = 'Nguyen Truong Vu';
        $mail->AddAddress($email, 'reciever_name');
        $mail->Subject = 'Reset Password';
        $mail->IsHTML(true);
        $mail->Body = 'Vui lòng nhập mã xác nhận để đổi mật khẩu ' . $code . '';

        if ($mail->Send()) {
            // Gửi email thành công, hiển thị thông báo và chuyển hướng đến trang reset password
            echo '<script> alert("Vui lòng kiểm tra emai;");</script>';
            include "./View/ResetPass.php";
        } else {
            // Gửi email thất bại, hiển thị thông báo lỗi và quay lại form quên mật khẩu
            echo "Mail Error - >" . $mail->ErrorInfo;
            include "./View/ForgetPass.php";
        }
    } else {
        // Email không tồn tại trong cơ sở dữ liệu, hiển thị thông báo và quay lại form quên mật khẩu
        echo '<script> alert("Địa chỉ email không tồn tại");</script>';
        include "./View/ForgetPass.php";
    }
} else {
    // Nếu không có nút submit được nhấn, mặc định hiển thị form quên mật khẩu cho người dùng
    include_once "./View/ForgetPass.php";
}
?>
