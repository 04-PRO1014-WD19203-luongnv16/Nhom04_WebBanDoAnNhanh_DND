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
                        <option value="0"><?php echo isset($_chon_ngay) ? $_chon_ngay : '' ?> Ngày Trước</option>
                        <option value="7">7 Ngày Trước</option>
                        <option value="14">14 Ngày Trước</option>
                        <option value="30">30 Ngày Trước</option>
                        <option value="60">60 Ngày Trước</option>
                        <option value="90">90 Ngày Trước</option>
                    </select>
                </div>
                <div style="margin-right: 10px;">
                    <label for="">Ngày bắt đầu</label><br>
                    <input type="date" name="start_date">    
                </div>
                <div style="margin-right: 10px;">
                    <label for="">Ngày kết thúc</label><br>
                    <input type="date" name="end_date">
                </div>
                <div>
                    <br>
                    <input style="height:20px; padding:5px 10px;background:rgb(32, 169, 255);border: none;border-radius:4px; color:white;" type="submit" value="Lọc" name="done_date" id="">
                </div>
            </form>
            <?php $count = 1; ?>
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
  <?php foreach ($_sp_ban_chay as $value) { ?>
    <tr>
      <td><?php echo $count ?></td>
      <td><?php echo isset($value['product_name']) ? $value['product_name'] : 'N/A' ?></td>
      <td><?php echo isset($value['tendanhmuc']) ? $value['tendanhmuc'] : 'N/A' ?></td>
      <td><?php echo isset($value['price']) ? number_format($value['price']) : 'N/A' ?></td>
      <td><?php echo isset($value['quantity']) ? $value['quantity'] : 'N/A' ?></td>
      <td><?php echo isset($value['tongtien']) ? number_format($value['tongtien']) : 'N/A' ?></td>
      <td><?php echo isset($value['order_date']) ? $value['order_date'] : 'N/A' ?></td>
    </tr>
  <?php $count++; } ?>
</table>

        </div>
    </div>
    <?php
    $tong_don = isset($tong_don) ? $tong_don : 0;
$tong_tien = isset($tong_tien) ? $tong_tien : 0;
?>
<table>
  <thead>
    <tr class="maloai">
      <th class="th_sp">Tổng Sản Phẩm Bán Được</th>
      <th class="th_sp">Tổng Tiền Nhận</th>
    </tr>
  </thead>
  <tr>
    <td><?php echo number_format($tong_don) ?></td>
    <td><?php echo number_format($tong_tien * 26000) ?></td>
  </tr>
</table>
    <hr>
    <!-- Biểu đồ -->
    <div class="canvas-chart" style="margin-top: 100px;">
        <canvas id="myChart" style="width:100%;max-width: 80%;height: 350px;"></canvas>
    </div>
</main>
<script>
    var xValues = [50, 60, 70, 80, 90, 100, 110, 120, 130, 140, ''];
    var yValues = [7, 8, 8, 9, 9, 9, 10, 11, 14, 14, 15];
    var zValues = [6, 6, 8, 13, 9, 9, 13, 16, 14, 14, 15];

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
            legend: { display: false },
            scales: {
                yAxes: [{ ticks: { min: 6, max: 16 } }],
            }
        }
    });
</script>
