

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tài Khoản Của Bạn</title>
    <!-- Bao gồm Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-yVjzK1ERNCEuwffbJsU8IvEF41iS9L5f8ViL++M46E3h5O4K5z2PyT+F5F9LhX1N" crossorigin="anonymous">

    <!-- Thêm kiểu dáng và các phần tử head khác nếu cần -->
    <style>
        .container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .left-column {
            max-width: 400px;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="left-column">
            <!-- Hiển thị thông tin người dùng -->
            <h1>Xin chào, <?php echo $userInfo['tenkh']; ?>!</h1>
            <p>Email: <?php echo $userInfo['email']; ?></p>
            <p>Địa chỉ: <?php echo $userInfo['diachi']; ?></p>
            <p>Số điện thoại: <?php echo $userInfo['sodienthoai']; ?></p>
        </div>

        <div class="right-column">
            <!-- Biểu mẫu cập nhật thông tin người dùng -->
            <form method="post" action="index.php?controller=TaiKhoan&action=TaiKhoan">
                <div class="form-group">
                    <label for="newEmail">Email mới:</label>
                    <input type="text" class="form-control" name="newEmail" value="<?php echo $userInfo['email']; ?>">
                </div>

                <div class="form-group">
                    <label for="newAddress">Địa chỉ mới:</label>
                    <input type="text" class="form-control" name="newAddress" value="<?php echo $userInfo['diachi']; ?>">
                </div>

                <div class="form-group">
                    <label for="newPhoneNumber">Số điện thoại mới:</label>
                    <input type="text" class="form-control" name="newPhoneNumber" value="<?php echo $userInfo['sodienthoai']; ?>">
                </div>

                <div class="form-group">
                    <label for="currentPassword">Mật khẩu cũ:</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="currentPassword" id="currentPassword" required>
                        <div class="input">
                            <button class="btn " type="button" id="toggleCurrentPassword">
                                <i class="fas fa-eye-slash" id="eyeIconCurrentPassword"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="newPassword">Mật khẩu mới:</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="newPassword" id="password" required>
                        <div class="input">
                            <button class="btn " type="button" id="togglePassword">
                                <i class="fas fa-eye-slash" id="eyeIconPassword"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mb-4">Cập Nhật Thông Tin</button>
            </form>
        </div>
    </div>

    <!-- Bao gồm Bootstrap JavaScript và các thư viện khác nếu cần -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- JavaScript để ẩn/hiện mật khẩu -->
    <script>
        document.getElementById("togglePassword").addEventListener("click", function() {
            togglePasswordVisibility("password", "eyeIconPassword");
        });

        document.getElementById("toggleCurrentPassword").addEventListener("click", function() {
            togglePasswordVisibility("currentPassword", "eyeIconCurrentPassword");
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
