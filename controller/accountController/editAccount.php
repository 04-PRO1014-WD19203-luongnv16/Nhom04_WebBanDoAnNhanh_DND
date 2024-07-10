    <!-- <div class="container">
        <h2 class="my-4">Cập nhật tài khoản</h2>
        <form method="post">
            <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="full_name" class="form-label">Họ và tên</label>
                <input type="text" class="form-control" id="full_name" name="full_name" value="<?= $user['full_name'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Số điện thoại</label>
                <input type="tel" class="form-control" id="phone_number" name="phone_number" value="<?= $user['phone_number'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Địa chỉ</label>
                <textarea class="form-control" id="address" name="address" rows="3" required><?= $user['address'] ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div> -->

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Xử lý dữ liệu được gửi từ form
    $userId = $_POST["user_id"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $fullName = $_POST["full_name"];
    $phoneNumber = $_POST["phone_number"];
    $address = $_POST["address"];
    // Xử lý cập nhật vào cơ sở dữ liệu (ví dụ sử dụng MySQLi)
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "database_name";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Kết nối database thất bại: " . $conn->connect_error);
    }

    // Query để cập nhật thông tin người dùng
    $sql = "UPDATE users SET email='$email', password='$password', full_name='$fullName', phone_number='$phoneNumber', address='$address' WHERE user_id=$userId";

    if ($conn->query($sql) === TRUE) {
        echo "Cập nhật thông tin người dùng thành công!";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} elseif (isset($_GET["id"])) {
    // Hiển thị form sửa thông tin người dùng
    $userId = $_GET["id"];

    // Truy vấn để lấy thông tin người dùng dựa trên user_id
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "database_name";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Kết nối database thất bại: " . $conn->connect_error);
    }

    // Query lấy thông tin người dùng
    $sql = "SELECT * FROM users WHERE user_id=$userId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Hiển thị form sửa thông tin
?>
<!-- Form nhập liệu -->
<div class="container">
    <h2 class="text-center mt-5">Sửa thông tin tài khoản người dùng</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="user_id" value="<?php echo $userId; ?>">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="password" class="form-control" id="password" name="password" value="<?php echo $row['password']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="full_name" class="form-label">Họ và tên</label>
            <input type="text" class="form-control" id="full_name" name="full_name" value="<?php echo $row['full_name']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="phone_number" class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?php echo $row['phone_number']; ?>">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ</label>
            <textarea class="form-control" id="address" name="address"><?php echo $row['address']; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật thông tin</button>
    </form>
</div>
<?php
    } else {
        echo "Không tìm thấy thông tin người dùng.";
    }
    $conn->close();
} else {
    echo "Thiếu thông tin user_id.";
}
?>

