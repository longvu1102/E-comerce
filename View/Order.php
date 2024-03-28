<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Xác Nhận Đơn Hàng</title>
<style>
/* CSS cho cửa sổ thông báo */
.modal {
    
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 600px;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

table {
    width: 100%;
    border-collapse: collapse;
}

table th,
table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

table th {
    background-color: #f2f2f2;
}
</style>
</head>
<body>

<!-- Cửa sổ thông báo -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div id="productInfo">
            <h3 class="text-danger text-center">Hóa Đơn</h3>
         
        </div>
    </div>
</div>

<script>
window.addEventListener('DOMContentLoaded', (event) => {
    var productInfoArray = <?php echo json_encode($productInfoArray); ?>;
    var modal = document.getElementById('myModal');
    var span = document.getElementsByClassName('close')[0];
    var productInfoDiv = document.getElementById('productInfo');

    productInfoArray.forEach(function(productInfo, index) {
        var table = document.createElement("table");
        var tableContent = "<tr><th colspan='2'>Thông tin sản phẩm " + (index + 1) + "</th></tr>";
        tableContent += "<tr><td>Tên Khách Hàng:</td><td>" + productInfo['makh'] + "</td></tr>";
        tableContent += "<tr><td>Tên Hàng Hóa:</td><td>" + productInfo['tenhh'] + "</td></tr>"; 
        tableContent += "<tr><td>Hình Ảnh:</td><td><img src='./uploads/" + productInfo['hinh'] + "' alt='" + productInfo['tenhh'] + "' style='max-width: 100px;'></td></tr>";
        tableContent += "<tr><td>Mã Sản Phẩm:</td><td>" + productInfo['productId'] + "</td></tr>";
        tableContent += "<tr><td>Số Lượng:</td><td>" + productInfo['quantity'] + "</td></tr>";
        tableContent += "<tr><td>Màu Sắc:</td><td>" + productInfo['color'] + "</td></tr>";

        table.innerHTML = tableContent;
        productInfoDiv.appendChild(table);
    });

    modal.style.display = 'block';

    span.onclick = function() {
    modal.style.display = 'none';
    window.location.href = 'http://localhost:3000/index.php?controller=Home&action=Home';
}


    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }
});
</script>

</body>
</html>
