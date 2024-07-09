    <div class="container">
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
    </div>
