<main>
    <section class="container max-w-screen-xl mx-auto my-4 row gx-4 gy-4">
        <div class="container my-5">
            <h2>Giỏ hàng của bạn</h2>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Hình</th>
                        <th scope="col">Sản phẩm</th>
                        <th scope="col">Đơn giá</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Thành tiền</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($cartItems) : ?>
                        <?php foreach ($cartItems as $item) : ?>
                            <tr>
                                <td><img src="<?= $item['img'] ?>" class="img-fluid" style="max-width: 50px;"></td>
                                <td><?= $item['name'] ?></td>
                                <td><?= $item['price'] ?>,000 VND</td>
                                <td>
                                    <?php if ($currentPage === 'bill') : ?>
                                        <?= $item['quantity'] ?>
                                    <?php else : ?>
                                        <form action="index.php?act=updateCartQuantity" method="post">
                                            <input type="hidden" name="idcart" value="<?= $item['index'] ?>">
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="new_quantity" value="<?= $item['quantity'] ?>" min="1" max="100" step="1">
                                            </div>
                                        </form>
                                    <?php endif; ?>
                                </td>
                                <td><?= $item['totalAmount'] ?>,000 VND</td>
                                <?php if ($currentPage !== 'bill') : ?>
                                    <td><a href="index.php?act=deleteCartProduct&idcart=<?= $item['index'] ?>" class="btn btn-danger">Xóa</a></td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="4" class="text-end">Tổng đơn hàng:</td>
                            <td><?= number_format($total_price) ?>,000 VND</td>
                        </tr>
                    <?php else : ?>
                        <tr>
                            <td colspan="6" class="text-center">Giỏ hàng của bạn đang trống</td>
                        </tr>
                    <?php endif; ?>
                    <?php if ($cartItems) : ?>
                        <tr>
                            <td colspan="6">
                               <div class="d-flex justify-content-end">
                               <form action="index.php?act=clearCart" method="post">
                                    <button type="submit" class="btn btn-danger">Xóa toàn bộ giỏ hàng</button>
                                </form>
                                <a href="index.php?act=bill" ><button type="button" class="btn btn-dark">Thanh toán</button></a>
                               </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <button class="btn btn-dark" ><a href="index.php?act=listProducts" style="color: white">Tiếp tục mua hàng</a></button>
        </div>
    </section>
</main>
