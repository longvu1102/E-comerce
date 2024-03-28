<?php

class Product
{
    private $conn;

    // Khởi tạo đối tượng và thiết lập kết nối CSDL
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // Hàm để lấy sản phẩm đang giảm giá
    public function getDiscountedProducts()
    {
        $query = "SELECT * FROM hanghoa WHERE giamgia >= 500000 LIMIT 8  ";
        $result = $this->conn->query($query);
        return $result;
    }

    // Hàm để lấy sản phẩm mới nhất
    public function getNewestProducts()
    {
        $query = "SELECT * FROM hanghoa ORDER BY ngaylap DESC LIMIT 8";
        $result = $this->conn->query($query);
        return $result;
    }
    public function getAllProducts()
    {
        $query = "SELECT * FROM hanghoa";
        $result = $this->conn->query($query);
        return $result;
    }
    public function getProductDetail($productId)
    {
        $query = "SELECT hh.*, cthh.idmau, cthh.idsize, cthh.dongia AS dongia_cthh, cthh.soluongton, cthh.hinh AS hinh_cthh, cthh.giamgia AS giamgia_cthh
              FROM hanghoa hh
              JOIN cthanghoa cthh ON hh.mahh = cthh.idhanghoa
              WHERE hh.mahh = :mahh";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':mahh', $productId, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getAllProductsByCategory($category)
    {
        $query = "SELECT * FROM hanghoa WHERE maloai = :category";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':category', $category, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }
    public function searchProductByName($search_query) {
        $sql = "SELECT a.mahh, a.tenhh, a.hinh, a.soluotxem, a.mausac, b.dongia 
                FROM hanghoa a 
                LEFT JOIN cthanghoa b ON a.mahh = b.idhanghoa 
                WHERE LOWER(a.tenhh) LIKE LOWER(:search_query) 
                GROUP BY a.mahh 
                ORDER BY a.mahh DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':search_query', '%' . strtolower($search_query) . '%', PDO::PARAM_STR);
        $stmt->execute();
        return $stmt;
    }
    
    
    

    

    
}
