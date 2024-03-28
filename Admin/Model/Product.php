<?php
// Model/Product.php

class Product
{
    private $conn;

    // Constructor với kết nối database
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Hàm để thêm một sản phẩm mới
    public function addProduct($productData)
    {
        // Chuẩn bị các câu lệnh SQL để chèn dữ liệu vào các bảng hanghoa và cthanghoa
        $insertHangHoaQuery = "INSERT INTO `hanghoa` (`tenhh`, `dongia`, `giamgia`, `hinh`, `Nhom`, `maloai`, `dacbiet`, `soluotxem`, `ngaylap`, `mota`, `soluongton`, `mausac`, `size`) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $insertCTHangHoaQuery = "INSERT INTO `cthanghoa` (`idhanghoa` , `dongia`, `soluongton`, `hinh`, `giamgia`) 
                                VALUES (?, ?, ?, ?, ?)";

        // Bắt đầu giao dịch
        $this->conn->beginTransaction();

        try {
            // Chuẩn bị và thực thi câu lệnh để chèn dữ liệu vào bảng hanghoa
            $stmt1 = $this->conn->prepare($insertHangHoaQuery);
            $stmt1->execute([
                $productData['tenhh'],
                $productData['dongia'],
                $productData['giamgia'],
                $productData['hinh'],
                $productData['Nhom'],
                $productData['maloai'],
                $productData['dacbiet'],
                $productData['soluotxem'],
                $productData['ngaylap'],
                $productData['mota'],
                $productData['soluongton'],
                $productData['mausac'],
                $productData['size']
            ]);

            // Lấy ID cuối cùng được chèn vào bảng hanghoa
            $idHangHoa = $this->conn->lastInsertId();

            // Chuẩn bị và thực thi câu lệnh để chèn dữ liệu vào bảng cthanghoa
            $stmt2 = $this->conn->prepare($insertCTHangHoaQuery);
            $stmt2->execute([
                $idHangHoa,

                $productData['dongia'],
                $productData['soluongton'],
                $productData['hinh'], // Giả sử $productData['hinh'] giống như trong bảng hanghoa
                $productData['giamgia']
            ]);

            // Commit giao dịch
            $this->conn->commit();

            return true; // Sản phẩm được thêm thành công
        } catch (PDOException $e) {
            // Rollback giao dịch nếu có lỗi xảy ra
            $this->conn->rollBack();
            return false; // Không thêm được sản phẩm
        }
    }

    // Hàm để lấy tất cả sản phẩm
    public function getAllProducts()
    {
        $query = "SELECT `mahh`, `tenhh`, `maloai`, `soluotxem`, `ngaylap`, `mota`, `soluongton`, `mausac`, `size`, `dongia`, `giamgia`, `hinh` FROM `hanghoa`";

        // Chuẩn bị câu lệnh
        $stmt = $this->conn->prepare($query);

        // Thực thi câu lệnh
        $stmt->execute();

        // Lấy tất cả sản phẩm
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }

    // Hàm để xóa một sản phẩm
    public function deleteProduct($productId)
    {
        try {
            // Bắt đầu giao dịch
            $this->conn->beginTransaction();

            // Xóa dữ liệu từ bảng cthanghoa
            $queryCTHangHoa = "DELETE FROM `cthanghoa` WHERE `idhanghoa` = ?";
            $stmtCTHangHoa = $this->conn->prepare($queryCTHangHoa);
            $stmtCTHangHoa->execute([$productId]);

            // Xóa dữ liệu từ bảng hanghoa
            $queryHangHoa = "DELETE FROM `hanghoa` WHERE `mahh` = ?";
            $stmtHangHoa = $this->conn->prepare($queryHangHoa);
            $stmtHangHoa->execute([$productId]);

            // Commit giao dịch
            $this->conn->commit();

            // Kiểm tra xem có hàng hóa nào bị ảnh hưởng (đã xóa) trong cả hai bảng không
            if ($stmtCTHangHoa->rowCount() > 0 || $stmtHangHoa->rowCount() > 0) {
                return true; // Xóa sản phẩm và dữ liệu liên quan thành công
            } else {
                return false; // Không có hàng hóa nào bị ảnh hưởng, có thể là ID sản phẩm không tồn tại
            }
        } catch (PDOException $e) {
            // Rollback giao dịch nếu có bất kỳ lỗi nào xảy ra
            $this->conn->rollBack();
            return false; // Không xóa được sản phẩm và dữ liệu liên quan
        }
    }

