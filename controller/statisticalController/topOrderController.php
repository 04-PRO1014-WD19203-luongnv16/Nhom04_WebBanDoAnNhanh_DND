<main class="w-100 d-f f-d">
    <div class="row">
        <div class="row formtitle">
            <h1>Thống kê đơn hàng - <?php echo isset($_trang_thai) ? sw_chon_trang_thai($_trang_thai) : 'Tất Cả'; ?></h1>
        </div>
        <div class="search_list-product-admin w-100">
            <form style="line-height:30px; display:flex; padding:12px; margin-bottom: 20px;" action="index.php?act=sellingProduct" method="post">
                <div style="margin-right: 10px;">
                    <label for="">Trạng Thái Đơn Hàng</label><br>
                    <select name="chon_ngay">
                        <option value="6" <?php echo isset($_trang_thai) && $_trang_thai == 6 ? 'selected' : ''; ?>>Tất Cả</option>
                        <option value="0" <?php echo isset($_trang_thai) && $_trang_thai == 0 ? 'selected' : ''; ?>>Tiếp Nhận Đơn</option>
                        <option value="1" <?php echo isset($_trang_thai) && $_trang_thai == 1 ? 'selected' : ''; ?>>Đang Xử Lý</option>
                        <option value="2" <?php echo isset($_trang_thai) && $_trang_thai == 2 ? 'selected' : ''; ?>>Đang Giao Hàng</option>
                        <option value="3" <?php echo isset($_trang_thai) && $_trang_thai == 3 ? 'selected' : ''; ?>>Giao Hàng Thành Công</option>
                        <option value="4" <?php echo isset($_trang_thai) && $_trang_thai == 4 ? 'selected' : ''; ?>>Đã Hủy (admin)</option>
                        <option value="5" <?php echo isset($_trang_thai) && $_trang_thai == 5 ? 'selected' : ''; ?>>Đã Hủy (khách hàng)</option>
                    </select>
                </div>
                <div style="margin-right: 10px;">
                    <label for="">Ngày Bắt Đầu</label><br>
                    <input type="date" name="start_date" value="<?php echo isset($start_date) ? $start_date : ''; ?>">
                </div>
                <div style="margin-right: 10px;">
                    <label for="">Ngày Kết Thúc</label><br>
                    <input type="date" name="end_date" value="<?php echo isset($end_date) ? $end_date : ''; ?>">
                </div>
                <div>
                    <br>
                    <input style="height:20px; padding:5px 10px; background:rgb(32, 169, 255); border:none; border-radius:4px; color:white;" type="submit" value="Lọc" name="done_date">
                </div>
            </form>
            <table class="w-100 table_bill-admin">
                <thead>
                    <tr class="maloai">
                        <th class="th_sp">STT</th>
                        <th class="th_sp">MÃ ĐƠN HÀNG</th>
                        <th class="th_sp">TÊN KHÁCH HÀNG</th>
                        <th class="th_sp">SỐ ĐIỆN THOẠI</th>
                        <th class="th_sp">ĐỊA CHỈ</th>
                        <th class="th_sp">TRẠNG THÁI</th>
                        <th class="th_sp">TỔNG TIỀN</th>
                        <th class="th_sp">NGÀY</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    foreach ($_don_hang as $value) {
                    ?>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php echo $value['order_id']; ?></td>
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
            <table class="w-100 table_bill-admin">
                <thead>
                    <tr class="maloai">
                        <th class="th_sp">Tổng Đơn Hàng</th>
                        <th class="th_sp">Tổng Tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo isset($tong_don) ? $tong_don : '0'; ?></td>
                        <td><?php echo isset($tong_tien) ? number_format($tong_tien * 26000) : '0'; ?> VNĐ</td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <div class="canvas-chart" style="margin-top: 100px;">
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
                lineTension: 0,
                backgroundColor: "rgba(0,0,255,1.0)",
                borderColor: "rgb(53, 208, 247)",
                data: yValues,
            }]
        },
        options: {
            legend: {
                display: false
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