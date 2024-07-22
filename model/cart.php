<?php
function viewCart($currentPage = '') {
    global $imgPath;
    $total_price = 0;
    // total_price
    // Kiểm tra sự tồn tại của giỏ hàng
    if (isset($_SESSION['myCart']) && is_array($_SESSION['myCart'])) {
        foreach ($_SESSION['myCart'] as $index => $cart) {
            $img = $imgPath . $cart[5];
            $totalAmount = $cart[2] * $cart[3]; // Tính tổng thành tiền cho sản phẩm này
            $total_price += $totalAmount;

            // Hiển thị số lượng sản phẩm
            $quantityDisplay = '';
            if ($currentPage == 'bill') {
                $quantityDisplay = $cart[3]; // Chỉ hiển thị số lượng
            } else {
                // Tạo form để cập nhật số lượng sản phẩm
                $quantityDisplay = '
                    <form action="index.php?act=updateCartQuantity" method="post">
                        <input type="hidden" name="idcart" value="' . $index . '">
                        <div class="input-group">
                            <input type="number" class="form-control" name="new_quantity" value="' . $cart[3] . '" min="1" max="100" step="1">
                        </div>
                    </form>
                ';
            }

            // Hiển thị sản phẩm trong giỏ hàng
            echo '
                <tr>
                    <td><img src="' . $img . '" class="img-fluid" style="max-width: 50px;"></td>
                    <td>' . $cart[1] . '</td>
                    <td>' . number_format($cart[2]) . ',000 VND</td>
                    <td>' . $quantityDisplay . '</td>
                    <td>' . number_format($totalAmount) . ',000 VND</td>';
            
            if ($currentPage != 'bill') {
                echo '<td><a href="index.php?act=deleteCartProduct&idcart=' . $index . '" class="btn btn-danger">Xóa</a></td>';
            }
            
            echo '</tr>';
        }
        
        echo '
            <tr>
                <td colspan="4" class="text-end">Tổng đơn hàng:</td>
                <td>'. number_format($total_price).' ,000 VND</td>
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

function detailBill($listbill) {
    global $imgPath;
    $total_price = 0;
    // total_price
    // Kiểm tra sự tồn tại của giỏ hàng

        foreach ($listbill as $cart) {
            $img = $imgPath . $cart['image_url'];
            $totalAmount = $cart['product_sale_price'] * $cart['quantity']; // Tính tổng thành tiền cho sản phẩm này
            $total_price += $totalAmount;

            // Hiển thị sản phẩm trong giỏ hàng
            echo '
                <tr>
                    <td><img src="' . $img . '" class="img-fluid" style="max-width: 50px;"></td>
                    <td>' . $cart[1] . '</td>
                    <td>' . number_format($cart[2]) . ',000 VND</td>
                    <td>' .  $cart[3] . '</td>
                    <td>' . number_format($totalAmount) . ',000 VND</td>';
'</tr>';
        }
        
        echo '
            <tr>
                <td colspan="4" class="text-end">Tổng đơn hàng:</td>
                <td>'. number_format($total_price).' ,000 VND</td>
            </tr>
        ';
    } 



function all_total_order(){
    $total_price = 0;
    foreach ($_SESSION['myCart'] as $index => $cart) {
        $totalAmount = $cart[2] * $cart[3]; // Tính tổng thành tiền cho sản phẩm này
        $total_price += $totalAmount;

    }
    return $total_price;
}

function insert_bill($product_name,$address,$email,$phone_number,$created_datetime,$total_price){

    $sql = "INSERT INTO bill (full_name, address, email, phone_number, created_datetime, total_price) VALUES ('$product_name','$address','$email','$phone_number','$created_datetime','$total_price')";
    pdo_execute_lastInsertId($sql);
}

function insert_cart($cart_id, $user_id, $product_id, $quantity, $bill_id){

    $sql = "INSERT INTO cart (cart_id,user_id,product_id,quantity,bill_id) VALUES ('$cart_id','$user_id','$product_id','$quantity','$bill_id')";
    pdo_execute($sql);
}

function loadone_bill($bill_id){
    $sql = "SELECT * FROM bill WHERE bill_id = $bill_id";
    $bill = pdo_query_one($sql);
    return $bill;
}

function loadone_cart($cart_id){
    $sql = "SELECT * FROM cart WHERE cart_id = $cart_id";
    $cart = pdo_query_one($sql);
    return $cart;
}

// function insert_bill($product_name, $address, $email, $phone_number, $created_datetime, $total_price) {
//     $sql = "INSERT INTO bill (full_name, address, email, phone_number, created_datetime, total_price) VALUES ('$product_name', '$address', '$email', '$phone_number', '$created_datetime', '$total_price')";
//     return pdo_execute_lastInsertId($sql);
// }

// function insert_cart($user_id, $product_id, $quantity, $bill_id) {
//     $sql = "INSERT INTO cart (user_id, product_id, quantity, bill_id) VALUES ('$user_id', '$product_id', '$quantity', '$bill_id')";
//     pdo_execute($sql);
// }

// function loadone_bill($bill_id) {
//     $sql = "SELECT * FROM bill WHERE id = $bill_id";
//     return pdo_query_one($sql);
// }

// function load_items_by_bill($bill_id) {
//     $sql = "SELECT c.product_name, c.quantity, c.product_sale_price, (c.quantity * c.product_sale_price) as total_amount, p.image_url 
//             FROM cart c 
//             JOIN products p ON c.product_id = p.id 
//             WHERE c.bill_id = $bill_id";
//     return pdo_query($sql);
// }

?>
