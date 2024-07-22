<div class="container my-5">
    <?php
    if (isset($bill) && (is_array($bill))) {
        extract($bill);
    }
    ?>
    <h1 class="text-center">Xác nhận đơn hàng</h1>
    <div class="row">
        <div class="container col-12">
            <h4>Thông tin đơn hàng</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">Mã đơn hàng</th>
                        <th scope="col">Tên khách hàng</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Email</th>
                        <th scope="col">Ngày đặt hàng</th>
                        <th scope="col">Tổng giá</th>
                        <th scope="col">Trạng thái thanh toán</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?=$bill['bill_id']?></td>
                        <td><?=$bill['user_id']?></td>
                        <td><?=$bill['full_name']?></td>
                        <td><?=$bill['email']?></td>
                        <td><?=$bill['phone_number']?></td>
                        <td><?=$bill['address']?></td>
                        <td><?=$bill['total_price']?></td>
                        <td><?= number_format($bill['total_price'] ?? 0) ?> VND</td>
                        <td>
                            <?php
                            switch ($bill['payment_status'] ?? 0) {
                                case 1:
                                    echo 'Thanh toán khi nhận hàng (COD)';
                                    break;
                                case 2:
                                    echo 'Chuyển khoản';
                                    break;
                                case 3:
                                    echo 'Chuyển khoản online';
                                    break;
                                default:
                                    echo 'Chưa xác định';
                                    break;
                            }
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>

            <h4>Chi tiết sản phẩm</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Đơn giá</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($items)) : ?>
                        <?php foreach ($items as $item) : ?>
                            <tr>
                                <td><?= htmlspecialchars($item['product_name'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td><img src="<?= htmlspecialchars($item['image_url'], ENT_QUOTES, 'UTF-8') ?>" class="img-fluid" style="max-width: 100px;"></td>
                                <td><?= number_format($item['product_sale_price']) ?> VND</td>
                                <td><?= htmlspecialchars($item['quantity'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= number_format($item['total_amount']) ?> VND</td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="5" class="text-center">Không có sản phẩm nào</td>
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