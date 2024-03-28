<?php

class Pagination
{
    private $conn;
    private $limit;
    private $currentPage;

    public function __construct($conn, $limit = 8)
    {
        $this->conn = $conn;
        $this->limit = $limit;
        $this->currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
    }

    public function getProducts($category = null)
    {
        $offset = ($this->currentPage - 1) * $this->limit;

        // Thêm điều kiện lọc theo danh mục
        $categoryCondition = $category ? "WHERE maloai = $category" : "";

        $query = "SELECT * FROM hanghoa $categoryCondition LIMIT $offset, $this->limit";
        $result = $this->conn->query($query);
        return $result;
    }


    public function getTotalPages()
    {
        $query = "SELECT COUNT(*) as total FROM hanghoa";
        $result = $this->conn->query($query);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $totalItems = $row['total'];
        $totalPages = ceil($totalItems / $this->limit);
        return $totalPages;
    }

    public function displayPagination($category = null)
{
    $totalPages = $this->getTotalPages();

    echo '<nav class="justify-content-center" aria-label="Page navigation example">';
    echo '<ul class="pagination">';

    // Previous button
    $prevPage = ($this->currentPage > 1) ? $this->currentPage - 1 : 1;
    echo '<li class="page-item"><a class="page-link" href="?controller=SanPham&action=index&page=' . $prevPage . '&category=' . $category . '">Previous</a></li>';

    // Page numbers
    for ($i = 1; $i <= $totalPages; $i++) {
        $activeClass = ($i == $this->currentPage) ? 'active' : '';
        // Thêm tham số danh mục vào liên kết
        echo '<li class="page-item ' . $activeClass . '"><a class="page-link" href="?controller=SanPham&action=index&page=' . $i . '&category=' . $category . '">' . $i . '</a></li>';
    }

    // Next button
    $nextPage = ($this->currentPage < $totalPages) ? $this->currentPage + 1 : $totalPages;
    echo '<li class="page-item"><a class="page-link" href="?controller=SanPham&action=index&page=' . $nextPage . '&category=' . $category . '">Next</a></li>';

    echo '</ul>';
    echo '</nav>';
}

    // Trong class Pagination


}
