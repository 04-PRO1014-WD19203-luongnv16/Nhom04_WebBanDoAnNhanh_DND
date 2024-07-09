<?php
require_once("./header.php");
// require_once("./main.php");


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
        case 'listCategory':
            require_once("categoryController/listCategory.php");
            break;
        case 'addCategory':
            require_once("categoryController/addCategory.php");
            break;
        case 'editCategory':
            require_once("categoryController/editCategory.php");
            break;
        case 'deleteCategory':
            
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
