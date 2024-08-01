<?php
if (isset($_GET['act']) && $_GET['act'] === 'update_status' && isset($_GET['id']) && isset($_GET['status'])) {
    $bill_id = intval($_GET['id']);
    $status = intval($_GET['status']);

    // Validate the status (0-4)
    if (in_array($status, [0, 1, 2, 3, 4, 5, 6])) {
        // Update the status in the database
        $sql = "UPDATE bill SET bill_status = ? WHERE bill_id = ?";
        pdo_execute_bill_order($sql, $status, $bill_id);  // Ensure params are correctly passed

        // Set a session notification
        $_SESSION['notification'] = 'Trạng thái đơn hàng đã được cập nhật thành công!';

        // Redirect back to the orders list with a success message
        header('Location: index.php?act=order');
        exit();
    } else {
        echo "Invalid status";
    }
} else {
    echo "Invalid parameters";
}
