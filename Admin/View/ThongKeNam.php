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
$years = range(2020, 2024); // Dãy số từ 2020 đến 2024
$salesData = [];
foreach ($years as $year) {
    $salesData[$year] = $product->getSalesByYear($year);
}

// Render the chart canvas
echo '<div id="salesChartContainer"> 
        <canvas id="salesChart" width="800" height="400"></canvas>
      </div>';

// JavaScript để vẽ biểu đồ và xử lý sự kiện mouseover
// JavaScript để vẽ biểu đồ và xử lý sự kiện mouseover
echo '<script>
    var ctx = document.getElementById("salesChart").getContext("2d");
    var myChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: ' . json_encode($years) . ',
            datasets: [{
                label: "Số lượng bán",
                data: [' . implode(',', array_column($salesData, 'total_quantity')) . '],
                backgroundColor: "#3498db",
                borderColor: "#3498db",
                borderWidth: 1
            },
            {
                label: "Tổng tiền bán",
                data: [' . implode(',', array_column($salesData, 'total_amount')) . '],
                backgroundColor: "#2ecc71",
                borderColor: "#2ecc71",
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value, index, values) {
                            // Bỏ chữ "đ" khi hiển thị
                            return new Intl.NumberFormat("vi-VN", { style: "currency", currency: "VND" }).format(value);
                        }
                    }
                }
            }
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
