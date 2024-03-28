<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Verification Code Form</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="text-center">
            <h1>Nhập mã xác nhận từ Email</h1>
            <p>Vui lòng kiểm tra Email của bạn và nhập mã xác nhận để tiếp tục quá trình khôi phục mật khẩu.</p>
        </div>
        <form action="Controller/ResetPass.php" method="post" class="text-center mt-4">
            <div class="form-group">
                <label for="verification_code">Mã xác nhận:</label>
                <input type="text" name="verification_code" id="verification_code" required class="form-control">
            </div>
            <button type="submit" name="submit_verification_code" class="btn btn-primary">Xác nhận</button>
        </form>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
