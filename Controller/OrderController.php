<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once("Model/HoaDon.php");
include_once("Model/Connect.php");
include_once("Model/GioHang.php");

$conn = Connect(); // Kết nối CSDL

$body = ''; // Khởi tạo biến $body

// Kiểm tra người dùng đã đăng nhập hay chưa
if (isset($_SESSION['username'])) {
    $makh = $_SESSION['username'];
    $hd = new HoaDon($conn); // Tạo đối tượng HoaDon
    $gioHangModel = new GioHang($conn); // Tạo đối tượng GioHang

    // Kiểm tra session 'cart' có tồn tại và có giá trị hợp lệ không
    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        
        $sohd = $hd->insertHoaDon($makh); // Thêm hóa đơn mới
        $total = 0;
        $productInfoArray = [];

        // Tạo bảng HTML để hiển thị thông tin sản phẩm trong giỏ hàng
        $body .= '<table class="border-1">';
        $body .= '<tr><th>Tên sản phẩm</th><th>Số lượng</th><th>Thành tiền</th></tr>';

        foreach ($_SESSION['cart'] as $index => $item) {
            $productId = $item['productId'];
            $quantity = $item['quantity'];
            $color = $item['color'];

            // Lấy thông tin sản phẩm từ CSDL
            $productInfo = $gioHangModel->getProductInfo($productId);
            $tenhh = $productInfo['tenhh'];
            $img = $productInfo['hinh'];

            // Tính thành tiền và tổng tiền
            if (is_numeric($productInfo['dongia'])) {
                $thanhtien = $productInfo['dongia'] * $quantity;
                $total += $thanhtien;

                // Thêm chi tiết hóa đơn cho từng sản phẩm
                $hd->insertCTHoaDon($sohd, $productId, $quantity, $color, $productInfo['size'], $thanhtien, $tenhh);

                // Thêm thông tin sản phẩm vào mảng $productInfoArray
                $productInfoArray[] = array(
                    'tenhh' => $tenhh,
                    'hinh' => $img,
                    'makh' => $makh,
                    'productId' => $productId,
                    'quantity' => $quantity,
                    'color' => $color
                );

                // Thêm thông tin sản phẩm vào nội dung email
                $body .= '<tr><td>' . $tenhh . '</td><td>' . $quantity . '</td><td>' . $thanhtien . '</td></tr>';
                
                // Giảm số lượng tồn trong CSDL
                $gioHangModel->updateProductQuantity($productId, $quantity);
            } else {
                // Xử lý khi giá trị không hợp lệ
                echo 'Lỗi: Giá trị không hợp lệ. Product ID: ' . $productId;
            }
        }

        $body .= '</table>';
        $body .= '<p><strong>Tổng tiền:</strong> ' . $total . '</p>';

        // Cập nhật tổng tiền cho hóa đơn
        $hd->updateTongTien($sohd, $makh, $total);

        // Xóa giỏ hàng sau khi đã thanh toán
        unset($_SESSION['cart']);

        // Gán mã số hóa đơn vào session
        $_SESSION['masohd'] = $sohd;

        // Gửi email thông báo mua hàng
        $mail = new PHPMailer();
        $mail->CharSet = "utf-8";
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->Username = "vul7896@gmail.com"; // Email của bạn
        $mail->Password = "pslw lvyt mlfb jzsp"; // Mật khẩu của bạn
        $mail->SMTPSecure = "tls";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = "587";
        $mail->From = 'vul7896@gmail.com';
        $mail->FromName = 'Long Vũ Shop';
        $mail->AddAddress("vul7896@gmail.com", 'Người nhận'); // Thay thế "Người nhận" bằng tên người nhận bạn mong muốn
        $mail->Subject = 'Thông báo mua hàng'; // Chủ đề của email
        $mail->IsHTML(true);
        $mail->Body = '<style>.border-1 { border: 1px solid black; }</style>Cảm ơn bạn đã mua hàng của chúng tôi. Dưới đây là thông tin chi tiết đơn hàng của bạn:<br>' . $body;

        if ($mail->Send()) {
            // Gửi email thành công
            echo '<script>alert("Email thông báo mua hàng đã được gửi.");</script>';
        } else {
            // Gửi email thất bại
            echo "Lỗi: " . $mail->ErrorInfo;
        }

        // Hiển thị trang xác nhận đơn hàng
        include_once("View/Order.php");
    } else {
        // Xử lý khi session 'cart' không tồn tại hoặc không phải là mảng
        // Nội dung xử lý ở đây
    }
} else {
    // Xử lý khi $_SESSION['username'] không tồn tại
    echo 'Lỗi: Chưa đăng nhập.';
}
?>
<script>
    // Cập nhật số lượng sản phẩm trong giỏ hàng về 0
    document.getElementById('cartCount').innerHTML = '(0)';
</script>