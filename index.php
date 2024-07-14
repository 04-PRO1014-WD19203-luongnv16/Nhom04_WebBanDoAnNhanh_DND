<?php
require_once("model/PDO.php");
require_once("view/header.php");
require_once("model/product.php");
// require_once("./main.php");


if (isset($_GET['act'])) {
    $act = $_GET['act'];
    // if (isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
    switch ($act) {

            //User
        case 'listAccount':
            require_once("controller/accountController/listAccount.php");
            break;
        case 'addAccount':
            require_once("controller/accountController/addAccount.php");
            break;
        case 'editAccount':
            require_once("controller/accountController/editAccount.php");
            break;
        case 'deleteAccount':

            break;

            //Category
        case 'listCategory':

            require_once("controller/categoryController/listCategory.php");
            break;
        case 'addCategory':
            require_once("controller/categoryController/addCategory.php");
            break;
        case 'editCategory':
            require_once("controller/categoryController/editCategory.php");
            break;
        case 'deleteCategory':

            break;


        case 'listProducts':
            $listSP = loadAllProduct();
            require_once("controller/productController/listProduct.php");
            break;
        case 'deleteProduct':
            if (isset($_GET['product_id'])) {
                DeleteProduct($_GET['product_id']);
            }
            $listSP = loadAllProduct();
            require_once("controller/productController/listProduct.php");
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
                $target_dir = "./upload/";
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
            require_once("controller/productController/addProduct.php");
            break;
        case "updateProduct":
            if (isset($_GET['product_id']) && $_GET['product_id'] > 0) {
                $product = loadOneProduct($_GET['product_id']);
            }
            $listCate = loadAllCategory();
            require_once("controller/productController/updateProduct.php");
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
                $target_dir = "./upload/";
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
            require_once("controller/productController/listProduct.php");
            break;
        default:
            require_once("view/main.php");
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
    require_once("view/main.php");
}

require_once("view/footer.php");
