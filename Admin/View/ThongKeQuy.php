<?php
// Bao gồm thư viện Chart.js
echo '<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>';

// Bao gồm tệp Connect.php để thiết lập kết nối CSDL
require_once './Model/Connect.php';

// Bao gồm lớp Product
require_once './Model/Product.php';

// Tạo một phiên bản của lớp Product và truyền biến $conn
$product = new Product($conn);

// Lấy dữ liệu doanh số cho mỗi quý
$stmt = $product->getSalesQuantityByQuarter();
$chartData = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Chuẩn bị dữ liệu cho Chart.js
// Chuẩn bị dữ liệu cho Chart.js
$quarters = ["Quý 1", "Quý 2", "Quý 3", "Quý 4"]; // Tạo mảng chứa thông tin của cả 4 quý
$salesQuantities = [0, 0, 0, 0]; // Khởi tạo mảng số liệu với giá trị ban đầu là 0 cho mỗi quý

// Điền số liệu từ dữ liệu đã lấy từ cơ sở dữ liệu vào mảng số liệu
foreach ($chartData as $row) {
    $quarterIndex = intval($row['quarter']) - 1; // Chỉ số của quý trong mảng ($row['quarter'] trả về giá trị từ 1 đến 4)
    $salesQuantities[$quarterIndex] = $row['soluong'];
}

// Render the chart canvas
echo '<div id="salesChartContainer"> 
        <canvas id="salesChart" width="800" height="400"></canvas>
      </div>';

// JavaScript để vẽ biểu đồ và xử lý sự kiện mouseover
echo '<script>
    var ctx = document.getElementById("salesChart").getContext("2d");
    var myChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: ' . json_encode($quarters) . ',
            datasets: [{
                label: "Số lượng bán",
                data: ' . json_encode($salesQuantities) . ',
                backgroundColor: "#3498db", // Màu sắc của cột hình trụ
                borderColor: "#3498db", // Màu sắc viền của cột hình trụ
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            tooltips: {
                callbacks: {
                    label: function(tooltipItem, data) {
                        var quarter = data.labels[tooltipItem.index];
                        var salesQuantity = data.datasets[0].data[tooltipItem.index];
                        return quarter + ": " + salesQuantity;
                    }
                }
            }
        }
    });

    // Hàm xử lý sự kiện mouseover cho mỗi cột
    document.getElementById("salesChart").addEventListener("mousemove", function(evt) {
        var activePoint = myChart.getElementsAtEventForMode(evt, "nearest", {intersect: true, axis: "x"});
        if (activePoint.length > 0) {
            var quarter = myChart.data.labels[activePoint[0].index];
            var salesQuantity = myChart.data.datasets[0].data[activePoint[0].index];
            console.log(quarter + ": " + salesQuantity);
            // Thực hiện các hành động khi di chuột qua một cột, như hiển thị thông tin thêm
        }
    });
</script>';

// CSS để căn giữa biểu đồ
echo '<style>
    #salesChartContainer {
        
        margin-left: auto;
        margin-right: auto;
    }
</style>';
