<?php
// Bao gồm thư viện Chart.js
echo '<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>';

// Bao gồm tệp Connect.php để thiết lập kết nối CSDL
require_once './Model/Connect.php';

// Bao gồm lớp Product
require_once './Model/Product.php';

// Tạo một phiên bản của lớp Product và truyền biến $conn
$product = new Product($conn);

// Lấy dữ liệu doanh số cho mỗi tháng
$stmt = $product->getSalesQuantityByMonth();
$chartData = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Chuẩn bị dữ liệu cho Chart.js
$productNames = [];
$salesQuantities = [];
$colors = []; // Mảng chứa các màu sắc cho từng sản phẩm

foreach ($chartData as $row) {
    // Kiểm tra xem dữ liệu có chứa cột 'month' và 'soluong' không trước khi truy cập
    if (isset($row['month']) && isset($row['soluong'])) {
        $productNames[] = 'Tháng ' . $row['month']; // Thêm chuỗi "Tháng " vào trước tên tháng
        $salesQuantities[] = $row['soluong'];
        $colors[] = '#' . substr(md5($row['month']), 0, 6); // Tạo màu sắc duy nhất cho mỗi sản phẩm
    }
}

// Render the chart canvas
echo '<div id="salesChartContainer";"> <!-- Thêm style để căn giữa -->
        <canvas id="salesChart" width="800" height="400"></canvas>
      </div>';

// JavaScript để vẽ biểu đồ pie và xử lý sự kiện mouseover
echo '<script>
    var ctx = document.getElementById("salesChart").getContext("2d");
    var myChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: ' . json_encode($productNames) . ',
            datasets: [{
                label: "Số lượng bán",
                data: ' . json_encode($salesQuantities) . ',
                backgroundColor: ' . json_encode($colors) . ', // Màu sắc của mỗi phần tử trong biểu đồ pie
                borderColor: "#ffffff", // Màu viền của mỗi phần tử trong biểu đồ pie
                borderWidth: 1
            }]
        },
        options: {
            tooltips: {
                callbacks: {
                    label: function(tooltipItem, data) {
                        var productName = data.labels[tooltipItem.index];
                        var salesQuantity = data.datasets[0].data[tooltipItem.index];
                        return productName + ": " + salesQuantity;
                    }
                }
            }
        }
    });

    // Hàm xử lý sự kiện mouseover cho mỗi phần tử trong biểu đồ pie
    document.getElementById("salesChart").addEventListener("mousemove", function(evt) {
        var activePoint = myChart.getElementsAtEventForMode(evt, "nearest", {intersect: true, axis: "x"});
        if (activePoint.length > 0) {
            var productName = myChart.data.labels[activePoint[0].index];
            var salesQuantity = myChart.data.datasets[0].data[activePoint[0].index];
            console.log(productName + ": " + salesQuantity);
            // Thực hiện các hành động khi di chuột qua một phần tử trong biểu đồ pie
        }
    });
</script>';

// CSS để tạo hiệu ứng hình tròn tại các điểm dữ liệu trong biểu đồ pie
echo '<style>

        #salesChartContainer{
            margin-left: auto;
            margin-right: auto;
        }
    .chartjs-pie-chart .chartjs-pie-point {
        background-color: #ffffff; /* Màu sắc của dấu hiệu */
        border: 2px solid #ffffff; /* Viền của dấu hiệu */
        border-radius: 50%; /* Biến dấu hiệu thành hình tròn */
        width: 8px;
        height: 8px;
    }
    #salesChar{
        margin-top:50px;
    }
</style>';
