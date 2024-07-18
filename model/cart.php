<?php
function viewCart() {
    global $imgPath;
    $total = 0;
    
    // Kiểm tra sự tồn tại của giỏ hàng
    if (isset($_SESSION['myCart']) && is_array($_SESSION['myCart'])) {
        foreach ($_SESSION['myCart'] as $index => $cart) {
            $img = $imgPath . $cart[5];
            $totalAmount = $cart[2] * $cart[3]; // Tính tổng thành tiền cho sản phẩm này
            $total += $totalAmount;

            // Tạo link để xóa sản phẩm khỏi giỏ hàng
            $deleteCartProduct = '<a href="index.php?act=deleteCartProduct&idcart=' . $index . '" class="btn btn-danger">Xóa</a>';

            // Tạo form để cập nhật số lượng sản phẩm
            $updateQuantityForm = '
                <form action="index.php?act=updateCartQuantity" method="post">
                    <input type="hidden" name="idcart" value="' . $index . '">
                    <div class="input-group">
                        <input type="number" class="form-control" name="new_quantity" value="' . $cart[3] . '" min="1" max="100" step="1">
                    </div>
                </form>
            ';

            echo '
                <tr>
                    <td><img src="' . $img . '" class="img-fluid" style="max-width: 50px;"></td>
                    <td>' . $cart[1] . '</td>
                    <td>' . number_format($cart[2]) . ',000 VND</td>
                    <td>' . $updateQuantityForm . '</td>
                    <td>' . number_format($totalAmount) . ',000 VND</td>
                    <td>' . $deleteCartProduct . '</td>
                </tr>
            ';
        }
        
        echo '
            <tr>
                <td colspan="4" class="text-end">Tổng đơn hàng:</td>
                <td>'. number_format($total).' ,000 VND</td>
            </tr>
        ';
    } else {
        echo '
            <tr>
                <td colspan="6" class="text-center">Giỏ hàng của bạn đang trống</td>
            </tr>
        ';
    }
}
?>
