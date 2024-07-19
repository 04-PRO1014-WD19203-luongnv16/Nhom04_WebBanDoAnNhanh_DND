<main>
<div class="container my-5">
    <div class="row">
        <div class="col-12 text-center mb-4">
            <h1>Hóa đơn của bạn</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h4>Thông tin đặt hàng</h4>
            <form action="process_order.php" method="POST">
                <?php
                if (isset($_SESSION['user'])) {
                    $full_name = $_SESSION['user']['full_name'];
                    $email = $_SESSION['user']['email'];
                    $phone_number = $_SESSION['user']['phone_number'];
                    $address = $_SESSION['user']['address'];
                }
                ?>
                <div class="mb-3">
                    <label for="customerName" class="form-label">Tên khách hàng</label>
                    <input type="text" class="form-control" id="customerName" name="full_name" value="<?= isset($full_name) ? htmlspecialchars($full_name) : '' ?>" required>
                </div>
                <div class="mb-3">
                    <label for="customerAddress" class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" id="customerAddress" name="address" value="<?= isset($address) ? htmlspecialchars($address) : '' ?>" required>
                </div>
                <div class="mb-3">
                    <label for="customerPhone" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" id="customerPhone" name="phone_number" value="<?= isset($phone_number) ? htmlspecialchars($phone_number) : '' ?>" required>
                </div>
                <div class="mb-3">
                    <label for="customerEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="customerEmail" name="email" value="<?= isset($email) ? htmlspecialchars($email) : '' ?>" required>
                </div>

                <h4>Chi tiết hóa đơn</h4>
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Hình</th>
                            <th scope="col">Sản phẩm</th>
                            <th scope="col">Đơn giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php viewCart(); ?>
                    </tbody>
                </table>

                <div class="text-end">
                    <button type="submit" class="btn btn-success">Xác nhận đơn hàng</button>
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
