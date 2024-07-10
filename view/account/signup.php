<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Đăng ký tài khoản</h3>
                </div>
                <div class="card-body">
                    <form action="index.php?act=accountSignUp" method="POST">
                        <div class="mb-3">
                            <label for="signupFullName" class="form-label">Họ và tên</label>
                            <input name="full_name" type="text" class="form-control" id="signupFullName" placeholder="Nhập họ và tên">
                        </div>
                        <div class="mb-3">
                            <label for="signupEmail" class="form-label">Email</label>
                            <input name="email" type="email" class="form-control" id="signupEmail" placeholder="Nhập địa chỉ email">
                        </div>
                        <div class="mb-3">
                            <label for="signupPassword" class="form-label">Mật khẩu</label>
                            <input name="password" type="password" class="form-control" id="signupPassword" placeholder="Nhập mật khẩu">
                        </div>
                        <div class="mb-3">
                            <label for="signupPhoneNumber" class="form-label">Số điện thoại</label>
                            <input name="phone_number" type="text" class="form-control" id="signupPhoneNumber" placeholder="Nhập số điện thoại">
                        </div>
                        <div class="mb-3">
                            <label for="signupAddress" class="form-label">Địa chỉ</label>
                            <textarea name="address" class="form-control" id="signupAddress" placeholder="Nhập địa chỉ"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="signupPhoneNumber" class="form-label">Hình đại diện</label>
                            <input name="avatar_url" type="file" class="form-control" placeholder="Ảnh">
                        </div>
                        <button type="submit" class="btn btn-primary">Đăng ký</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <a href="/login">Bạn chưa đã có tài khoản? Đăng nhâp</a>
                </div>
            </div>
        </div>
    </div>
    <h3 class="text-danger">
    <?php
                if(isset($message)&&$message != ""){
                    echo $message;
                }
                if(isset($err)&&$err != ""){
                    var_dump($err);
                    die();
                    foreach($err as $e){
                        echo $e;
                    }
                }
            ?>
    </h3>
</div>