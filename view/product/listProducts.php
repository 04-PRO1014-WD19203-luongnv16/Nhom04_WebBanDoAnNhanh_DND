<main class="container">
    <section class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <h1 class="fw-bold fs-5 mb-4">Danh mục</h1>
                <ul class="list-unstyled">
                    <li class="text-yellow-600 mb-2 fw-bold"><a href="#" class="text-decoration-none">Tổng hợp</a>
                    </li>
                    <li class="text-muted mb-2"><a href="#" class="text-decoration-none">Cơm trưa</a></li>
                    <li class="text-muted mb-2"><a href="#" class="text-decoration-none">Đồ ăn</a></li>
                    <li class="text-muted mb-2"><a href="#" class="text-decoration-none">Thức uống</a></li>
                    <li class="text-muted mb-2"><a href="#" class="text-decoration-none">Tráng miệng</a></li>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="row g-4">
                    <?php
                    foreach ($allProduct as $products) {
                        extract($products);
                        $linkProduct = "index.php?act=productDetails&product_id=" . $product_id;
                        $image_url = $imgPath . $product_avatar_url;
                        echo '
                            <div class="col-md-4">
                                <div class="card">
                                    <form action="index.php?act=addToCart" method="post">
                                        <a href="' . $linkProduct . '"><img src="' . $image_url . '" name="image_url" class="card-img img-fluid" alt="Product Image"></a>
                                        <div class="card-body bg-light">
                                            <h3 class="card-title fw-bold fs-5" name="product_name">' . $product_name . '</h3>
                                            <p class="card-text text-danger fs-5 mb-3" name="product_sale_price" >' . $product_sale_price . ' đ</p>
                                            <input type="submit" name="addToCart" class="btn btn-outline-dark w-100 fw-bold" value="Thêm vào giỏ hàng">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            ';
                    };
                    ?>
                </div>
                <!-- <a href="index.php?act=addToCart" class="btn btn-outline-dark w-100 fw-bold">Thêm vào giỏ hàng</a> -->

                <div class="mt-5">
                    <a href="#" class="btn btn-primary me-2">1</a>
                    <a href="#" class="btn btn-secondary me-2">2</a>
                    <a href="#" class="btn btn-secondary me-2">3</a>
                    <a href="#" class="btn btn-secondary">Next</a>
                </div>
            </div>
        </div>
    </section>