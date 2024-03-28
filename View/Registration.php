<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang đăng ký thành viên</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Font Awesome CDN for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-yVjzK1ERNCEuwffbJsU8IvEF41iS9L5f8ViL++M46E3h5O4K5z2PyT+F5F9LhX1N" crossorigin="anonymous">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 4%;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        #togglePassword {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container mt-4 mb-5">
        <h1>Trang đăng ký thành viên</h1>
        <form action="Model/Registration.php" method="POST">
            <div class="form-group row">
                <label for="tenkh" class="col-sm-2 col-form-label">Tên khách hàng:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="tenkh" name="tenkh" placeholder="Nhập tên của bạn" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">Tên đăng nhập:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Nhập tên đăng nhập" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Mật khẩu:</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu" required>
                        <div class="input-group-append">
                            <button class="btn btn-outline-light" type="button" id="togglePassword">
                                <i class="fas fa-eye-slash" style="color: #000000;"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Nhập địa chỉ email" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="tel" class="col-sm-2 col-form-label">Số điện thoại</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control" id="tel" name="tel" placeholder="Nhập số điện thoại" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="diachi" class="col-sm-2 col-form-label">Địa chỉ:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="diachi" name="diachi" placeholder="Nhập địa chỉ" required>
                </div>
            </div>

            <div class="form-group mt-5">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Đăng ký</button>
                    <button type="reset" class="btn btn-secondary">Nhập lại</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- JavaScript để ẩn/hiện mật khẩu -->
    <script>
        document.getElementById("togglePassword").addEventListener("click", function () {
            togglePasswordVisibility("password", "eyeIcon");
        });

        function togglePasswordVisibility(inputId, eyeIconId) {
            var passwordInput = document.getElementById(inputId);
            var eyeIcon = document.getElementById(eyeIconId);

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            }
        }
    </script>
</body>

</html>
