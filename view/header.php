<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fast Food</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .card-img {
            height: 180px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="container bg-light">
        <div class="row align-items-center">
            <span class="col">0987654321</span>
            <div class="col-auto">
                <a href="index.php?act=/"><img src="./view/image/z5616452484832_1f9b08fd997f2e5c540174a3ca08a95a.jpg" class="img-fluid rounded-circle" style="max-width: 50px; height: auto;" alt="logo"></a>
            </div>
            <div class="col d-flex justify-content-end">
                <?php if (isset($_SESSION['user'])) : ?>
                    <span class="me-3">Chào, <?php echo htmlspecialchars($_SESSION['user']['full_name']); ?></span>
                    <a href="index.php?act=logout" class="btn btn-outline-primary me-md-3">Đăng Xuất</a>
                <?php else : ?>
                    <a href="index.php?act=accountLogin" class="btn btn-outline-primary me-md-3">Đăng Nhập</a>
                    <a href="index.php?act=accountSignUp" class="btn btn-primary">Đăng Ký</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <header class="py-2 border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-2"></div>
                <div class="col-md-7">
                    <form class="d-flex">
                        <div class="input-group me-2">
                            <input type="search" class="form-control" placeholder="Chọn khoảng giá">
                        </div>
                        <div class="input-group me-2">
                            <input type="search" class="form-control" aria-label="Search" name="inputSearch" placeholder="Tìm kiếm">
                        </div>
                        <button class="btn btn-outline-secondary btn-danger" type="submit" name="searchProduct"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
                <div class="col-md-3 bg-light-subtle d-flex justify-content-end align-items-center">
                    <a href="#" class="d-flex align-items-center text-decoration-none">
                        <div class="ms-3">
                            <i class="fa-solid fa-cart-shopping fs-4"></i>
                            <span class="ms-2 fs-5">Giỏ hàng</span>
                        </div>
                        <div class="ms-4">
                            <span class="badge bg-primary">0</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav w-100">
                    <li class="nav-item col-2">
                        <a class="nav-link fw-bold" href="#"><i class="fa-solid fa-list-ul"></i> DANH MỤC</a>
                    </li>
                    <div class="col-8 d-flex justify-content-center">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link fw-bold" href="index.php?act=main">Trang chủ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold" href="index.php?act=listProducts">Sản phẩm</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold" href="#">Tin tức</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold" href="#">Giới Thiệu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold" href="index.php?act=contect">Liên hệ</a>
                            </li>
                        </ul>
                    </div>
                    <ul class="col-2">
                    </ul>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Your PHP and HTML content here -->

