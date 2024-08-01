<div class="container my-5">
    <?php
    if (isset($bill) && is_array($bill)) {
        extract($bill);
    }
    ?>
    <div class="container my-5">
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="alert alert-success" role="alert">
                <?= $_SESSION['success']; ?><br/>
                <span>Mã hóa đơn: <?= $bill['bill_code'] ?></span>
            </div>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>
    </div>

    <div class="row">
        <div class="col-12">
            <h4 class="mb-4">Thông tin đơn hàng</h4>
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Tên khách hàng</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Email</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Ngày đặt hàng</th>
                        <th scope="col">Tổng giá</th>
                        <th scope="col">Phương thức thanh toán</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($bill) && is_array($bill)) : ?>
                        <tr>
                            <td><?= $bill['full_name'] ?></td>
                            <td><?= $bill['phone_number'] ?></td>
                            <td><?= $bill['email'] ?></td>
                            <td><?= $bill['address'] ?></td>
                            <td><?= $bill['created_datetime'] ?></td>
                            <td><?= number_format($bill['total_price']) ?> VND</td>
                            <td>
                                <?php
                                switch ($bill['payment_status'] ?? 0) {
                                    case 1:
                                        echo 'Thanh toán khi nhận hàng (COD)';
                                        break;
                                    case 2:
                                        echo 'Chuyển khoản online';
                                        break;
                                    default:
                                        echo 'Chưa xác định';
                                        break;
                                }
                                ?>
                            </td>
                        </tr>
                    <?php else : ?>
                        <tr>
                            <td colspan="8" class="text-center">Thông tin đơn hàng không tồn tại</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <h4 class="mt-5 mb-4">Chi tiết hóa đơn</h4>
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Hình</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Đơn giá</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($cartItems) : ?>
                        <?php foreach ($cartItems as $item) : ?>
                            <tr>
                                <td><img src="<?= $item['img'] ?>" class="img-fluid" style="max-width: 50px;"></td>
                                <td><?= $item['name'] ?></td>
                                <td><?= number_format($item['price']) ?> VND</td>
                                <td><?= $item['quantity'] ?></td>
                                <td><?= number_format(floatval($bill['total_price'])) ?> VND</td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="4" class="text-end fw-bold">Tổng đơn hàng:</td>
                            <td class="fw-bold"><?= number_format($total_price) ?> VND</td>
                        </tr>
                    <?php else : ?>
                        <tr>
                            <td colspan="5" class="text-center">Giỏ hàng của bạn đang trống</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success mt-4" role="alert">
                    <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                </div>
                <!-- Meta refresh để tự động chuyển hướng sau 15 giây -->
                <meta http-equiv="refresh" content="15;url=index.php?act=myBill">
            <?php endif; ?>

            <div class="text-center mt-4">
                <a href="index.php" class="btn btn-primary">Quay lại trang chủ</a>
            </div>
        </div>
    </div>
</div>
