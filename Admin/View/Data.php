<?php
header('Content-Type: application/json');
require_once("./Model/Connect.php");

$data = array();
$query = "SELECT a.tenhh, SUM(b.soluongmua) AS soluong FROM hanghoa a, cthoadon1 b WHERE a.mahh = b.mahh GROUP BY a.tenhh";
$stmt = $conn->prepare($query);

if ($stmt->execute()) {
    if ($stmt->rowCount() > 0) {
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $data[] = $row;
        }
    }
}

echo json_encode($data);
?>
