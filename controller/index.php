<?php
session_start();
include_once('../model/PDO.php');
include_once('../model/account.php');
include_once('../model/category.php');
include_once('../model/product.php');
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
                        update_user($user_id, $full_name, $email, $phone_number, $password, $address, $avatar_url);
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
                //giỏ hàng
                case 'addToCartDetails':
                    if (isset($_POST['add_cart'])) {
                        $product_id = $_POST['product_id'];
                        $product_name = $_POST['product_name'];
                        $product_sale_price = $_POST['product_sale_price'];
                        $image_url = $_POST['image_url'];
                        $quantity = $_POST['quantity']; // Use the updated quantity from hidden field
                        $totalAmount = $product_sale_price * $quantity;  // Calculate total amount
                        $productAdd = [$product_id, $product_name, $product_sale_price, $quantity, $totalAmount, $image_url];
                        $_SESSION['myCart'][] = $productAdd;
        
                        // Redirect to the cart view after adding the product
                        header("Location: index.php?act=viewCart");
                        exit();
                    }
                    include_once("./view/cart/viewCart.php");
                    break;
        
                case 'addToCart':
                    if (isset($_POST['add_cart'])) {
                        $product_id = $_POST['product_id'];
                        $product_name = $_POST['product_name'];
                        $product_sale_price = $_POST['product_sale_price'];
                        $image_url = $_POST['image_url'];
                        $quantity = 1; // Số lượng mặc định là 1
        
                        // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
                        $found = false;
                        foreach ($_SESSION['myCart'] as $key => $item) {
                            if ($item[0] == $product_id) {
                                // Nếu đã có sản phẩm này trong giỏ hàng, cập nhật số lượng
                                $_SESSION['myCart'][$key][3]++;
                                $found = true;
                                break;
                            }
                        }
        
                        if (!$found) {
                            // Nếu chưa có thì thêm mới vào giỏ hàng
                            $totalAmount = $product_sale_price * $quantity; // Tính tổng tiền
                            $productAdd = [$product_id, $product_name, $product_sale_price, $quantity, $totalAmount, $image_url];
                            $_SESSION['myCart'][] = $productAdd;
                        }
        
                        // Redirect lại đến trang giỏ hàng sau khi thêm sản phẩm
                        header("Location: index.php?act=viewCart");
                        exit();
                    }
                    include_once("./view/cart/viewCart.php");
                    break;
        
                case 'updateCartQuantity':
                    if (isset($_POST['idcart'], $_POST['new_quantity'])) {
                        $idcart = (int)$_POST['idcart'];
                        $new_quantity = (int)$_POST['new_quantity'];
                        if ($new_quantity <= 0) {
                            // Xóa sản phẩm nếu số lượng <= 0
                            unset($_SESSION['myCart'][$idcart]);
                            $_SESSION['myCart'] = array_values($_SESSION['myCart']); // Đặt lại chỉ số để tránh lỗ hổng chỉ số
                        } else {
                            // Cập nhật số lượng mới
                            $_SESSION['myCart'][$idcart][3] = $new_quantity;
        
                            // Tính lại tổng tiền cho sản phẩm
                            $product_sale_price = $_SESSION['myCart'][$idcart][2];
                            $_SESSION['myCart'][$idcart][4] = $product_sale_price * $new_quantity;
                        }
                        header("Location: index.php?act=viewCart");
                        exit();
                    }
                    break;
        
                case 'deleteCartProduct':
                    if (isset($_GET['idcart'])) {
                        $idcart = (int)$_GET['idcart']; // Đảm bảo là chỉ số là số nguyên
        
                        if (isset($_SESSION['myCart'][$idcart])) {
                            unset($_SESSION['myCart'][$idcart]); // Xóa sản phẩm khỏi giỏ hàng
                            $_SESSION['myCart'] = array_values($_SESSION['myCart']); // Đặt lại chỉ số để tránh lỗ hổng chỉ số
                        }
                    }
                    header("Location: index.php?act=viewCart");
                    exit();
                    break;
        
                case 'clearCart':
                    // Xóa toàn bộ giỏ hàng
                    if (isset($_SESSION['myCart'])) {
                        unset($_SESSION['myCart']);
                        $_SESSION['myCart'] = []; // Khởi tạo lại giỏ hàng là một mảng rỗng
                    }
                    header("Location: index.php?act=viewCart");
                    exit();
                    break;
        
                case 'viewCart':
                    include_once("./view/cart/viewCart.php");
                    break;
                case "bill":
                    include_once("./view/cart/bill.php");
                    break;
                case "confirmBill":
                    break;

                
                //Quản lý bình luận
            case "comment":
                require_once("comment/list.php");
                break;                
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
