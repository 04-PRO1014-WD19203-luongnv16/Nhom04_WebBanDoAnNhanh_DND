<main class="container">
    <div class="row mb-4">
        <div class="col-12">
            <h1>Thống kê đơn hàng - <?php echo isset($_trang_thai) ? sw_chon_trang_thai($_trang_thai) : 'Tất Cả'; ?></h1>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-12">
            <form class="d-flex align-items-center" action="index.php?act=topOrder" method="post">
                <div class="me-3">
                    <label for="chon_ngay" class="form-label">Trạng Thái Đơn Hàng</label>
                    <select class="form-select" name="chon_ngay" id="chon_ngay">
                        <option value="6" <?php echo isset($_trang_thai) && $_trang_thai == 5 ? 'selected' : ''; ?>>Tất Cả</option>
                        <option value="0" <?php echo isset($_trang_thai) && $_trang_thai == 0 ? 'selected' : ''; ?>>Đơn hàng mới</option>
                        <option value="1" <?php echo isset($_trang_thai) && $_trang_thai == 1 ? 'selected' : ''; ?>>Chờ shipper lấy hàng</option>
                        <option value="2" <?php echo isset($_trang_thai) && $_trang_thai == 2 ? 'selected' : ''; ?>>Đang giao hàng</option>
                        <option value="3" <?php echo isset($_trang_thai) && $_trang_thai == 3 ? 'selected' : ''; ?>>Hoàn tất</option>
                        <option value="4" <?php echo isset($_trang_thai) && $_trang_thai == 4 ? 'selected' : ''; ?>>Hủy hàng</option>
                    </select>
                </div>
                <div class="me-3">
                    <label for="start_date" class="form-label">Ngày Bắt Đầu</label>
                    <input type="date" class="form-control" name="start_date" id="start_date" value="<?php echo isset($start_date) ? $start_date : ''; ?>">
                </div>
                <div class="me-3">
                    <label for="end_date" class="form-label">Ngày Kết Thúc</label>
                    <input type="date" class="form-control" name="end_date" id="end_date" value="<?php echo isset($end_date) ? $end_date : ''; ?>">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary mt-4" name="done_date">Lọc</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-12">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">MÃ ĐƠN HÀNG</th>
                        <th scope="col">TÊN KHÁCH HÀNG</th>
                        <th scope="col">SỐ ĐIỆN THOẠI</th>
                        <th scope="col">ĐỊA CHỈ</th>
                        <th scope="col">TRẠNG THÁI</th>
                        <th scope="col">TỔNG TIỀN</th>
                        <th scope="col">NGÀY</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    $orders_to_display = array_slice($_don_hang, 0, 10); // Lấy 10 đơn hàng đầu tiên
                    foreach ($orders_to_display as $value) {
                    ?>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php echo $value['order_code']; ?></td> <!-- Sử dụng bill_code -->
                            <td><?php echo $value['username']; ?></td>
                            <td><?php echo $value['phone_number']; ?></td>
                            <td><?php echo $value['address']; ?></td>
                            <td><?php echo sw_chon_trang_thai($value['process']); ?></td>
                            <td><?php echo number_format($value['total_amount'], 0, ',', '.'); ?> VNĐ</td>
                            <td><?php echo date('d/m/Y', strtotime($value['order_date'])); ?></td>
                        </tr>
                    <?php
                        $count++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-12">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Tổng Đơn Hàng</th>
                        <th scope="col">Tổng Tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo isset($tong_don) ? $tong_don : '0'; ?></td>
                        <td><?php echo isset($tong_tien) ? number_format($tong_tien * 26000) : '0'; ?> VNĐ</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-12">
            <div class="canvas-chart">
                <canvas id="myChart" style="width:100%;max-width: 80%;height: 350px;"></canvas>
            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var xValues = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
    var yValues = [2, 3, 5, 7, 6, 8, 12, 9, 10, 12];

    new Chart("myChart", {
        type: "line",
        data: {
            labels: xValues,
            datasets: [{
                fill: false,
                tension: 0.1,
                backgroundColor: "rgba(0,0,255,1.0)",
                borderColor: "rgb(53, 208, 247)",
                data: yValues,
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    min: 0,
                    max: 16
                }
            }
        }
    });
</script>
