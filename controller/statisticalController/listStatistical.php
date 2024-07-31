<main class="w-100 d-f f-d">
<div class="row">
    <div class="row formtitle ">
        <h1>THỐNG KÊ SẢN PHẨM THEO LOẠI</h1>
    </div>
    
    <div class="search_list-product-admin w-100">
            <table class="w-100 table_bill-admin">
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
                <?php $count = 1;
                    foreach ($listthongke as $thongke) {
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
                    }
                ?>    
            </table>
        </div>
</div> 
</main>
