<div class="mt-5 text-center">
    <h2 class="text-center">Kết Quả Tìm Kiếm </h2>
    <div class="row">
        <?php
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="col-lg-3 col-md-4 mb-4">';
                echo '<div class="card text-center">';
                echo '<a href="?controller=SanPhamChiTiet&action=SanPhamChiTiet&mahh=' . $row['mahh'] . '" style="text-decoration: none;color: inherit;">';
                echo '<button class="btn btn-danger btn-new border-rounded-circle" id="may4" value="lap 4">New</button>';
                echo '<img src="uploads/' . $row['hinh'] . '" class="card-img-top" alt="Product Image">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row['tenhh'] . '</h5>';

                // Kiểm tra nếu có giảm giá
                if (isset($row['giamgia']) && $row['giamgia'] != 0) {
                    // Hiển thị giảm giá
                    echo '<p class="card-text" style="color: red;">Giảm Giá: ' . $row['giamgia'] . '<sup><u>đ</u></sup></p>';
                    // Hiển thị giá gốc
                    echo '<p class="card-text">Giá Gốc: ' . $row['dongia'] . '<sup><u>đ</u></sup></p>';
                    // Hiển thị giá sau khi giảm giá
                    echo '<p class="card-text">Giá: ' . ($row['dongia'] - $row['giamgia']) . '<sup><u>đ</u></sup></p>';
                } else {
                    // Hiển thị giá gốc nếu không có giảm giá
                    echo '<p class="card-text">Giá: ' . $row['dongia'] . '<sup><u>đ</u></sup></p>';
                }

                echo '</div>';
                echo '</a>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            // Hiển thị thông báo khi không có sản phẩm được tìm thấy
            echo '<div class="text-center mt-5"><p>Không có sản phẩm nào được tìm thấy.</p></div>';
        }
        ?>
    </div>
</div>
