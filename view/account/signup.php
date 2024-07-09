<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Đăng ký</h3>
                    </div>
                    <div class="card-body">
                        <form action="/signup" method="POST">
                        <div class="mb-3">
            <label for="signupFullName" class="form-label">Họ và tên</label>
            <input type="text" class="form-control" id="signupFullName" placeholder="Nhập họ và tên" required>
        </div>
        <div class="mb-3">
            <label for="signupEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="signupEmail" placeholder="Nhập địa chỉ email" required>
        </div>
        <div class="mb-3">
            <label for="signupPassword" class="form-label">Mật khẩu</label>
            <input type="password" class="form-control" id="signupPassword" placeholder="Nhập mật khẩu" required>
        </div>
        <div class="mb-3">
            <label for="signupPhoneNumber" class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" id="signupPhoneNumber" placeholder="Nhập số điện thoại">
        </div>
        <div class="mb-3">
            <label for="signupAddress" class="form-label">Địa chỉ</label>
            <textarea class="form-control" id="signupAddress" placeholder="Nhập địa chỉ"></textarea>
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
    </div>