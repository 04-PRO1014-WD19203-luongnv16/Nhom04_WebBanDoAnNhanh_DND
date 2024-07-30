<main>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Display server-side validation errors -->
                
                <h4>Thông tin mua hàng</h4>
                <form action="index.php?act=process_order" method="POST">
                    <div class="mb-3">
                        <label for="customerName" class="form-label">Tên khách hàng</label>
                        <input type="text" class="form-control <?= isset($errors['full_name']) ? 'is-invalid' : '' ?>" id="customerName" name="full_name" value="<?= htmlspecialchars($formData['full_name']) ?>">
                        <div class="invalid-feedback"><?= $errors['full_name'] ?? '' ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="customerAddress" class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control <?= isset($errors['address']) ? 'is-invalid' : '' ?>" id="customerAddress" name="address" value="<?= htmlspecialchars($formData['address']) ?>">
                        <div class="invalid-feedback"><?= $errors['address'] ?? '' ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="customerPhone" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control <?= isset($errors['phone_number']) ? 'is-invalid' : '' ?>" id="customerPhone" name="phone_number" value="<?= htmlspecialchars($formData['phone_number']) ?>">
                        <div class="invalid-feedback"><?= $errors['phone_number'] ?? '' ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="customerEmail" class="form-label">Email</label>
                        <input type="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" id="customerEmail" name="email" value="<?= htmlspecialchars($formData['email']) ?>">
                        <div class="invalid-feedback"><?= $errors['email'] ?? '' ?></div>
                    </div>

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
                                        <td><img src="<?= htmlspecialchars($item['img']) ?>" class="img-fluid" style="max-width: 50px;"></td>
                                        <td><?= htmlspecialchars($item['name']) ?></td>
                                        <td><?= htmlspecialchars($item['price']) ?>,000 VND</td>
                                        <td><?= htmlspecialchars($item['quantity']) ?></td>
                                        <td><?= htmlspecialchars($item['totalAmount']) ?>,000 VND</td>
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

                    <div class="mb-3">
                        <label class="form-label">Chọn phương thức thanh toán</label>
                        <div class="d-flex justify-content-between">
                            <div class="form-check flex-fill text-center me-3">
                                <input class="form-check-input" type="radio" name="payment_status" id="cod" value="1" <?= $formData['payment_status'] == '1' ? 'checked' : '' ?>>
                                <label class="form-check-label" for="cod">Thanh toán khi nhận hàng (COD)</label>
                            </div>
                            <div class="form-check flex-fill text-center me-3">
                                <input class="form-check-input" type="radio" name="payment_status" id="credit_card" value="2" <?= $formData['payment_status'] == '2' ? 'checked' : '' ?>>
                                <label class="form-check-label" for="credit_card">Chuyển khoản online</label>
                            </div>
                        </div>
                        <div class="invalid-feedback d-block"><?= $errors['payment_status'] ?? '' ?></div>
                    </div>

                    <div class="text-end">
                        <button type="submit" name="checkbill" class="btn btn-success">Xác nhận đơn hàng</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12 text-end">
                <a href="index.php" class="btn btn-primary">Quay lại trang chủ</a>
                <a href="index.php?act=viewCart" class="btn btn-secondary">Xem giỏ hàng</a>
            </div>
        </div>
    </div>
</main>
