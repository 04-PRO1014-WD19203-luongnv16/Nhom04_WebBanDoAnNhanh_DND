<div class="container">
    <h2 class="text-center">Quản Lý Danh Sách Quản Trị</h2>
    <div class="row mb-3">
        <div class="col-6">
            <h5 class="mb-0">Danh sách quản trị</h5>
        </div>
        <div class="col-6 text-end">
            <a href="index.php?act=addAccount"><button class="btn btn-primary btn-sm">Thêm tài khoản</button></a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Mã số</th>
                    <th scope="col">Ảnh đại diện</th>
                    <th scope="col">Họ và tên</th>
                    <th scope="col">Email</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Mật khẩu</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Vai trò</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    echo "
                    <tr>
                <th scope='row'>'. $user_id . </th>
                <td>'. $email .' </td>
                <td>'. $full_name .' </td>
                <td>'. $phone_number . '</td>
                <td>'. $password .' </td>
                <td>'. $address . '</td>
                <td><img src='. $avatar_url . ' alt='Avatar' style='max-width: 50px;'></td>
                <td>'. $role .' </td>
                <td>'. $status . '</td>
                <td>
                    <a href='editAccount.php?id='. $user_id . ' class='btn btn-primary btn-sm'>Sửa</a>
                    <a href='deleteAccount.php?id='. $user_id . ' class='btn btn-danger btn-sm'>Xóa</a>
                </td>
                </tr>";
                    
                ?>
            </tbody>
        </table>
    </div>
</div>
