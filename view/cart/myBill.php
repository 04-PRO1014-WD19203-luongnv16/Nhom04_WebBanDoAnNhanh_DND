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
            if (is_array($listBill) && count($listBill) > 0):
                foreach ($listBill as $bill):
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
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#orderDetailsModal" data-bill-id="<?= $bill_id ?>">
                                Chi tiết đơn hàng
                            </button>
                            <button type="button"><a class="btn btn-danger" href="" onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này?');">Hủy đơn hàng</a></button>
                        </td>
                    </tr>
            <?php endforeach; else: ?>
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
                <div id="order-details-content">
                    <p>Mã đơn hàng: <?= $bill['bill_code'] ?> </p>
                </div>
                <div id="order-details-content">
                    <p>Hình:<img src="<?= $bill['img'] ?>" class="img-fluid" style="max-width: 50px;"> </p>
                </div>
                <div id="order-details-content">
                    <p>Tên hàng: <?= $bill['name'] ?> </p>
                </div>
                <div id="order-details-content">
                    <p>Số lượng: <?= number_format($bill['total_price']) ?>,000 VND ?> </p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
