<?php
ob_start();
session_start();
include_once('./model/PDO.php');
include_once('./model/account.php');
include_once('./model/category.php');
require_once("./view/header.php");
// try {
//     $conn = pdo_get_connection();
//     echo "Kết nối thành công!<br>";
// } catch (PDOException $e) {
//     echo "Kết nối không thành công: " . $e->getMessage() . "<br>";
// }
$message = '';
$errors = [];
if (isset($_GET['act']) && ($_GET['act'] != "")) {  
    $act = $_GET['act'];
        switch ($act) {
            case 'accountSignUp':
                if (isset($_POST['add_user'])) {
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
                    $allowed_extensions = ['jpg', 'jpeg', 'png'];
                    $target_file = $dir . basename($_FILES["avatar_url"]["name"]);
                    // Validation
                    if (strlen($password) < 5 || strlen($password) > 16) {
                        $errors['password'] = '<p class="error text-danger">Mật khẩu phải có từ 5 đến 16 ký tự</p>';
                    } elseif (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d!@#$%^&*()_+=\-{}\[\];:\'",.\/?]{6,}$/', $password)) {
                        $errors['password'] = '<p class="error text-danger">Mật khẩu phải bao gồm ít nhất một chữ cái và một số</p>';
                    } elseif (strpos($password, ' ') !== false) {
                        $errors['password'] = '<p class="error text-danger">Mật khẩu không được chứa khoảng trắng</p>';
                    }
                    if ($password !== $importPassword) {
                        $errors['importPassword'] = '<p class="error text-danger">Mật khẩu nhập lại không khớp</p>';
                    }
                    if (empty($full_name) || trim($full_name) === '') {
                        $errors['full_name'] = '<p class="error text-danger">Họ và tên không được để trống</p>';
                    } elseif (!preg_match('/^[\p{L} ]+$/u', $full_name)) {
                        $errors['full_name'] = '<p class="error text-danger">Họ và tên không được chứa ký tự đặc biệt</p>';
                    }
                    if (!preg_match('/^[0-9]+$/', $phone_number)) {
                        $errors['phone_number'] = '<p class="error text-danger">Số điện thoại chỉ chứa các chữ số</p>';
                    } elseif (!preg_match('/^[0-9]+$/', $phone_number)) {
                        $errors['phone_number'] = '<p class="error text-danger">Số điện thoại chỉ chứa các chữ số</p>';
                    }
                    if ($password !== $importPassword) {
                        $errors['importPassword'] = '<p class="error text-danger">Mật khẩu nhập lại không khớp</p>';
                    }
                    if (empty(trim($email))) {
                        $errors['email'] = '<p class="error text-danger">Vui lòng nhập địa chỉ email</p>';
                    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $errors['email'] = '<p class="error text-danger">Email không đúng định dạng</p>';
                    } elseif (!preg_match('/^\S+@\S+\.\S+$/', $email)) {
                        $errors['email'] = '<p class="error text-danger">Email không hợp lệ</p>';
                    } elseif (email_exists($email)) {
                        $errors['email'] = '<p class="error text-danger">Email đã được sử dụng</p>';
                    }
                    if (empty(trim($address))) {
                        $errors['address'] = '<p class="error text-danger">Vui lòng nhập địa chỉ</p>';
                    }
                    if ($avatar_url['size'] <= 0) {
                        $errors['avatar_url'] = '<p class="error text-danger">Bạn chưa tải ảnh lên</p>';
                    } elseif (!in_array(strtolower($ext), $allowed_extensions)) {
                        $errors['avatar_url'] = '<p class="error text-danger">File không đúng định dạng (chỉ chấp nhận JPG, JPEG, PNG)</p>';
                    }
                    if (empty($errors)) {
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
                    if (empty(trim($email))) {
                        $errors['email'] = '<p class="error text-danger">Vui lòng nhập địa chỉ email</p>';
                    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $errors['email'] = '<p class="error text-danger">Email không đúng định dạng</p>';
                    }
                    if (empty($password)) {
                        $errors['password'] = '<p class="error text-danger">Vui lòng nhập mật khẩu</p>';
                    }
                    if (empty($errors)) {
                        $user = select_user_login($email, $password);
                        if (is_array($user)) {
                            $_SESSION['user'] = $user;
                            header('Location: ./controller/index.php');
                            $message = '<h6 class="error text-danger">Đăng nhập thành công</h6>';
                            exit;
                        } else {
                            $message = '<h6 class="error text-danger">Email hoặc mật khẩu không chính xác</h6>';
                        }
                        
                    }
                }
                require_once("view/account/login.php");
                break;
            case 'products':
                require_once("./view/products.php");
                break;
            case 'main':
                require_once("view/main.php");
                break;
            case 'productDetails':
                require_once("view/productDetails.php");
                break;
                default:
            include_once './view/main.php';
            break;
    }
} else {
    include_once './view/main.php';
}
include_once './view/footer.php';
ob_end_flush();
?>