<?php
class BinhLuan
{
    private $conn;

    // Constructor with database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Function to insert a new comment
   // Function to insert a new comment
// Function to insert a new comment
public function insertComment($mahh, $makh, $noidung)
{
    $query = "INSERT INTO binhluan1 (mahh, makh, ngaybl, noidung) VALUES (:mahh, :makh, CURDATE(), :noidung)";
    $stmt = $this->conn->prepare($query);

    // Bind parameters
    $stmt->bindParam(':mahh', $mahh);
    $stmt->bindParam(':makh', $makh);
   
    $stmt->bindParam(':noidung', $noidung);

    // Execute query
    if ($stmt->execute()) {
        return true; // Comment inserted successfully
    } else {
        return false; // Failed to insert comment
    }
}



    // Function to retrieve and display comments for a specific product
    public function getComments($mahh)
    {
        $query = "SELECT * FROM binhluan1 WHERE mahh = :mahh ORDER BY ngaybl DESC";
        $stmt = $this->conn->prepare($query);

        // Bind parameter
        $stmt->bindParam(':mahh', $mahh);

        // Execute query
        $stmt->execute();

        // Fetch all comments
        $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $comments;
    }

    // Add a method to retrieve comments for a specific user (optional)
    public function getCommentsByUser($makh)
    {
        $query = "SELECT * FROM binhluan1 WHERE makh = :makh ORDER BY ngaybl DESC";
        $stmt = $this->conn->prepare($query);

        // Bind parameter
        $stmt->bindParam(':makh', $makh);

        // Execute query
        $stmt->execute();

        // Fetch all comments
        $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $comments;
    }
    public function getUserInfo($makh)
    {
        $query = "SELECT tenkh FROM khachhang1 WHERE makh = :makh";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':makh', $makh, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
