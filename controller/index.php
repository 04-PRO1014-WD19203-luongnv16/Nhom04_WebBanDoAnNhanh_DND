<?php
session_start();
include_once('../model/PDO.php');
include_once('../model/account.php');
include_once('../model/category.php');

require_once("./header.php");
// require_once("./main.php");

$message = '';
$err = [];

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    // if (isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
    switch ($act) {

            //User
        case 'listAccount':
            $listAccount = select_all_users();
            require_once("./accountController/listAccount.php");
            break;
            // case 'addAccount':
            // require_once("accountController/addAccount.php");
            // break;
        case 'editAccount':
            if (isset($_GET['user_id']) && $_GET['user_id'] > 0) {
                $user = select_user_by_id($_GET['user_id']);
                require_once("./accountController/editAccount.php");
            }
            break;
        case 'updateAccount':
            if (isset($_POST['user_id']) && $_POST['user_id'] > 0) {
                $user_id = $_POST['user_id'];
                $full_name = $_POST['full_name'];
                $email = $_POST['email'];
                $phone_number = $_POST['phone_number'];
                $password = $_POST['password'];
                $address = $_POST['address'];
                $avatar_url = $_FILES['avatar_url']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["avatar_url"]["name"]);
                if (move_uploaded_file($_FILES["avatar_url"]["tmp_name"], $target_file)) {
                    // File upload thành công
                } else {
                    // Không upload được file
                    $avatar_url = "";
                }
                update_user($user_id, $full_name, $email, $phone_number, $password, $address, $avatar_url);
                $_SESSION['message'] = 'Cập nhật tài khoản thành công';
                header('Location: index.php?act=listAccount');
                exit;
            }
        case 'deleteAccount':
            if (isset($_GET['user_id'])) {
                $user_id = $_GET['user_id'];
                delete_user($user_id);
                header('Location: index.php?act=listAccount');
                
            }
            break;

            //Category
        case 'listCategory':
            $listdm = select_dm();
            require_once("categoryController/listCategory.php");
            break;
        case 'addCategory':
            //kiểm tra
            if (isset($_POST['add_dm']) && ($_POST['add_dm'])) {
                $category_name = $_POST['category_name'];
                $id_sub = $_POST['id_sub'];
                if (preg_match('/[a-zA-Z0-9 ]/', $category_name, $id_sub)) {
                    insert_dm($category_id, $category_name, $id_sub);
                    $message = "Thêm thành công!";
                } else {
                    $message = '<p class="err">Tên Danh mục không được chứa ký tự đặc biệt</p>';
                }
            }
            require_once("categoryController/addCategory.php");
            break;
        case 'editCategory':
            if (isset($_GET['category_id']) && $_GET['category_id'] > 0) {
                $dm = select_dm_one($_GET['category_id']);
            }
            require_once("categoryController/editCategory.php");
            break;
        case 'deleteCategory':
            if (isset($_GET['category_id']) && $_GET['category_id'] > 0) {
                delete_dm($_GET['category_id']);
                $message = "Xóa Thành công";
            }
            $listdm = select_dm();
            require_once("categoryController/listCategory.php");
            break;
        case 'updatedm':
            if (isset($_POST['update_dm']) && $_POST['update_dm']) {
                $category_id = $_POST['category_id'];
                $category_name = $_POST['category_name'];
                if (preg_match('/[a-zA-Z0-9 ]/', $category_name)) {
                    update_dm($category_name, $category_id);
                    $message = "Cập nhật thành công";
                    $listdm = select_dm();
                    require_once("categoryController/listCategory.php");
                } else {
                    $dm = select_dm_one($category_id);
                    $message = '<p class="err">Tên danh mục không được chứa ký tự đặc biệt</p>';
                    require_once("categoryController/editCategory.php");
                }
            }

            break;

        default:
            require_once("main.php");
            break;
    }
    // } else {
    //     header('location: ./index.php');
    // }
} else {
    // if (isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
    //     require_once './main.php';
    // } else {
    //     header('Location: ./index.php');
    // }
    require_once("main.php");
}

require_once("./footer.php");
