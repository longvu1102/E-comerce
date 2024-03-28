
<?php
if (!empty($comments)) {
    foreach ($comments as $comment) {
        $makh = $comment['makh'];
        $tenNguoiBL = isset($_SESSION['id']) ? $binhLuanModel->getUserInfo($makh)['tenkh'] : "Khách";

        echo '<div class="media mb-4">';
        echo '<img class="mr-3 rounded-circle" src="img/R.png" alt="Generic placeholder image">';
        echo '<div class="media-body">';
        echo "<h6 class='mt-0'>$tenNguoiBL <small class='text-muted'>- {$comment['ngaybl']}</small></h6>";
        echo "<p>{$comment['noidung']}</p>";
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "<p class='text-muted'>Chưa có bình luận.</p>";
}
?>
<style>
    .media .mr-3.rounded-circle {
    width: 50px; /* Adjust width as needed */
    height: 50px; /* Adjust height to maintain aspect ratio */
}

</style>