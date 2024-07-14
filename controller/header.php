<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fast Food Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        header {
            background-color: rgb(252, 252, 253);
        }
        main {
            background-color: rgb(242, 237, 243);
        }
        nav .list-group-item {
            border: none !important;
        }
        .custom-width {
    width: 20%;
}
    </style>
</head>
<body>
    <div class="d-flex flex-column flex-md-row">
        <!-- Desktop Menu -->
        <header class="d-none d-md-block p-3 flex-md-column text-dark custom-width">
            <a href="index.php" class="d-flex align-items-center mb-3 text-dark text-decoration-none">
                <img src="../view/image/z5616452484832_1f9b08fd997f2e5c540174a3ca08a95a.jpg" class="me-2 w-25 " alt="Logo">
                <span class="fs-4 text-danger">DNĐ FOOD</span>
            </a>
            <hr>
            <nav>
                <div class="list-group list-group-flush">
                    <a href="index.php" class="text-dark list-group-item list-group-item-action list-group-item-light ">
                        <i class="fas fa-home me-2"></i>
                        Dashboard
                    </a>
                    <a href="index.php?act=listAccount" class="text-dark list-group-item list-group-item-action list-group-item-light">
                        <i class="fas fa-user me-2"></i>
                        Quản lý người dùng
                    </a>
                    <!-- <div class="collapse" id="collapseOne">
                        <ul class="list-group">
                            <a href="#" class="text-dark list-group-item list-group-item-action list-group-item-light">Tùy chọn
                                1</a>
                            <a href="#" class="text-dark list-group-item list-group-item-action list-group-item-light">Tùy chọn
                                2</a>
                        </ul>
                    </div> -->
                    <a href="index.php?act=listCategory" class="text-dark list-group-item list-group-item-action list-group-item-light">
                        <i class="fas fa-list me-2"></i>
                        Quản lý danh mục
                    </a>
                    <a href="index.php?act=listProducts" class="text-dark list-group-item list-group-item-action list-group-item-light">
                        <i class="fas fa-table me-2"></i>
                        Quản lý sản phẩm
                    </a>
                    <a href="index.php?act=order" class="text-dark list-group-item list-group-item-action list-group-item-light">
                        <i class="fas fa-cart-plus me-2"></i>
                        Quản lý đơn hàng
                    </a>
                    <a href="index.php?act=comment" class="text-dark list-group-item list-group-item-action list-group-item-light">
                        <i class="fas fa-comment me-2"></i>
                        Quản lý bình luận
                    </a>
                    <a href="index.php?act=statistical" class="text-dark list-group-item list-group-item-action list-group-item-light">
                        <i class="fas fa-chart-line me-2"></i>
                        Thống kê
                    </a>
                    <a href="index.php?act=discount" class="text-dark list-group-item list-group-item-action list-group-item-light">
                        <i class="fas fa-gift me-2"></i>
                        Giảm giá
                    </a>
                </div>
            </nav>
        </header>
        <!-- Mobile Menu -->
        <header class="d-md-none  text-white p-3">
            <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
                <div class="container-fluid">
                    <div class="">
                        <a href="/" class="d-flex align-items-center  text-white text-decoration-none">
                            <img src="https://via.placeholder.com/40" class="me-2" alt="Logo">
                            <span class="fs-4">Beagle</span>
                        </a>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" href="#"><i class="fas fa-home me-1"></i> Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fas fa-user me-1"></i> Quản lý người dùng</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fas fa-list me-1"></i> Quản lý danh mục</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fas fa-table me-1"></i> Quản lý sản phẩm</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fas fa-cart-plus me-1"></i> Quản lý đơn hàng</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fas fa-comment me-1"></i> Quản lý bình luận</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fas fa-chart-line me-1"></i> Thống kê</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fas fa-gift me-1"></i> Giảm giá</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="https://via.placeholder.com/40" alt="User" width="40" height="40" class="rounded-circle me-1">
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
            </nav>
        </header>
        <main class="container-fluid flex-grow-1">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4 d-none d-md-block">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-3 mb-lg-0">
                            <!-- <li class="nav-item mt-2">
                    <a class="nav-link" href="#"><i class="fas fa-cog me-1"></i> Cài đặt</a>
                </li> -->
                            <li class="nav-item mt-2">
                                <a class="nav-link" href="#"><i class="fas fa-bell me-1"></i> Thông báo</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="https://via.placeholder.com/40" alt="User" width="40" height="40" class="rounded-circle me-1"> Tài khoản của bạn
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="../index.php">Trang người dùng</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Đăng xuất</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>