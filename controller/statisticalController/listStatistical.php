<main class="container">
    <div class="row my-4">
        <div class="col">
            <h1 class="text-center">THỐNG KÊ SẢN PHẨM THEO LOẠI</h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">MÃ DANH MỤC</th>
                            <th scope="col">TÊN DANH MỤC</th>
                            <th scope="col">SỐ LƯỢNG</th>
                            <th scope="col">GIÁ CAO NHẤT</th>
                            <th scope="col">GIÁ THẤP NHẤT</th>
                            <th scope="col">GIÁ TRUNG BÌNH</th>
                            <th scope="col">TỔNG TIỀN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1;
                        foreach ($listthongke as $thongke) {
                            echo '<tr>
                                    <td>'.$count.'</td>
                                    <td>'.$thongke['madm'].'</td>
                                    <td>'.$thongke['tendm'].'</td>
                                    <td>'.$thongke['countsp'].'</td>
                                    <td>'.number_format($thongke['maxprice']).'</td>
                                    <td>'.number_format($thongke['minprice']).'</td>
                                    <td>'.number_format($thongke['avgprice']).'</td>
                                    <td>'.number_format($thongke['sumprice']).'</td>
                                  </tr>';
                            $count++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</main>
<?php
$listthongke = [
    ['madm' => 'DM01', 'tendm' => 'Electronics', 'countsp' => 10, 'maxprice' => 1000, 'minprice' => 100, 'avgprice' => 550, 'sumprice' => 5500],
    ['madm' => 'DM02', 'tendm' => 'Furniture', 'countsp' => 15, 'maxprice' => 1500, 'minprice' => 200, 'avgprice' => 850, 'sumprice' => 12750],
    // Add more data as needed
];

$categories = array_column($listthongke, 'tendm');
$quantities = array_column($listthongke, 'countsp');
$maxPrices = array_column($listthongke, 'maxprice');
$minPrices = array_column($listthongke, 'minprice');
$avgPrices = array_column($listthongke, 'avgprice');
$sumPrices = array_column($listthongke, 'sumprice');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Statistics</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<main class="container">
    <div class="row my-4">
        <div class="col">
            <h1 class="text-center">THỐNG KÊ SẢN PHẨM THEO LOẠI</h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">MÃ DANH MỤC</th>
                            <th scope="col">TÊN DANH MỤC</th>
                            <th scope="col">SỐ LƯỢNG</th>
                            <th scope="col">GIÁ CAO NHẤT</th>
                            <th scope="col">GIÁ THẤP NHẤT</th>
                            <th scope="col">GIÁ TRUNG BÌNH</th>
                            <th scope="col">TỔNG TIỀN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1;
                        foreach ($listthongke as $thongke) {
                            echo '<tr>
                                    <td>'.$count.'</td>
                                    <td>'.$thongke['madm'].'</td>
                                    <td>'.$thongke['tendm'].'</td>
                                    <td>'.$thongke['countsp'].'</td>
                                    <td>'.number_format($thongke['maxprice']).'</td>
                                    <td>'.number_format($thongke['minprice']).'</td>
                                    <td>'.number_format($thongke['avgprice']).'</td>
                                    <td>'.number_format($thongke['sumprice']).'</td>
                                  </tr>';
                            $count++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <canvas id="productChart"></canvas>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // PHP Data to JavaScript
        const categories = <?php echo json_encode($categories); ?>;
        const quantities = <?php echo json_encode($quantities); ?>;
        const maxPrices = <?php echo json_encode($maxPrices); ?>;
        const minPrices = <?php echo json_encode($minPrices); ?>;
        const avgPrices = <?php echo json_encode($avgPrices); ?>;
        const sumPrices = <?php echo json_encode($sumPrices); ?>;

        // Chart.js Configuration
        const ctx = document.getElementById('productChart').getContext('2d');
        const productChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: categories,
                datasets: [
                    {
                        label: 'Số lượng',
                        data: quantities,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Giá cao nhất',
                        data: maxPrices,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Giá thấp nhất',
                        data: minPrices,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Giá trung bình',
                        data: avgPrices,
                        backgroundColor: 'rgba(255, 206, 86, 0.2)',
                        borderColor: 'rgba(255, 206, 86, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Tổng tiền',
                        data: sumPrices,
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
</body>
</html>
