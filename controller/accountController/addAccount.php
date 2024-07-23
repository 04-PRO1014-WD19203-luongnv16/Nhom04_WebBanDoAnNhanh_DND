<!-- Form nhập liệu -->
<div class="container">
    <h2 class="text-center mt-5">Thêm tài khoản người dùng</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Nhập địa chỉ email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu" required>
        </div>
        <div class="mb-3">
            <label for="full_name" class="form-label">Họ và tên</label>
            <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Nhập họ và tên" required>
        </div>
        <div class="mb-3">
            <label for="phone_number" class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Nhập số điện thoại">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ</label>
            <textarea class="form-control" id="address" name="address" placeholder="Nhập địa chỉ"></textarea>
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Vai trò</label>
            <select class="form-control" id="role" name="role" required>
                <option value="0">Người dùng</option>
                <option value="1">Admin</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Thêm tài khoản</button>
    </form>
</div>

