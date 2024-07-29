<main class="w-100 d-flex flex-column">
    <div class="row">
        <div class="row formtitle">
            <h1>THỐNG KÊ SẢN PHẨM THEO LOẠI</h1>
        </div>
        
        <div class="search_list-product-admin w-100">
            <table class="table w-100 table_bill-admin">
                <thead>
                    <tr class="maloai">
                        <th class="th_sp">STT</th>
                        <th class="th_sp">MÃ DANH MỤC</th>
                        <th class="th_sp">TÊN DANH MỤC</th>
                        <th class="th_sp">SỐ LƯỢNG</th>
                        <th class="th_sp">GIÁ CAO NHẤT</th>
                        <th class="th_sp">GIÁ THẤP NHẤT</th>
                        <th class="th_sp">GIÁ TRUNG BÌNH</th>
                        <th class="th_sp">TỔNG TIỀN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $count = 1;
                    foreach ($listthongke as $thongke) {
                        // Ensure that $thongke contains all required keys
                        if (isset($thongke['madm'], $thongke['tendm'], $thongke['countsp'], $thongke['maxprice'], $thongke['minprice'], $thongke['avgprice'], $thongke['sumprice'])) {
                            echo '<tr>
                                <td class="td_sp">'.$count.'</td>
                                <td class="td_sp">'.$thongke['madm'].'</td>
                                <td class="td_sp">'.$thongke['tendm'].'</td>
                                <td class="td_sp">'.$thongke['countsp'].'</td>
                                <td class="td_sp">'.number_format($thongke['maxprice']).'</td>
                                <td class="td_sp">'.number_format($thongke['minprice']).'</td>
                                <td class="td_sp">'.number_format($thongke['avgprice']).'</td>
                                <td class="td_sp">'.number_format($thongke['sumprice']).'</td>
                            </tr>';
                            $count++;
                        } else {
                            // Handle missing keys if necessary
                            echo '<tr><td colspan="8">Data missing</td></tr>';
                        }
                    }
                    ?>    
                </tbody>
            </table>
        </div>
    </div> 
</main>
