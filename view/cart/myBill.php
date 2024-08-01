<div class="container">
    <h3>Đơn hàng của bạn</h3>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th scope="col">Mã đơn hàng</th>
                <th scope="col">Ngày đặt</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Tổng giá trị</th>
                <th scope="col">Tình trạng</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (is_array($listBill) && count($listBill) > 0) :
                foreach ($listBill as $bill) :
                    $bill_id = $bill['bill_id'];
                    $countSp = loadone_cart_count($bill_id);
                    $ttdh = get_status_label($bill['bill_status']);
            ?>
                    <tr>
                        <td><?= $bill['bill_code'] ?></td>
                        <td><?= $bill['created_datetime'] ?></td>
                        <td><?= $countSp ?></td>
                        <td><?= number_format($bill['total_price']) ?>,000 VND</td>
                        <td><?= $ttdh ?></td>
                        <td>
                            <div class="d-flex">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#orderDetailsModal" data-bill-id="<?= $bill_id ?>">
                                    Chi tiết đơn hàng
                                </button>
                                <!-- Nếu đơn hàng là đơn hàng mới thì xóa đc -->
                                <?php
                                $ttdh = get_status_label($bill['bill_status']);
                                if ($ttdh == 'Đơn hàng mới') {
                                ?>
                                    <a class="btn btn-danger bg-danger" href="index.php?act=deleteOrder&bill_id=<?= urlencode($bill_id) ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?');">Hủy</a>
                                <?php } ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach;
            else : ?>
                <tr>
                    <td colspan="6" class="text-center">Thông tin đơn hàng không tồn tại</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<div class="modal fade" id="orderDetailsModal" tabindex="-1" aria-labelledby="orderDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderDetailsModalLabel">Chi tiết đơn hàng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <h4>Chi tiết đơn hàng</h4>
                    <p>ID: <?= htmlspecialchars($bill['bill_id']) ?></p>
                    <p>giá: <?= number_format($bill['total_price']) ?> 000 VND</p>
                    <p>ngày đặt: <?= htmlspecialchars($bill['created_datetime']) ?></p>
                    <p>Trạng thái: <?= htmlspecialchars($bill['bill_status']) ?></p>

                    <h4>Products in Order</h4>
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Tên Sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Số Lượng</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($cartItems) : ?>
                                <?php foreach ($cartItems as $item) : ?>
                                    <tr>
                                        <td><img src="<?= htmlspecialchars($item['image_url']) ?>" class="img-fluid" style="max-width: 50px;"></td>
                                        <td><?= htmlspecialchars($item['product_name']) ?></td>
                                        <td><?= number_format($item['product_sale_price']) ?> VND</td>
                                        <td><?= htmlspecialchars($item['quantity']) ?></td>
                                        <td><?= number_format($item['product_sale_price'] * $item['quantity']) ?> VND</td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="5" class="text-center">No products found in this order.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>