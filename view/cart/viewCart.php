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
                    <?php viewCart(); ?>
                    <tr>
                        <td colspan="6" class="text-end">
                            <form action="index.php?act=clearCart" method="post">
                                <button type="submit" class="btn btn-danger">Xóa toàn bộ giỏ hàng</button>
                            </form>
                            <a href="index.php?act=bill"><button type="button" class="btn btn-dark">Thanh toán</button></a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button><a href="index.php?act=listProducts">Tiếp tục mua hàng</a></button>
        </div>
    </section>

