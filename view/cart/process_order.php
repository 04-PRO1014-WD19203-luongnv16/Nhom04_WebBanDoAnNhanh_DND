<div class="container my-5">
    <?php
    if (isset($bill) && is_array($bill)) {
        extract($bill);
    }
    ?>
    <h1 class="text-center">Xác nhận đơn hàng</h1>
    <div class="row">
        <div class="col-12">
            <h4>Thông tin đơn hàng</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Mã đơn hàng</th>
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
                            <td><?= $bill['bill_id'] ?></td>
                            <td><?= $bill['full_name'] ?></td>
                            <td><?= $bill['phone_number'] ?></td>
                            <td><?= $bill['email'] ?></td>
                            <td><?= $bill['address'] ?></td>
                            <td><?= $bill['created_datetime'] ?></td>
                            <td><?= number_format($bill['total_price']) ?>,000 VND</td>
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

            <h4>Chi tiết hóa đơn</h4>
                    <table class="table table-bordered">
                        <thead class="thead-dark">
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
                                        <td><?= $item['price'] ?>,000 VND</td>
                                        <td><?= $item['quantity'] ?></td>
                                        <td><?= $item['totalAmount'] ?>,000 VND</td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td colspan="4" class="text-end">Tổng đơn hàng:</td>
                                    <td><?= number_format($total_price) ?>,000 VND</td>
                                </tr>
                            <?php else : ?>
                                <tr>
                                    <td colspan="5" class="text-center">Giỏ hàng của bạn đang trống</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table> 

            <div class="text-center">
                <a href="index.php" class="btn btn-primary">Quay lại trang chủ</a>
            </div>
        </div>
    </div>
</div>