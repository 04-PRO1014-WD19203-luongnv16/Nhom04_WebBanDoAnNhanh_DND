<main class="w-100 d-f f-d">

    <div class="row">
        <div class="row formtitle">
            <h1>THỐNG KÊ SẢN PHẨM BÁN CHẠY</h1>
        </div>

        <div class="search_list-product-admin w-100">
            <form style="line-height:30px; display:flex;padding:12px;margin-bottom: 20px;" action="index.php?act=sp_ban_chay" method="post">
                <div style="margin-right: 10px;">
                    <label for="">Thời Gian</label><br>
                    <select name="chon_ngay" id="">
                        <option value="0" <?php echo isset($time_period) && $time_period == 0 ? 'selected' : ''; ?>>Tất Cả Ngày</option>
                        <option value="7" <?php echo isset($time_period) && $time_period == 7 ? 'selected' : ''; ?>>7 Ngày Trước</option>
                        <option value="14" <?php echo isset($time_period) && $time_period == 14 ? 'selected' : ''; ?>>14 Ngày Trước</option>
                        <option value="30" <?php echo isset($time_period) && $time_period == 30 ? 'selected' : ''; ?>>30 Ngày Trước</option>
                        <option value="60" <?php echo isset($time_period) && $time_period == 60 ? 'selected' : ''; ?>>60 Ngày Trước</option>
                        <option value="90" <?php echo isset($time_period) && $time_period == 90 ? 'selected' : ''; ?>>90 Ngày Trước</option>
                    </select>
                </div>
                <div style="margin-right: 10px;">
                    <label for="">Ngày bắt đầu</label><br>
                    <input type="date" name="start_date" value="<?php echo isset($start_date) ? $start_date : ''; ?>">
                </div>
                <div style="margin-right: 10px;">
                    <label for="">Ngày kết thúc</label><br>
                    <input type="date" name="end_date" value="<?php echo isset($end_date) ? $end_date : ''; ?>">
                </div>
                <div>
                    <br>
                    <input style="height:20px; padding:5px 10px;background:rgb(32, 169, 255);border: none;border-radius:4px; color:white;" type="submit" value="Lọc" name="done_date">
                </div>
            </form>
            <table class="w-100 table_bill-admin">
                <thead>
                    <tr class="maloai">
                        <th class="th_sp">STT</th>
                        <th class="th_sp">TÊN SẢN PHẨM</th>
                        <th class="th_sp">TÊN DANH MỤC</th>
                        <th class="th_sp">GIÁ BÁN</th>
                        <th class="th_sp">SỐ LƯỢNG BÁN</th>
                        <th class="th_sp">TỔNG TIỀN</th>
                        <th class="th_sp">NGÀY</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($_sp_ban_chay)) : ?>
                        <?php $count = 1;
                        foreach ($_sp_ban_chay as $value) : ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo htmlspecialchars($value['name']); ?></td>
                                <td><?php echo htmlspecialchars($value['tendanhmuc']); ?></td>
                                <td><?php echo number_format($value['price']); ?> VNĐ</td>
                                <td><?php echo $value['quantity']; ?></td>
                                <td><?php echo number_format($value['tongtien']); ?> VNĐ</td>
                                <td><?php echo htmlspecialchars($value['order_date']); ?></td>
                            </tr>
                        <?php $count++;
                        endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="7">Không có dữ liệu</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <table class="w-100 table_bill-admin">
                <thead>
                    <tr class="maloai">
                        <th class="th_sp">Tổng Sản Phẩm Bán Được</th>
                        <th class="th_sp">Tổng Tiền Nhận</th>
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
            <!-- Biểu đồ -->
            <div class="canvas-chart" style="margin-top: 100px;">
                <canvas id="myChart" style="width:100%;max-width: 80%;height: 350px;"></canvas>
            </div>
        </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var xValues = [50, 60, 70, 80, 90, 100, 110, 120, 130, 140];
    var yValues = [7, 8, 8, 9, 9, 9, 10, 11, 14, 14];

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