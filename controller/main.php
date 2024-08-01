<!-- Main content -->
<!-- <main class="container-fluid flex-grow-1">
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4 d-none d-md-block">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-3 mb-lg-0">
                    <li class="nav-item mt-2">
                        <a class="nav-link" href="#"><i class="fas fa-bell me-1"></i> Thông báo</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://via.placeholder.com/40" alt="User" width="40" height="40"
                                class="rounded-circle me-1"> Tài khoản của bạn
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Trang người dùng</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Đăng xuất</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav> -->
    <!-- Dashboard cards -->
    <div class="container my-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Thông kê dữ liệu giao dịch</h5>
                        <p class="card-text">Tổng số giao dịch: 27</p>
                        <p class="card-text">Đang chờ xử lý: 22</p>
                        <p class="card-text">Số giao dịch đã xử lý: 5</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Dữ liệu</h5>
                        <p class="card-text">Tổng số sản phẩm: 17</p>
                        <p class="card-text">Tổng số bài viết: 5</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Doanh thu</h5>
                        <p class="card-text">Đã thanh toán: 162 VND</p>
                        <p class="card-text">Đang chờ xử lý: 1,593,200 VND</p>
                    </div>
                </div>
            </div>
        </div>
        <h2 class="mt-5">Danh sách giao dịch</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Phone</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Ngày tạo</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>11</td>
                    <td>nguyễn văn được</td>
                    <td>admin@gmail.com</td>
                    <td>Hà Nội</td>
                    <td>01659020898</td>
                    <td>30đ</td>
                    <td><span class="badge bg-success">Đã thanh toán</span></td>
                    <td>2017-10-07 15:32:01</td>
                    <td>
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
                <!-- More rows as needed -->
            </tbody>
        </table>
    </div>

<!-- </main> -->