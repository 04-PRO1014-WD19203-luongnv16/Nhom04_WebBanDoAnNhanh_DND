<?php
// view_cart.php
// function viewCart($currentPage = '')
// {
//     global $imgPath;
//     $total_price = 0;

//     if (isset($_SESSION['myCart']) && is_array($_SESSION['myCart'])) {
//         foreach ($_SESSION['myCart'] as $index => $cart) {
//             $img = $imgPath . $cart[5];
//             $totalAmount = $cart[2] * $cart[3];
//             $total_price += $totalAmount;

//             $quantityDisplay = '';
//             if ($currentPage == 'bill') {
//                 $quantityDisplay = $cart[3];
//             } else {
//                 $quantityDisplay = '
//                     <form action="index.php?act=updateCartQuantity" method="post">
//                         <input type="hidden" name="idcart" value="' . $index . '">
//                         <div class="input-group">
//                             <input type="number" class="form-control" name="new_quantity" value="' . $cart[3] . '" min="1" max="100" step="1">
//                         </div>
//                     </form>
//                 ';
//             }

//             echo '
//                 <tr>
//                     <td><img src="' . $img . '" class="img-fluid" style="max-width: 50px;"></td>
//                     <td>' . $cart[1] . '</td>
//                     <td>' . number_format($cart[2]) . ',000 VND</td>
//                     <td>' . $quantityDisplay . '</td>
//                     <td>' . number_format($totalAmount) . ',000 VND</td>';

//             if ($currentPage != 'bill') {
//                 echo '<td><a href="index.php?act=deleteCartProduct&idcart=' . $index . '" class="btn btn-danger">Xóa</a></td>';
//             }

//             echo '</tr>';
//         }

//         echo '
//             <tr>
//                 <td colspan="4" class="text-end">Tổng đơn hàng:</td>
//                 <td>' . number_format($total_price) . ',000 VND</td>
//             </tr>
//         ';
//     } else {
//         echo '
//             <tr>
//                 <td colspan="6" class="text-center">Giỏ hàng của bạn đang trống</td>
//             </tr>
//         ';
//     }
// }



// function detailBill($listbill)
// {
//     global $imgPath;
//     $total_price = 0;
//     foreach ($listbill as $cart) {
//         $img = $imgPath . $cart['image_url'];
//         $totalAmount = $cart['product_sale_price'] * $cart['quantity']; // Tính tổng thành tiền cho sản phẩm này
//         $total_price += $totalAmount;
//         // Hiển thị sản phẩm trong giỏ hàng
//         echo '
//                 <tr>
//                     <td><img src="' . $img . '" class="img-fluid" style="max-width: 50px;"></td>
//                     <td>' . $cart[1] . '</td>
//                     <td>' . number_format($cart[2]) . ',000 VND</td>
//                     <td>' .  $cart[3] . '</td>
//                     <td>' . number_format($totalAmount) . ',000 VND</td>';
//         '</tr>';
//     }
//     echo '
//             <tr>
//                 <td colspan="4" class="text-end">Tổng đơn hàng:</td>
//                 <td>' . number_format($total_price) . ' ,000 VND</td>
//             </tr>
//         ';
// }

// save_cart.php// save_cart.php
function saveCart($user_id)
{
    if (isset($_SESSION['myCart']) && is_array($_SESSION['myCart'])) {
        // Xóa giỏ hàng cũ của người dùng
        pdo_execute("DELETE FROM cart_items WHERE user_id = ?", $user_id);

        // Lưu giỏ hàng mới vào cơ sở dữ liệu
        foreach ($_SESSION['myCart'] as $item) {
            $product_id = $item[0];
            $quantity = $item[3];
            pdo_execute("INSERT INTO cart_items (user_id, product_id, quantity) VALUES (?, ?, ?)", $user_id, $product_id, $quantity);
        }
    }
}


// restore_cart.php Khôi Phục Giỏ Hàng Từ Cơ Sở Dữ Liệu
function restoreCart($user_id)
{
    $cart_items = pdo_query("SELECT * FROM cart_items WHERE user_id = ?", $user_id);
    $_SESSION['myCart'] = [];
    foreach ($cart_items as $item) {
        $product_id = $item['product_id'];
        $product_details = pdo_query_one("SELECT * FROM products WHERE id = ?", $product_id);

        if ($product_details) {
            $productAdd = [
                $product_id,
                $product_details['product_name'],
                $product_details['product_sale_price'],
                $item['quantity'],
                $product_details['product_sale_price'] * $item['quantity'],
                $product_details['image_url']
            ];
            $_SESSION['myCart'][] = $productAdd;
        }
    }
}


// update_cart_quantity.php  Cập Nhật Số Lượng Sản Phẩm Trong Giỏ Hàng
function updateCartQuantity($user_id, $product_id, $quantity)
{
    pdo_execute("UPDATE cart_items SET quantity = ? WHERE user_id = ? AND product_id = ?", $quantity, $user_id, $product_id);
}
// remove_cart_item.php  Xóa Sản Phẩm Khỏi Giỏ Hàng
function removeCartItem($user_id, $product_id)
{
    pdo_execute("DELETE FROM cart_items WHERE user_id = ? AND product_id = ?", $user_id, $product_id);
}

// Function to calculate the total price of the order
function all_total_order() {
    $total_price = 0;
    if (isset($_SESSION['myCart']) && is_array($_SESSION['myCart'])) {
        foreach ($_SESSION['myCart'] as $index => $cart) {
            $totalAmount = $cart[2] * $cart[3];
            $total_price += $totalAmount;
        }
    }
    return $total_price;
}

// Function to insert a new bill into the database
function insert_bill($full_name, $address, $email, $phone_number, $payment_status, $created_datetime, $total_price, $bill_code) {
    $sql = "INSERT INTO bill (full_name, address, email, phone_number, payment_status, created_datetime, total_price, bill_code) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    return pdo_execute_lastInsertId($sql, $full_name, $address, $email, $phone_number, $payment_status, $created_datetime, $total_price, $bill_code);
}

// Function to insert cart items into the database
function insert_cart($user_id, $product_id, $quantity, $bill_id) {
    $sql = "INSERT INTO cart (user_id, product_id, quantity, bill_id) VALUES (?, ?, ?, ?)";
    pdo_execute_bill_order($sql, $user_id, $product_id, $quantity, $bill_id);
}

// Function to load a single bill from the database
function loadone_bill($bill_id) {
    $sql = "SELECT * FROM bill WHERE bill_id = ?";
    return pdo_query_one($sql, [$bill_id]);
}

// Function to load cart items associated with a bill from the database
function loadone_cart($cart_id) {
    $sql = "SELECT * FROM cart WHERE cart_id = ?";
    return pdo_query_one($sql, [$cart_id]);
}

