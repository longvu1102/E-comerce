<?php
include_once("Connect.php");

class GioHang
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // Hàm lấy thông tin sản phẩm từ cơ sở dữ liệu
 // Hàm lấy thông tin sản phẩm từ cơ sở dữ liệu
public function getProductInfo($productId)
{
    // Sử dụng câu lệnh chuẩn bị để tránh SQL injection
    $query = "SELECT tenhh, dongia, giamgia, hinh, size, mausac FROM hanghoa WHERE mahh = :mahh";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':mahh', $productId, PDO::PARAM_INT);
    $stmt->execute();

    // Lấy thông tin sản phẩm
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

public function updateProductQuantity($maHH, $soLuong) {
    // Chuẩn bị truy vấn SQL để cập nhật số lượng tồn của sản phẩm
    $sql = "UPDATE hanghoa SET soluongton = soluongton - :soLuong WHERE mahh = :maHH";

    try {
        // Chuẩn bị và thực thi truy vấn SQL
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':soLuong', $soLuong, PDO::PARAM_INT);
        $stmt->bindParam(':maHH', $maHH, PDO::PARAM_INT);
        $stmt->execute();
    } catch (PDOException $e) {
        // Xử lý ngoại lệ nếu có lỗi trong quá trình thực thi truy vấn
        echo "Lỗi: " . $e->getMessage();
    }
}
    function get_subTotal()
    {
        $subtotal = 0;
        // duyệt qua giỏ hàng
        foreach ($_SESSION['cart'] as $item) {
            $subtotal += $item['thanhtien'];

        }
        // định dạng tiền tệ
        $subtotal = number_format($subtotal, 2);
        return $subtotal;
    }
}
?>
