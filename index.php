<?php
session_start();
include_once('./model/PDO.php');
include_once('./model/account.php');
require_once("./view/header.php");

try {
    $conn = pdo_get_connection();
    echo "Kết nối thành công!<br>";
} catch (PDOException $e) {
    echo "Kết nối không thành công: " . $e->getMessage() . "<br>";
}

$message = '';
$err = [];

if (isset($_GET['act'])) {
    $act = $_GET['act'];

    switch ($act) {
        case 'accountSignUp':
            if (isset($_POST['add_user']) && $_POST['add_user']) {
                $full_name = $_POST['full_name'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $importPassword = $_POST['importPassword'];
                $phone_number = $_POST['phone_number'];
                $address = $_POST['address'];
                $avatar_url = $_FILES['avatar_url'];
                $imgName = $avatar_url['name'];
                $dir = './upload/';
                $ext = pathinfo($imgName, PATHINFO_EXTENSION);
                $imgs = ['jpg', 'jpeg', 'png'];
                $target_file = $dir . basename($_FILES["avatar_url"]["name"]);

                if (isset($email) && is_array($email)) {
                    $emailUser = $email['email'];
                } else {
                    $emailUser = '';
                }

                // Validation
                if (strlen($password) < 5 || strlen($password) > 16) {
                    $err['password'] = '<p class="error">Mật khẩu phải có độ dài từ 5-16 ký tự</p>';
                }
                if (!preg_match('/^[a-zA-Z0-9 ]+$/', $full_name)) {
                    $err['full_name'] = '<p class="error">Họ và tên không được chứa ký tự đặc biệt</p>';
                }
                if (!preg_match('/^[0-9]+$/', $phone_number)) {
                    $err['phone_number'] = '<p class="error">Số điện thoại chỉ chứa các chữ số</p>';
                }
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $err['email'] = '<p class="error">Email không đúng định dạng</p>';
                }
                if ($avatar_url['size'] <= 0) {
                    $err['file'] = '<p class="error">Bạn chưa tải ảnh lên</p>';
                }
                if ($avatar_url['size'] > 0) {
                    if (!in_array(strtolower($ext), $imgs)) {
                        $err['file'] = '<p class="error">File không đúng định dạng</p>';
                    } else {
                        move_uploaded_file($_FILES["avatar_url"]["tmp_name"], $target_file);
                    }
                }
                if ($email == $emailUser) {
                    $err['email'] = '<p class="error">Email đã được sử dụng</p>';
                }

                // If no errors, insert user
                if (empty($err)) {
                    insert_user($full_name, $email, $password, $phone_number, $address, $imgName);
                    $message = 'Đăng ký thành công';
                }
            }
            require_once("view/account/signup.php");
            break;
        case 'accountLogin':
            if (isset($_POST['accountLogin']) && $_POST['accountLogin']) {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $user = select_user_login($email, $password);
                if (is_array($user)) {
                    $_SESSION['user'] = $user;
                    header('Location: ./controller/index.php');
                    exit;
                } else {
                    $message = '<p class="error">Email hoặc mật khẩu không chính xác</p>';
                }
            }
            require_once("view/account/login.php");
            break;
        case 'editAccount':
            require_once("accountController/editAccount.php");
            break;
        case 'deleteAccount':
            break;
    }
} else {
    require_once("./view/account/login.php");
}

require_once("./view/footer.php");
?>
