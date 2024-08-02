<main class="w-100 d-f f-d">
    <div class="row">
        <div class="row formtitle">
            <h1>THỐNG KÊ SẢN PHẨM BÁN CHẠY</h1>
        </div>

        <div class="search_list-product-admin w-100">
            <form style="line-height:30px; display:flex;padding:12px;margin-bottom: 20px;" action="index.php?act=sellingProduct" method="post">
                <div style="margin-right: 10px;">
                    <label for="">Thời Gian</label><br>
                    <select name="chon_ngay" id="">
                        <option value="0" <?php echo (isset($_chon_ngay) && $_chon_ngay == 0) ? 'selected' : ''; ?>>Tất Cả</option>
                        <option value="7" <?php echo (isset($_chon_ngay) && $_chon_ngay == 7) ? 'selected' : ''; ?>>7 Ngày Trước</option>
                        <option value="14" <?php echo (isset($_chon_ngay) && $_chon_ngay == 14) ? 'selected' : ''; ?>>14 Ngày Trước</option>
                        <option value="30" <?php echo (isset($_chon_ngay) && $_chon_ngay == 30) ? 'selected' : ''; ?>>30 Ngày Trước</option>
                        <option value="60" <?php echo (isset($_chon_ngay) && $_chon_ngay == 60) ? 'selected' : ''; ?>>60 Ngày Trước</option>
                        <option value="90" <?php echo (isset($_chon_ngay) && $_chon_ngay == 90) ? 'selected' : ''; ?>>90 Ngày Trước</option>
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

            <?php
            $count = 1;
            $total_quantity = 0;
            $total_amount = 0;
            ?>
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
                    <?php foreach ($_sp_ban_chay as $value) { 
                        $total_quantity += $value['quantity'];
                        $total_amount += $value['tongtien'];
                    ?>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php echo isset($value['product_name']) ? $value['product_name'] : 'N/A'; ?></td>
                            <td><?php echo isset($value['tendanhmuc']) ? $value['tendanhmuc'] : 'N/A'; ?></td>
                            <td><?php echo isset($value['price']) ? number_format($value['price']) : 'N/A'; ?></td>
                            <td><?php echo isset($value['quantity']) ? $value['quantity'] : 'N/A'; ?></td>
                            <td><?php echo isset($value['tongtien']) ? number_format($value['tongtien']) : 'N/A'; ?></td>
                            <td><?php echo isset($value['order_date']) ? $value['order_date'] : 'N/A'; ?></td>
                        </tr>
                    <?php $count++; } ?>
                </tbody>
            </table>

            <table>
                <thead>
                    <tr class="maloai">
                        <th class="th_sp">Tổng Sản Phẩm Bán Được</th>
                        <th class="th_sp">Tổng Tiền Nhận</th>
                    </tr>
                </thead>
                 <tbody>
                    <tr>
                        <td><?php echo number_format($total_quantity); ?></td>
                        <td><?php echo number_format($total_amount); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Biểu đồ -->
    <div class="canvas-chart" style="margin-top: 100px;">
        <canvas id="myChart" style="width:100%;max-width: 80%;height: 350px;"></canvas>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    <?php
    // Prepare data for the chart
    $labels = [];
    $data = [];

    foreach ($_sp_ban_chay as $value) {
        $labels[] = $value['product_name'];
        $data[] = $value['tongtien'];
    }

    // Convert PHP arrays to JSON
    $labels_json = json_encode($labels);
    $data_json = json_encode($data);
    ?>

const labels = <?php echo $labels_json; ?>;
const data = <?php echo $data_json; ?>;

new Chart("myChart", {
    type: "bar",
    data: {
        labels: labels,
        datasets: [{
            label: 'Doanh thu',
            data: data,
            backgroundColor: "rgba(0,0,255,0.5)",
            borderColor: "rgb(53, 208, 247)",
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
