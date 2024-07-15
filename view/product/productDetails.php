<main>
    <div class="container">
        <!-- Product Details Section -->
        <section class="container mt-5">
            <div class="row mb-5">
                <?php
                echo '
                    <h3 class="text-center mb-4">Chi tiết sản phẩm</h3>
                    <div class="col-md-4 mt-4">
                        <div class="col-12">
                            <img src="' . $imgPath . $product_avatar_url . '" class="card-img img-fluid w-100 rounded" alt="Product Image">
                        </div>
                    </div>
                    <div class="col-md-8 mt-3 mb-4">
                        <h1 class="h4 font-bold">' . $product_name . '</h1>
                        <div class="text-danger h4 font-bold mb-3">' . $product_sale_price . ' đ</div>
                        <p class="text-secondary">Sake</p>
                        <div class="d-flex gap-3 mb-3 align-items-stretch">
                            <div class="input-group" style="width: auto;">
                                <button class="btn btn-outline-secondary" id="decrement">-</button>
                                <input type="number" id="quantity" value="1" class="form-control text-center" style="width: 80px;">
                                <button class="btn btn-outline-secondary" id="increment">+</button>
                            </div>
                            <a href="./cart.html" class="btn btn-warning text-white d-flex align-items-center justify-content-center">
                                Thêm vào giỏ hàng
                            </a>
                        </div>
                        <hr>
                        <div class="text-secondary small">
                            <p><strong>Mã sản phẩm:</strong> ' . $product_id . '</p>
                            <p><strong>Danh mục:</strong> ' . $category_name . '</p>
                        </div>
                ';
                ?>
            </div>
            </div>
            <script>
                document.getElementById('decrement').addEventListener('click', function() {
                    var quantityInput = document.getElementById('quantity');
                    var currentValue = parseInt(quantityInput.value);
                    if (currentValue > 1) {
                        quantityInput.value = currentValue - 1;
                    }
                });

                document.getElementById('increment').addEventListener('click', function() {
                    var quantityInput = document.getElementById('quantity');
                    var currentValue = parseInt(quantityInput.value);
                    quantityInput.value = currentValue + 1;
                });
            </script>
        </section>

        <!-- Product Description and Reviews Tabs -->
        <section class="container mt-5">
            <?php
            echo '<div class="border-bottom mb-4">
                <nav class="nav nav-pills">
                    <a class="nav-link active" id="tab-description" href="#description">Mô tả</a>
                    <a class="nav-link" id="tab-reviews" href="#reviews">Đánh giá</a>
                </nav>
                </div>
                <div id="description" class="tab-content active">
                    <p class="text-secondary mt-3">' . $product_description . '</p>
                    <div class="row mt-4">
                        <!-- demo mô tả ở đây -->
                    </div>
                </div>
                <div id="reviews" class="tab-content" style="display: none;">
                    <p class="text-secondary mt-3">Đánh giá sản phẩm</p>
                    <!-- Nội dung đánh giá -->
                </div>'
            ?>
            <script>
                document.getElementById('tab-description').addEventListener('click', function(event) {
                    event.preventDefault();
                    document.getElementById('description').style.display = 'block';
                    document.getElementById('reviews').style.display = 'none';
                    document.getElementById('tab-description').classList.add('active');
                    document.getElementById('tab-reviews').classList.remove('active');
                });

                document.getElementById('tab-reviews').addEventListener('click', function(event) {
                    event.preventDefault();
                    document.getElementById('description').style.display = 'none';
                    document.getElementById('reviews').style.display = 'block';
                    document.getElementById('tab-description').classList.remove('active');
                    document.getElementById('tab-reviews').classList.add('active');
                });
            </script>
        </section>

        <!-- Similar Products Section -->
        <section class="container mt-5 mb-5">
            <h2 class="text-center font-semibold display-5 mb-5">Sản phẩm tương tự</h2>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <?php
                foreach ($similarProduct as $product) {
                    extract($product);
                    $linkProduct = "index.php?act=productDetails&product_id=" . $product_id;
                    echo '<div class="col">
                    <div class="card h-100 shadow-sm">
                        <a href="' . $linkProduct . '"><img src="' . $imgPath . $product_avatar_url . '" class="card-img img-fluid rounded-top" alt="Product Image"></a>
                                        <div class="card-body bg-light">
                                            <h3 class="card-title fw-bold fs-5">' . $product_name . '</h3>
                                            <p class="card-text text-muted mb-2">30.000</p>
                                            <p class="card-text text-danger fs-5 mb-3">' . $product_sale_price . ' đ</p>
                                            <a href="index.php?act=productDetails" class="btn btn-outline-dark w-100 fw-bold">Thêm vào giỏ hàng</a>
                                    </div>
                                </div>
                </div>';
                };
                ?>
            </div>
        </section>
    </div>
</main>
