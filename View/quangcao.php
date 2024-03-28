<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đếm ngược đến Tết Nguyên Đán</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
        @keyframes moveUpDown {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-5px);
            }
        }

        .tet_dem {
            height: 10px;
            width: 10px;
            border: 2px solid #dc3545;
            border-radius: 100%;
            padding: 130px;
            margin-left: 130px;
            margin-bottom: 20px;
            background-color: #ffcccb;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            animation: moveUpDown 1s infinite;
            background-image: url('./Content/img/hoadao.png'); /* Thêm hình ảnh nền cherry-blossom */
            background-size: cover; /* Đảm bảo hình ảnh kích thước đúng */
        }

        .tet {
            color: #dc3545;
            font-weight: bold;
            font-size: 50px;
            font-style: italic;
            animation: moveUpDown 1s infinite;
        }

        .tet_dem h3 {
            text-align: center;
            font-weight: bold;
            font-size: 30px;
            margin: 0;
        }

        .tet_dem h2 {
            font-size: 40px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container-fluid col-lg-12 text-center mt-5">
        <div class="row">
            <h2 class="tet">Đếm ngược đến Tết Nguyên Đán cùng Laptop Long Vũ !!!</h2>
            <div class="tet_dem col-lg-3">
                <h2>Ngày</h2>
                <h3 class="day" id="day"></h3> 
            </div>
            <div class="tet_dem col-lg-3">
                <h2>Giờ</h2>
                <h3 class="hour" id="hour"></h3> 
            </div>
            <div class="tet_dem col-lg-3">
                <h2>Phút</h2>
                <h3 class="minute" id="minute"></h3> 
            </div>
            <div class="tet_dem col-lg-3">
                <h2>Giây</h2>
                <h3 class="second" id="second"></h3> 
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const day = document.getElementById("day");
        const hour = document.getElementById("hour");
        const minute = document.getElementById("minute");
        const second = document.getElementById("second");

        const updateTime = () => {
            const now = new Date();
            const tetDate = new Date("2024-02-10"); // Ngày Tết Nguyên Đán (sửa lại ngày nếu cần)
            const diff = tetDate - now;

            const newDay = Math.floor(diff / (1000 * 60 * 60 * 24));
            const newHour = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const newMinute = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            const newSecond = Math.floor((diff % (1000 * 60)) / 1000);

            day.innerHTML = newDay;
            hour.innerHTML = newHour;
            minute.innerHTML = newMinute;
            second.innerHTML = newSecond;

            setTimeout(updateTime, 1000);
        };

        updateTime();
    </script>
</body>
</html>
