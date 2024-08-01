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