    // Hàm để cập nhật một sản phẩm
    public function updateProduct($productId, $productData)
    {
        // Câu lệnh SQL để cập nhật dữ liệu sản phẩm trong bảng hanghoa
        $updateHangHoaQuery = "UPDATE `hanghoa` 
                            SET `tenhh` = ?, `dongia` = ?, `giamgia` = ?, `hinh` = ?, `Nhom` = ?, `maloai` = ?, `dacbiet` = ?, `soluotxem` = ?, `ngaylap` = ?, `mota` = ?, `soluongton` = ?, `mausac` = ?, `size` = ? 
                            WHERE `mahh` = ?";

        // Câu lệnh SQL để cập nhật dữ liệu sản phẩm trong bảng cthanghoa (giả sử idhanghoa là khóa chính)
        $updateCTHangHoaQuery = "UPDATE `cthanghoa` 
                                SET `dongia` = ?, `soluongton` = ?, `hinh` = ?, `giamgia` = ? 
                                WHERE `idhanghoa` = ?";

        // Bắt đầu giao dịch
        $this->conn->beginTransaction();

        try {
            // Chuẩn bị và thực thi câu lệnh để cập nhật dữ liệu trong bảng hanghoa
            $stmt1 = $this->conn->prepare($updateHangHoaQuery);
            $stmt1->execute([
                $productData['tenhh'],
                $productData['dongia'],
                $productData['giamgia'],
                $productData['hinh'],
                $productData['Nhom'],
                $productData['maloai'],
                $productData['dacbiet'],
                $productData['soluotxem'],
                $productData['ngaylap'],
                $productData['mota'],
                $productData['soluongton'],
                $productData['mausac'],
                $productData['size'],
                $productId
            ]);

            // Chuẩn bị và thực thi câu lệnh để cập nhật dữ liệu trong bảng cthanghoa
            $stmt2 = $this->conn->prepare($updateCTHangHoaQuery);
            $stmt2->execute([
                $productData['dongia'],
                $productData['soluongton'],
                $productData['hinh'], // Giả sử $productData['hinh'] giống như trong bảng hanghoa
                $productData['giamgia'],
                $productId
            ]);

            // Commit giao dịch
            $this->conn->commit();

            return true; // Sản phẩm được cập nhật thành công
        } catch (PDOException $e) {
            // Rollback giao dịch nếu có lỗi xảy ra
            $this->conn->rollBack();
            return false; // Không cập nhật được sản phẩm
        }
    }

    public function getTenDanhMuc($maloai)
    {
        // Chuẩn bị câu truy vấn SQL
        $query = "SELECT `tenloai` FROM `loai` WHERE `maloai` = :maloai";

        // Chuẩn bị và thực thi câu lệnh
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":maloai", $maloai);
        $stmt->execute();

        // Lấy tên danh mục từ kết quả câu lệnh
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Trả về tên danh mục
        if ($result) {
            return $result['tenloai'];
        } else {
            return null; // Trả về null nếu không tìm thấy
        }
    }
    // Hàm để thêm một danh mục mới
    public function addCategory($categoryData)
    {
        // Chuẩn bị câu lệnh SQL để chèn dữ liệu vào bảng loai
        $insertCategoryQuery = "INSERT INTO `loai` (`tenloai`) VALUES (?)";

        try {
            // Chuẩn bị và thực thi câu lệnh để chèn dữ liệu vào bảng loai
            $stmt = $this->conn->prepare($insertCategoryQuery);
            $stmt->execute([$categoryData['tenloai']]);

            // Lấy ID cuối cùng được chèn vào bảng loai
            $categoryId = $this->conn->lastInsertId();

            return $categoryId; // Trả về ID của danh mục vừa thêm
        } catch (PDOException $e) {
            return false; // Không thêm được danh mục
        }
    }
    public function getCategories()
    {
        $query = "SELECT `maloai`, `tenloai` FROM `loai`";
    
        // Chuẩn bị câu lệnh
        $stmt = $this->conn->prepare($query);
    
        // Thực thi câu lệnh
        $stmt->execute();
    
        // Lấy tất cả các loại sản phẩm
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $categories;
    }
    // Hàm để lấy sản phẩm bằng ID
    public function getProductById($productId)
    {
        $query = "SELECT * FROM `hanghoa` WHERE `mahh` = ?";

        // Chuẩn bị câu lệnh
        $stmt = $this->conn->prepare($query);

        // Gán tham số
        $stmt->bindParam(1, $productId);

        // Thực thi câu lệnh
        $stmt->execute();

        // Lấy dữ liệu sản phẩm
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        return $product;
    }

    // Hàm để lấy đường dẫn hình ảnh của sản phẩm bằng ID
    public function getProductImageById($productId)
    {
        $query = "SELECT hinh FROM hanghoa WHERE mahh = :productId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":productId", $productId);
        $stmt->execute();

        $productImage = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($productImage) {
            return $productImage['hinh'];
        } else {
            return null; // Trả về null nếu không tìm thấy đường dẫn hình ảnh
        }
    }

    // Hàm để lấy số lượng bán hàng theo sản phẩm
    public function getSalesQuantityByProduct()
    {
        $query = "SELECT hanghoa.tenhh, SUM(cthoadon1.soluongmua) AS soluong FROM hanghoa JOIN cthoadon1 ON hanghoa.mahh = cthoadon1.mahh GROUP BY hanghoa.tenhh;";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Hàm để lấy số lượng bán hàng theo tháng
    public function getSalesQuantityByMonth()
    {
        $query = "SELECT YEAR(ngaydat) AS year, MONTH(ngaydat) AS month, SUM(cthoadon1.soluongmua) AS soluong
              FROM hoadon1
              JOIN cthoadon1 ON hoadon1.masohd = cthoadon1.masohd
              GROUP BY YEAR(ngaydat), MONTH(ngaydat)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Hàm để lấy số lượng bán hàng theo quý
    public function getSalesQuantityByQuarter()
    {
        $query = "SELECT QUARTER(hoadon1.ngaydat) AS quarter, SUM(cthoadon1.soluongmua) AS soluong
                  FROM hoadon1
                  JOIN cthoadon1 ON hoadon1.masohd = cthoadon1.masohd
                  GROUP BY QUARTER(hoadon1.ngaydat)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Hàm để lấy doanh số bán hàng theo năm
    public function getSalesByYear($year)
    {
        $query = "SELECT SUM(cthoadon1.soluongmua) AS total_quantity, SUM(cthoadon1.thanhtien) AS total_amount
              FROM hoadon1
              JOIN cthoadon1 ON hoadon1.masohd = cthoadon1.masohd
              WHERE YEAR(hoadon1.ngaydat) = :year";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':year', $year, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
