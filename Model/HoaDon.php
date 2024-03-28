<?php
include_once('Connect.php');

class HoaDon
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }


    // Phương thức insert vào bảng hoadon
    public function insertHoaDon($makh)
    {
        $date = new DateTime('now');
        $ngay = $date->format('Y-m-d');
    
        try {
            // Sử dụng câu lệnh chuẩn bị để tránh SQL injection
            $query = "INSERT INTO hoadon1 (makh, ngaydat, tongtien) VALUES (:makh, :ngaydat, 0)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':makh', $makh, PDO::PARAM_INT);
            $stmt->bindParam(':ngaydat', $ngay, PDO::PARAM_STR);
            $stmt->execute();
    
            // Lấy ID cuối cùng được thêm vào
            $masohd = $this->conn->lastInsertId();
    
            return $masohd;
        } catch (PDOException $e) {
            // Xử lý ngoại lệ, ghi log lỗi, hoặc hiển thị thông báo lỗi
            die("Lỗi khi chèn dữ liệu vào hoadon1: " . $e->getMessage());
        }
    }
    // Phương thức insert vào bảng cthoadon
    public function insertCTHoaDon($masohd, $mahh, $soluongmua, $mausac, $size, $thanhtien)
    {
        try {
            $query = "INSERT INTO cthoadon1 (masohd, mahh, soluongmua, mausac, size, thanhtien, tinhtrang) 
                      VALUES (:masohd, :mahh, :soluongmua, :mausac, :size, :thanhtien, 0)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':masohd', $masohd, PDO::PARAM_INT);
            $stmt->bindParam(':mahh', $mahh, PDO::PARAM_INT);
            $stmt->bindParam(':soluongmua', $soluongmua, PDO::PARAM_INT);
            $stmt->bindParam(':mausac', $mausac, PDO::PARAM_STR);
            $stmt->bindParam(':size', $size, PDO::PARAM_INT);
            $stmt->bindParam(':thanhtien', $thanhtien, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            // Xử lý ngoại lệ, ghi log lỗi, hoặc hiển thị thông báo lỗi
            die("Lỗi khi chèn dữ liệu vào cthoadon1: " . $e->getMessage());
        }
    }
    

  // Trong class HoaDon// Trong class HoaDon
  public function getThongTinKHHD($masohd)
  {
      $query = "SELECT a.masohd, b.tenkh, a.ngaydat, b.diachi, b.sodienthoai 
                FROM hoadon1 a
                INNER JOIN khachhang1 b ON a.makh = b.makh
                WHERE a.masohd = :masohd";
  
      try {
          $stmt = $this->conn->prepare($query);
          $stmt->bindParam(':masohd', $masohd, PDO::PARAM_INT);
          $stmt->execute();
          return $stmt->fetch(PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
          // Xử lý ngoại lệ, ghi log lỗi, hoặc hiển thị thông báo lỗi
          die("Lỗi khi truy vấn thông tin khách hàng: " . $e->getMessage());
      }
  }
  


    public function getThongTinCTHD($masohd)
    {
        if ($masohd !== NULL) {
            $select = "SELECT DISTINCT a.masohd, d.tenhh, a.mausac, a.size, b.dongia, a.thanhtien, a.soluongmua
            FROM cthoadon1 a, cthanghoa b, hanghoa d WHERE a.mahh=b.idhanghoa AND b.idhanghoa=d.mahh AND a.mahh=d.mahh AND a.masohd=$masohd";
            $result = $this->conn->getList($select);
            return $result;
        } else {
            // Xử lý khi $masohd không hợp lệ
            return NULL;
        }
    }

    // Phương thức update vào bảng hoa don tổng tiền
    public function updateTongTien($masohd, $makh, $tongtien)
    {
        $query = "UPDATE hoadon1 SET tongtien=$tongtien WHERE masohd=$masohd ";
        $this->conn->exec($query);
    }
}
?>
