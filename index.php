<?php
// session_start();
include_once('./model/PDO.php');
include_once('./model/account.php');
require_once("./view/header.php");
// require_once("./main.php");

try {
    $conn = pdo_get_connection();
    echo "Kết nối thành công!<br>";
} catch (PDOException $e) {
    echo "Kết nối không thành công: " . $e->getMessage() . "<br>";
}


if (isset($_GET['act'])) {
    $act = $_GET['act'];
    // if (isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
    switch ($act) {

            //Account
        case 'accountSignUp':
            if(isset($_POST['accountSignUp'])&&($_POST['accountSignUp'])){
                $full_name = $_POST['full_name'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $phone_number = $_POST['phone_number'];
                $address= $_POST['address'];
                $avatar_url = $_FILES['avatar_url'];
                $imgName = $avatar_url['name'];
                $dir = './upload/';
                $ext = pathinfo($imgName, PATHINFO_EXTENSION);
                $imgs = ['jpg', 'jpeg', 'png'];
                $target_file = $dir . basename($_FILES["avatar_url"]["name"]);
                if(isset($email)&&is_array($email)){
                    $emailUser = $email['email'];

                }else{
                    $emailUser = '';
                }
                $err = [];
                if((strlen($password) < 5)||(strlen($password) > 16)){
                    $err['password'] = '<p class="error">Mật khẩu phải có độ dài từ 5-16 ký tự</p>';
                }
                if(!preg_match ('/[a-zA-Z0-9 ]/', $full_name)){
                    $err['full_name'] = '<p class="error">Họ và tên không được chứa ký tự đặc biệt</p>';
                }
                if(!preg_match ('/[a-zA-Z0-9 ]/', $phone_number)){
                    $err['phone_number'] = '<p class="error">Họ và tên không được chứa ký tự đặc biệt</p>';
                }
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $err['email'] = '<p class="error">Email không đúng định dạng</p>';
                }
                if($img['size'] <= 0){
                    $err['file'] = '<p class="error">Bạn chưa tải ảnh lên</p>';
                }

                if($img['size'] > 0){
                    if(!in_array(strtolower($ext),$imgs)){
                        $err['file'] = '<p class="error">File không đúng định dạng</p>';
                    }else{
                        move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
                    }
                }
                if($email==$emailUser){
                    $err['email'] = '<p class="error">Email đã được sử dụng</p>';
                }
                if(!array_filter($err)){
                    insert_user($full_name,$email,$password,$phone_number,$address,$avatar_url,$imgName);
                    $message = 'Đăng ký thành công';
                }
            }
            require_once("view/account/signup.php");
            break;
        case 'addAccount':
            require_once("accountController/addAccount.php");
            break;
        case 'editAccount':
            require_once("accountController/editAccount.php");
            break;
        case 'deleteAccount':

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
    require_once("./view/account/login.php");
}

require_once("./view/footer.php");
