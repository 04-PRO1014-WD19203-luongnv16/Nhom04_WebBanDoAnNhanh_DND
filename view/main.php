<div class="container-fluid  ">
    <!-- Top 10 sản phẩm -->
    <div class="row">
        <div class="col-md-2">
            <div id="carouselTopProducts" class="carousel slide carousel-vertical" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $topViewedProducts = getTopViewedProducts();
                    foreach ($topViewedProducts as $index => $product) :
                        $active = $first ? 'active' : '';
                        $first = false;
                    ?>
                        <div class="carousel-item <?= $active ?>">
                            <a href="index.php?act=productDetails&product_id=<?= $product['product_id'] ?>">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5><?= $product['product_name'] ?></h5>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselTopProducts" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselTopProducts" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- Slideshow -->
        <div class="col-md-8 mt-3">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./view/image/slideShow/b2.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="./view/image/slideShow/bg-4.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="./view/image/slideShow/bg3.png" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- Danh sách sản phẩm khuyến mãi -->
        <div class="col-2 mt-3">
            <div class="card">
                <div class="card-body ">
                    <h6 class="card-title ">Thực Phẩm Khuyến Mại</h6>
                    <ul class="list-group ">
                        <li class="list-group-item ">Mỹ Ý Sốt Bò Mỹ - 30,000 ₫</li>
                        <li class="list-group-item  ">Cơm Chiên Mã Lai Gà Quay - 30,000 ₫</li>
                        <li class="list-group-item ">Mì Vịt Quay Singapore - 60,000 ₫</li>
                        <li class="list-group-item ">Mì Vịt Quay & Xá Xíu</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="text-center mt-2">
    <h2>Chào Mừng Bạn Đến Với DND FOOD!</h2>
    <p>Bạn đang đói? Đừng lo đã có DND Food lo!
    </p>
</div>
<!-- main -->
<div class="container">
    <div class="col-md-12">
        <div class="row g-4">
            <?php foreach ($allProduct as $products) : ?>
                <?php
                extract($products);
                $linkProduct = "index.php?act=productDetails&product_id=" . $product_id;
                $image_url = $imgPath . $product_avatar_url;
                ?>
                <div class="col-md-4">
                    <div class="card">
                        <form action="index.php?act=addToCart" method="post">
                            <input type="hidden" name="product_id" value="<?= $product_id ?>">
                            <input type="hidden" name="product_name" value="<?= $product_name ?>">
                            <input type="hidden" name="product_sale_price" value="<?= $product_sale_price ?>">
                            <input type="hidden" name="image_url" value="<?= $product_avatar_url ?>">
                            <a href="<?= $linkProduct ?>"><img src="<?= $image_url ?>" class="card-img img-fluid" alt="Product Image"></a>
                            <div class="card-body bg-light">
                                <h3 class="card-title fw-bold fs-5"><?= $product_name ?></h3>
                                <p class="card-text text-danger fs-5 mb-3"><?= $product_sale_price ?> đ</p>
                                <input type="submit" name="add_cart" class="btn btn-outline-dark w-100 fw-bold" value="Thêm vào giỏ hàng">
                            </div>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</section>
</div>
</main>