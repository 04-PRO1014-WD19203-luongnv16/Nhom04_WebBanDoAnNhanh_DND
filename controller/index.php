<?php
ob_start();
session_start();
include_once('../model/PDO.php');
include_once('../model/account.php');
include_once('../model/category.php');
include_once('../model/product.php');
include_once('../model/cart.php');
require_once("./header.php");
// require_once("./main.php");
if (!isset($_SESSION['mycart'])) $_SESSION['mycart'] = [];
$allProduct = select_sp_home();
$message = '';
$errors = [];
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    if (isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
        switch ($act) {
                //User
            case 'listAccount':
                $listAccount = select_all_users();
                require_once("./accountController/listAccount.php");
                break;
            case 'editAccount':
                if (isset($_GET['user_id']) && $_GET['user_id'] > 0) {
                    $user = select_user_by_id($_GET['user_id']);
                    if (!$user) {
                        $message = "Không tìm thấy tài khoản";
                    }
                } else {
                    $message = "Thiếu thông tin tài khoản";
                }
                require_once("./accountController/editAccount.php");
                break;
            case 'updateAccount':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $user_id = $_POST['user_id'];
                    $full_name = $_POST['full_name'];
                    $email = $_POST['email'];
                    $phone_number = $_POST['phone_number'];
                    $password = $_POST['password'];
                    $address = $_POST['address'];
                    $role = $_POST['role'];
                    $avatar_url = ''; // Mặc định không có ảnh mới được tải lên

                    // Kiểm tra nếu người dùng đã tải lên ảnh mới
                    if ($_FILES['avatar_url']['name']) {
                        $avatar_url = $_FILES['avatar_url']['name'];
                        $target_file = "../upload/" . basename($avatar_url);
                        move_uploaded_file($_FILES['avatar_url']['tmp_name'], $target_file);
                    } else {
                        // Nếu không có file tải lên, giữ nguyên ảnh đại diện hiện tại
                        $user = select_user_by_id($user_id); // Lấy thông tin tài khoản hiện tại
                        $avatar_url = $user['avatar_url']; // Sử dụng lại đường dẫn ảnh đại diện cũ
                    }
                    if (empty($errors)) {
                        update_user($user_id, $full_name, $email, $phone_number, $password, $address, $avatar_url, $role);
                        $message = "Cập nhật thành công";
                        $listAccount = select_all_users();
                        include_once './accountController/listAccount.php';
                        exit();
                    } else {
                        // Nếu có lỗi, hiển thị form chỉnh sửa tài khoản với thông tin và lỗi đã nhập
                        $user = select_user_by_id($user_id);
                        require_once("./accountController/editAccount.php");
                    }
                }
            case 'deleteAccount':
                if (isset($_GET['user_id']) && $_GET['user_id'] > 0) {
                    delete_users($_GET['user_id']);
                }
                $listAccount = select_all_users();
                include_once './accountController/listAccount.php';
                break;

                //Category
            case 'listCategory':
                require_once("categoryController/listCategory.php");
                break;
            case 'addCategory':
                if (isset($_POST['add'])) {
                    $category_name = $_POST['category_name'];
                    them_dm($category_name);
                    //header('location: ?act=listCategory');
                }
                require_once("categoryController/addCategory.php");
                break;
            case 'editCategory':
                if (isset($_GET['category_id']) && $_GET['category_id'] > 0) {
                    $dm = getone_category($_GET['category_id']);
                }
                if (isset($_POST['edit'])) {
                    $category_name = $_POST['category_name'];
                    $category_id = $_POST['category_id'];
                    edit_category($category_id, $category_name);
                    //header("location: ?act=listCategory");
                }
                require_once("categoryController/editCategory.php");
                break;
            case 'deleteCategory':
                if (isset($_GET['category_id']) && $_GET['category_id']) {
                    del_category($_GET['category_id']);
                    //header('location: ?act=listCategory');
                }
                require_once("categoryController/listCategory.php");
                break;
                //Products
            case 'listProducts':
                $listSP = loadAllProduct();
                require_once("productController/listProduct.php");
                break;
            case 'deleteProduct':
                if (isset($_GET['product_id'])) {
                    DeleteProduct($_GET['product_id']);
                }
                $listSP = loadAllProduct();
                require_once("productController/listProduct.php");
                break;
            case 'addProduct':
                if (isset($_POST['add_sp'])) {
                    $product_name = $_POST['product_name'];
                    $product_description = $_POST['product_description'];

                    $product_import_price = $_POST['product_import_price'];
                    $product_sale_price = $_POST['product_sale_price'];
                    $product_listed_price = $_POST['product_listed_price'];
                    $product_stock = $_POST['product_stock'];
                    $category_id = $_POST['category_id'];
                    $product_avatar_url = $_FILES['product_avatar_url']['name'];
                    $target_dir = "../upload/";
                    // khai báo thư mục mình muốn đưa vào
                    $target_file = $target_dir . basename($_FILES["product_avatar_url"]["name"]);
                    // Khai báo $target_file = $target_dir + tên file
                    if (move_uploaded_file($_FILES["product_avatar_url"]["tmp_name"], $target_file)) {
                        //echo "Upload file thành công!";
                    } else {
                        //echo "Xin lỗi, file của bạn chưa upload thành công.";
                    }
                    insertProduct($product_name, $product_description, $product_avatar_url, $product_import_price, $product_sale_price, $product_listed_price, $product_stock, $category_id);
                }
                $listCate = loadAllCategory();
                require_once("productController/addProduct.php");
                break;
            case "updateProduct":
                if (isset($_GET['product_id']) && $_GET['product_id'] > 0) {
                    $product = loadOneProduct($_GET['product_id']);
                }
                $listCate = loadAllCategory();
                require_once("productController/updateProduct.php");
                break;
            case 'updatePro':
                if (isset($_POST['update_sp'])) {
                    $product_id = $_POST['product_id'];
                    $product_name = $_POST['product_name'];
                    $product_description = $_POST['product_description'];

                    $product_import_price = $_POST['product_import_price'];
                    $product_sale_price = $_POST['product_sale_price'];
                    $product_listed_price = $_POST['product_listed_price'];
                    $product_stock = $_POST['product_stock'];
                    $category_id = $_POST['category_id'];
                    $product_avatar_url = $_FILES['product_avatar_url']['name'];
                    $target_dir = "../upload/";
                    // khai báo thư mục mình muốn đưa vào
                    $target_file = $target_dir . basename($_FILES["product_avatar_url"]["name"]);
                    // Khai báo $target_file = $target_dir + tên file
                    if (move_uploaded_file($_FILES["product_avatar_url"]["tmp_name"], $target_file)) {
                        //echo "Upload file thành công!";
                    } else {
                        //echo "Xin lỗi, file của bạn chưa upload thành công.";
                    }
                    updateProduct($product_id, $product_name, $product_description, $product_avatar_url, $product_import_price, $product_sale_price, $product_listed_price, $product_stock, $category_id);
                }
                $listCate = loadAllCategory();
                $listSP = loadAllProduct();
                require_once("productController/listProduct.php");
                break;
                //Đơn hàng
            case 'order':
                $listBill = loadall_bill();
                // $listBill = loadall_bill(0);
                require_once("./order/listOrder.php");
                break;
              // In your order handling logic
case 'deleteOrder':
    if (isset($_GET['bill_id']) && is_numeric($_GET['bill_id'])) {
        $bill_id = intval($_GET['bill_id']);
        delete_order($bill_id);
        $_SESSION['notification'] = 'Đơn hàng đã được xóa thành công!';
    }
    header("Location: index.php?act=order");
    exit;
    break;

case 'update_status':
    // The actual status update logic is handled in update_order_status.php
    require_once('./order/update_order_status.php');
    $_SESSION['notification'] = 'Trạng thái đơn hàng đã được cập nhật thành công!';
    header("Location: index.php?act=order");
    exit;
    break;



                //Quản lý bình luận
            case 'dsbl': {
                    $dsbl = chitiet_binhluan();
                    include './binhluan/dsbl.php';
                    break;
                }
            case 'delbl': {
                    if (isset($_GET['comment_id']) && $_GET['comment_id'] > 0) {
                        del_binhluan($_GET['comment_id']);
                        header('location: ?act=dsbl');
                    }
                    break;
                }
            default:
                require_once("./main.php");
                break;
        }
    } else {
        header('Location: ../index.php');
    }
} else {
    if (isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
        require_once './main.php';
    } else {
        header('Location: ../index.php');
    }
}
require_once("./footer.php");
ob_end_flush();
