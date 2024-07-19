<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DND Food</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: white;
            /* Màu nền trắng */
        }

        .navbar-light {
            background-color: black;
            /* Thanh điều hướng màu đen */
        }

        .navbar-light .navbar-nav .nav-link {
            color: white;
            /* Màu chữ trắng cho các liên kết trong thanh điều hướng */
        }

        .navbar-light .navbar-nav .nav-link:hover {
            color: #f8b400;
            /* Màu vàng khi hover */
        }

        .header-bg {
            background-color: #f8b400;
            /* Màu vàng cho header */
        }

        .btn-primary {
            background-color: #f8b400;
            /* Màu vàng cho nút primary */
            border-color: #f8b400;
        }

        .btn-outline-primary {
            color: black;
            border-color: black;
        }

        .btn-outline-primary:hover {
            background-color: black;
            color: white;
        }
        a{
            text-decoration: none;
        }
        

        .btn-danger {
            background-color: #f8b400;
            /* Màu vàng cho nút tìm kiếm */
            border-color: #f8b400;
        }

        .card-img {
            height: 180px;
            object-fit: cover;
        }

        .logo {
            max-width: 50px;
            height: auto;
        }

        .search-bar {
            width: 100%;
            max-width: 300px;
            /* Chiều rộng tối đa của thanh tìm kiếm */
        }

        #btn:hover {
            background-color: red;
            color: white;
        }
    </style>

    <div class="container-fluid header-bg py-2">
        <div class="row align-items-center">
            <div class="col-auto">
                <a href="index.php?act=/"><img src="./view/image/z5616452484832_1f9b08fd997f2e5c540174a3ca08a95a.jpg" class="img-fluid rounded-circle logo" alt="logo"></a>
            </div>
            <div class="col">
                <span>0987654321</span>
            </div>
            <!-- Tìm Kiếm -->
            <div class="col-md-4">
                <form method="post" action="index.php?act=searchPro" class="d-flex">
                    <input type="text" class="form-control search-bar " aria-label="Search" name="search" placeholder="Tìm kiếm">
                    <button class="btn btn-dark" type="submit" name="btn" id="btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
            <!-- Đăng Ký đăng nhập -->
            <div class="col d-flex justify-content-end">
                <?php if (isset($_SESSION['user'])) : ?>
                    <span class="me-3">Chào, <?php echo htmlspecialchars($_SESSION['user']['full_name']); ?></span>
                    <a href="index.php?act=logout" class="btn btn-outline-primary me-3">Đăng Xuất</a>
                <?php else : ?>
                    <a href="index.php?act=accountLogin" class="btn btn-outline-primary me-3">Đăng Nhập</a>
                    <a href="index.php?act=accountSignUp" class="btn btn-dark" id="btn">Đăng Ký</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav w-100">
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="#"><i class="fa-solid fa-list-ul"></i> DANH MỤC</a>
                    </li>
                    <div class="d-flex justify-content-center flex-grow-1">
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
                    <!-- giỏ hàng -->
                    <div class="col-auto mt-1">
                    <a href="index.php?act=viewCart" class="d-flex align-items-center text-decoration-none">
                        <div class="ms-3">
                            <i class="fa-solid fa-cart-shopping fs-4"></i>
                            <span class="ms-2 fs-5">Giỏ hàng</span>
                        </div>
                        <div class="ms-4">
                            <?php
                            $totalQuantity = 0;
                            if (isset($_SESSION['myCart']) && is_array($_SESSION['myCart'])) {
                                foreach ($_SESSION['myCart'] as $cart) {
                                    $totalQuantity += $cart[3]; // Giả sử số lượng sản phẩm nằm ở vị trí thứ 4 trong mảng $cart
                                }
                            }
                            ?>
                            <span class="badge bg-primary"><?= $totalQuantity ?></span>
                        </div>
                    </a>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
</head>