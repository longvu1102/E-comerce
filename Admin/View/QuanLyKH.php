<?php
require_once './Model/Connect.php';
require_once './Model/UserModel.php';

$userModel = new UserModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['makh'])) {
    if ($userModel->deleteUser($_POST['makh'])){
        $message = "Xóa thành công!";
    }
    else {
        $message = "Xóa thất bại!";
    }
}

$users = $userModel->displayUsers();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Quản lý khách hàng</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./Content/style.css">
    <link rel="stylesheet" href="./Content/assets/css/styles.min.css">
    <style>
        /* Thêm CSS tùy chỉnh để làm cho bảng nhỏ lại một chút */
      
        .container{
            width: 80%;
            margin-right: 15px;
        }
    </style>
</head>
<body>
    <div class="container  mt-4"> <!-- Bọc nội dung trong một container để căn chỉnh và căn lề -->
        <table class="table table-sm"> <!-- Thêm class table-sm để làm cho bảng nhỏ hơn -->
            <thead>
                <tr>
                    <th>Mã KH</th>
                    <th>Tên KH</th>
                    <th>Tên đăng nhập</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Vai trò</th>
                    <th>Số điện thoại</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user['makh']; ?></td>
                        <td><?php echo $user['tenkh']; ?></td>
                        <td><?php echo $user['username']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['diachi']; ?></td>
                        <td><?php echo $user['vaitro'] == 0 ? 'Khách hàng' : 'Quản trị'; ?></td>
                        <td><?php echo $user['sodienthoai']; ?></td>
                        <td>
                            <form method="post" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                                <input type="hidden" name="makh" value="<?php echo $user['makh']; ?>">
                                <input type="submit" class="btn btn-danger btn-sm" value="Xóa">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
