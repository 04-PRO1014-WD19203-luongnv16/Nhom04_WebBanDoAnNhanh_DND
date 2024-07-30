<?php
// Function to load statistics data
function loadall_thongke($kyw = "")
{
    $sql = "SELECT category.category_id AS madm, category.category_name AS tendm, COUNT(product.product_id) AS countsp, MIN(product.product_sale_price) AS minprice, MAX(product.product_sale_price) AS maxprice, AVG(product.product_sale_price) AS avgprice, SUM(product.product_sale_price) AS sumprice
            FROM product
            LEFT JOIN category ON category.category_id = product.category_id
            WHERE 1";

    if ($kyw != "") {
        $sql .= " AND category.category_name LIKE '%" . $kyw . "%'";
    }

    $sql .= " GROUP BY category.category_id";
    $sql .= " ORDER BY category.category_id DESC";

    return pdo_query($sql);
}

// Function to filter products by date range
function loc_date_sp($start_date, $end_date)
{
    $sql = "SELECT p.product_name AS name, c.category_name AS tendanhmuc, 
                   SUM(bi.quantity) AS quantity, 
                   (SUM(bi.quantity) * p.product_sale_price) AS tongtien
            FROM product p
            JOIN bill_item bi ON p.product_id = bi.product_id
            JOIN bill b ON bi.bill_id = b.bill_id
            JOIN category c ON p.category_id = c.category_id
            WHERE b.bill_status = 'Hoàn tất'
              AND b.created_datetime BETWEEN '$start_date 00:00' AND '$end_date 23:59'
            GROUP BY p.product_id
            ORDER BY quantity DESC";
    return pdo_query($sql);
}


function loc_sp_theo_ngay($days)
{
    $sql = "SELECT p.product_name AS name, c.category_name AS tendanhmuc, 
                   SUM(bi.quantity) AS quantity, 
                   (SUM(bi.quantity) * p.product_sale_price) AS tongtien
            FROM product p
            JOIN bill_item bi ON p.product_id = bi.product_id
            JOIN bill b ON bi.bill_id = b.bill_id
            JOIN category c ON p.category_id = c.category_id
            WHERE b.bill_status = 'Hoàn tất'
              AND DATEDIFF(NOW(), b.created_datetime) <= '$days'
            GROUP BY p.product_id
            ORDER BY quantity DESC";
    return pdo_query($sql);
}


function tk_don()
{
    $sql = "SELECT bill.bill_code AS order_code, bill.full_name AS username, bill.phone_number, bill.address, 
            bill.created_datetime AS order_date, bill.bill_status AS process, bill.total_price AS total_amount
            FROM bill
            ORDER BY total_amount DESC
            LIMIT 10"; // Giới hạn lấy 10 đơn hàng đầu tiên
    return pdo_query($sql);
}

function trang_thai_don($a)
{
    $sql = "SELECT bill.bill_code AS order_code, bill.full_name AS username, bill.phone_number, bill.address, 
            bill.created_datetime AS order_date, bill.bill_status AS process, bill.total_price AS total_amount
            FROM bill
            WHERE bill.bill_status = '$a'
            ORDER BY total_amount DESC
            LIMIT 10"; // Giới hạn lấy 10 đơn hàng đầu tiên
    return pdo_query($sql);
}

function loc_don_ngay($a, $b)
{
    $sql = "SELECT bill.bill_code AS order_code, bill.full_name AS username, bill.phone_number, bill.address, 
            bill.created_datetime AS order_date, bill.bill_status AS process, bill.total_price AS total_amount
            FROM bill
            WHERE created_datetime BETWEEN '$a 00:00' AND '$b 23:59'
            ORDER BY total_amount DESC
            LIMIT 10"; // Giới hạn lấy 10 đơn hàng đầu tiên
    return pdo_query($sql);
}

function sw_chon_trang_thai($status)
{
    $status_texts = [
        '0' => 'Đơn hàng mới',
        '1' => 'Chờ shipper lấy hàng',
        '2' => 'Đang Giao Hàng',
        '3' => 'Hoàn tất',
        '4' => 'Hủy hàng',
    ];
    return $status_texts[$status] ?? 'Tất cả';
}


//sellingProduct
function get_top_selling_products($time_period = 0, $start_date = '', $end_date = '')
{
    if (!empty($start_date) && !empty($end_date)) {
        return loc_date_sp($start_date, $end_date);
    } else {
        return loc_sp_theo_ngay($time_period);
    }
}
