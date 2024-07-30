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
function loc_date_sp($a, $b)
{
    $sql = "SELECT product.product_name, product.product_sale_price AS price, category.category_name, bill_item.quantity, (bill_item.quantity * product.product_sale_price) AS tongtien, bill.created_datetime AS order_date
            FROM product
            JOIN bill_item ON product.product_id = bill_item.product_id
            JOIN bill ON bill_item.bill_id = bill.bill_id
            JOIN category ON product.category_id = category.category_id
            WHERE bill.bill_status = '3' AND bill.created_datetime BETWEEN '$a 00:00' AND '$b 23:59'
            ORDER BY bill_item.quantity DESC";
    return pdo_query($sql);
}

function loc_sp_theo_ngay($a)
{
    $sql = "SELECT product.product_name, product.product_sale_price AS price, category.category_name, bill_item.quantity, (bill_item.quantity * product.product_sale_price) AS tongtien, bill.created_datetime AS order_date
            FROM product
            JOIN bill_item ON product.product_id = bill_item.product_id
            JOIN bill ON bill_item.bill_id = bill.bill_id
            JOIN category ON product.category_id = category.category_id
            WHERE bill.bill_status = '3' AND bill.created_datetime < (CURRENT_DATE - INTERVAL $a DAY)
            ORDER BY bill_item.quantity DESC";
    return pdo_query($sql);
}

function tk_don()
{
    $sql = "SELECT bill.bill_id AS order_id, bill.full_name AS username, bill.phone_number, bill.address, 
            bill.created_datetime AS order_date, bill.bill_status AS process, bill.total_price AS total_amount
            FROM bill
            ORDER BY total_amount DESC";
    return pdo_query($sql);
}

function trang_thai_don($a)
{
    $sql = "SELECT bill.bill_id AS order_id, bill.full_name AS username, bill.phone_number, bill.address, 
            bill.created_datetime AS order_date, bill.bill_status AS process, bill.total_price AS total_amount
            FROM bill
            WHERE bill.bill_status = '$a'
            ORDER BY total_amount DESC";
    return pdo_query($sql);
}

function loc_don_ngay($a, $b)
{
    $sql = "SELECT bill.bill_id AS order_id, bill.full_name AS username, bill.phone_number, bill.address, 
            bill.created_datetime AS order_date, bill.bill_status AS process, bill.total_price AS total_amount
            FROM bill
            WHERE created_datetime BETWEEN '$a 00:00' AND '$b 23:59'
            ORDER BY total_amount DESC";
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
function get_top_selling_products($time_period, $start_date, $end_date)
{
    if ($time_period > 0) {
        $sql = "SELECT p.name, c.name AS tendanhmuc, p.price, SUM(oi.quantity) AS quantity, 
                SUM(oi.quantity * p.price) AS tongtien, DATE(b.created_datetime) AS order_date
                FROM order_item oi
                JOIN product p ON oi.product_id = p.id
                JOIN bill b ON oi.bill_id = b.id
                WHERE DATE(b.created_datetime) >= CURDATE() - INTERVAL :time_period DAY
                GROUP BY p.id, c.id, DATE(b.created_datetime)
                ORDER BY tongtien DESC";
    } elseif ($start_date && $end_date) {
        $sql = "SELECT p.name, c.name AS tendanhmuc, p.price, SUM(oi.quantity) AS quantity, 
                SUM(oi.quantity * p.price) AS tongtien, DATE(b.created_datetime) AS order_date
                FROM order_item oi
                JOIN product p ON oi.product_id = p.id
                JOIN bill b ON oi.bill_id = b.id
                WHERE DATE(b.created_datetime) BETWEEN :start_date AND :end_date
                GROUP BY p.id, c.id, DATE(b.created_datetime)
                ORDER BY tongtien DESC";
    } else {
        $sql = "SELECT p.name, c.name AS tendanhmuc, p.price, SUM(oi.quantity) AS quantity, 
                SUM(oi.quantity * p.price) AS tongtien, DATE(b.created_datetime) AS order_date
                FROM order_item oi
                JOIN product p ON oi.product_id = p.id
                JOIN bill b ON oi.bill_id = b.id
                GROUP BY p.id, c.id, DATE(b.created_datetime)
                ORDER BY tongtien DESC";
    }
    return pdo_query($sql);
}
