<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                <h2 class="">Đăng nhập</h2>
                </div>
                <div class="card-body">
                    <form action="/login" method="POST">
                        <div class="mb-3">
                            <label for="loginEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="loginEmail" placeholder="Nhập địa chỉ email" required>
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" id="loginPassword" placeholder="Nhập mật khẩu" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Đăng nhập</button>

                    </form>
                </div>
                <div class="card-footer text-center">
                    <a href="/signup">Bạn chưa có tài khoản? Đăng ký</a>
                </div>
            </div>
        </div>
    </div>
</div>