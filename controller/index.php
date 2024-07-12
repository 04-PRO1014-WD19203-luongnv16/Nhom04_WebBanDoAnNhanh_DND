<?php
require_once "./header.php";
require_once "../model/category.php";
require_once "../model/PDO.php";
// require_once("./main.php");
        $dsdm = danhsach_dm();
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    // if (isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
    switch ($act) {
        //User
        case 'listAccount':
            require_once("accountController/listAccount.php");
            break;
        case 'addAccount':
            require_once("accountController/addAccount.php");
            break;
        case 'editAccount':
            require_once("accountController/editAccount.php");
            break;
        case 'deleteAccount':
            
            break;

        //Category

        //Danh Sách
        case 'listCategory': 
            require_once("categoryController/listCategory.php");
            break;
        case 'addCategory':
            //Thêm
            if (isset($_POST['add'])) {
                $category_name = $_POST['category_name'];
                them_dm($category_name);
                //header('location: ?act=listCategory');
            }
            require_once("categoryController/addCategory.php");
            break;
            //sửa
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
            //xóa
        case 'deleteCategory':
            if (isset($_GET['category_id']) && $_GET['category_id']) {
                del_category($_GET['category_id']);
                //header('location: ?act=listCategory');
            }
            require_once("categoryController/listCategory.php");
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
