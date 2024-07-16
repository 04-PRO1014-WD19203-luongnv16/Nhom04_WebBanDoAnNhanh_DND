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
                    <?php
                    $total = 0;
                    foreach ($_SESSION['myCart'] as $index => $cart) {
                        $img = $imgPath . $cart[5];
                        $totalAmount = $cart[4] * $cart[3]; // Tính tổng thành tiền cho sản phẩm này
                        $total += $totalAmount;

                        // Tạo link để xóa sản phẩm khỏi giỏ hàng
                        $deleteCartProduct = '<a href="index.php?act=deleteCartProduct&idcart=' . $index . '" class="btn btn-danger">Xóa</a>';

                        // Tạo form để cập nhật số lượng sản phẩm
                        $updateQuantityForm = '
                            <form action="index.php?act=updateCartQuantity" method="post">
                                <input type="hidden" name="idcart" value="' . $index . '">
                                <div class="input-group">
                                    <input type="number" class="form-control" name="new_quantity" value="' . $cart[3] . '" min="1" max="100" step="1">
                                </div>
                            </form>
                        ';


                        echo '
                            <tr>
                                <td><img src="' . $img . '" class="img-fluid" style="max-width: 50px;"></td>
                                <td>' . $cart[1] . '</td>
                                <td>' . number_format($cart[2]) . ',000 VND</td>
                                <td>' . $updateQuantityForm . '</td>
                                <td>' . number_format($totalAmount) . ',000 VND</td>
                                <td>' . $deleteCartProduct . '</td>
                            </tr>
                        ';
                    }
                    ?>
                    <tr>
                        <td colspan="5" class="text-end">Tổng đơn hàng:</td>
                        <td><?= number_format($total) ?>,000 VND</td>
                    </tr>
                    <tr>
                        <td colspan="6" class="text-end">
                            <form action="index.php?act=clearCart" method="post">
                                <button type="submit" class="btn btn-danger">Xóa toàn bộ giỏ hàng</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>