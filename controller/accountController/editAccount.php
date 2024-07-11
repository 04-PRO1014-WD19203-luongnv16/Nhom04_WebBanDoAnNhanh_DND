<?php
if (isset($user) && is_array($user)) {
    extract($user);
}
?>

<div class="container mt-5">
    <h2 class="text-center">Chỉnh sửa tài khoản</h2>
    <?php
    if (isset($message) && $message != "") {
        echo '<div class="alert alert-success">' . $message . '</div>';
    }
    ?>
    <form action="index.php?act=updateAccount" method="post" enctype="multipart/form-data">
        <input type="hidden" name="user_id" value="<?= $user_id ?>">
        <div class="mb-3">
            <label for="full_name" class="form-label">Họ và tên</label>
            <input type="text" class="form-control" id="full_name" name="full_name" value="<?= $full_name ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $email ?>" required>
        </div>
        <div class="mb-3">
            <label for="phone_number" class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?= $phone_number ?>" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="password" class="form-control" id="password" name="password" value="<?= $password ?>" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ</label>
            <input type="text" class="form-control" id="address" name="address" value="<?= $address ?>" required>
        </div>
        <div class="mb-3">
            <label for="avatar_url" class="form-label">Ảnh đại diện</label>
            <input type="file" class="form-control" id="avatar_url" name="avatar_url">
            <?php if (is_file("../upload/" . $avatar_url)): ?>
                <img src="../upload/<?= $avatar_url ?>" alt="Avatar" style="max-width: 100px;">
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
