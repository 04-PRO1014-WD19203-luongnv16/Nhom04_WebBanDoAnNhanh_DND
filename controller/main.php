<?php
$donHang = tk_don(); // Hàm này lấy thống kê đơn hàng
$doanhThu = tongdoanhthu(); // Hàm này lấy tổng doanh thu
$sanPhamBanChay = sp_ban_chay(); // Hàm này lấy top sản phẩm bán chạy
$tong_huy = $donHang[0]['tong_don_5'] + $donHang[0]['tong_don_6'];

$sanPhamBanChay = sp_ban_chay();
var_dump($sanPhamBanChay);

?>
<div class="container mt-5">
    <h1 class="mb-4">Thống kê Bán Hàng</h1>
    
    <!-- Thống Kê Đơn Hàng -->
    <div class="mb-4">
        <h2>#1. Thống Kê Đơn Hàng</h2>
        <div class="d-flex justify-content-between">
            <button class="btn btn-secondary">Chờ Xác Nhận <span class="badge bg-light text-dark"><?= $donHang[0]['tong_don_0'] ?></span></button>
            <button class="btn btn-secondary">Đã Xác Nhận <span class="badge bg-light text-dark"><?= $donHang[0]['tong_don_1'] ?></span></button>
            <button class="btn btn-secondary">Đang Giao Hàng <span class="badge bg-light text-dark"><?= $donHang[0]['tong_don_2'] ?></span></button>
            <button class="btn btn-success">Giao Hàng Thành Công <span class="badge bg-light text-dark"><?= $donHang[0]['tong_don_3'] ?></span></button>
            <button class="btn btn-danger">Giao Hàng Thất Bại <span class="badge bg-light text-dark"><?= $donHang[0]['tong_don_4'] ?></span></button>
            <button class="btn btn-dark">Hủy <span class="badge bg-light text-dark"><?= $tong_huy ?></span></button>
            <!-- <button class="btn btn-dark">Hủy (khác hàng)<span class="badge bg-light text-dark"><?= $donHang[0]['tong_don_6'] ?></span></button> -->
        </div>
    </div>

    <!-- Thống Kê Doanh Thu -->
    <div class="mb-4">
        <h2>#2. Thống Kê Doanh Thu</h2>
        <p>Doanh Thu: <?= number_format($doanhThu[0]['tong_tong_gia'], 0, ',', '.') ?> VNĐ</p>
        <p>Số đơn: <?= $donHang[0]['tong_don_7'] ?> đơn</p>
        <div class="d-flex justify-content-between">
            <div class="bg-light p-3" style="flex: 1; margin-right: 10px;">Chart Placeholder</div>
            <div class="bg-light p-3" style="flex: 1; margin-left: 10px;">
                <div class="d-flex justify-content-between">
                    <p>Theo Tháng</p>
                    <select class="form-select form-select-sm" style="width: auto;">
                        <option>07/2024</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

<!-- Top 5 Sản Phẩm Doanh Thu Cao Nhất -->
<div class="mb-4">
    <h2># Top 5 Sản Phẩm Doanh Thu Cao Nhất</h2>
    <div class="list-group">
        <?php foreach ($sanPhamBanChay as $sanPham) : ?>
            <div class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <p><?= htmlspecialchars($sanPham['product_name'] ?? 'Không có tên sản phẩm') ?></p>
                    <p class="text-muted"><?= htmlspecialchars($sanPham['product_id'] ?? 'Không có ID') ?></p>
                </div>
                <p><?= number_format($sanPham['tongtien'] ?? 0, 0, ',', '.') ?> VNĐ</p>
            </div>
        <?php endforeach; ?>
    </div>
</div>


    <!-- Top 5 Sản Phẩm Bán Chạy Nhất -->
    <div>
        <h2># Top 5 Sản Phẩm Bán Chạy Nhất</h2>
        <div class="list-group">
            <?php foreach ($sanPhamBanChay as $sanPham) : ?>
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <p><?= htmlspecialchars($sanPham['product_name']) ?></p>
                        <p class="text-muted"><?= htmlspecialchars($sanPham['product_id']) ?></p>
                    </div>
                    <p><?= htmlspecialchars($sanPham['quantity']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
