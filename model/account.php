<?php

// accouct Signup(Đăng ký tài khoản)
function insert_user($full_name, $email, $password, $phone_number, $address, $avatar_url)
{
    $sql = "INSERT INTO `users`(`full_name`, `email`, `password`, `phone_number`, `address`,`avatar_url`)
        VALUES('$full_name','$email','$password','$phone_number','$address','$avatar_url')";
    pdo_execute($sql);
}

//check email exists or not(Kiểm tra email tồn tại hay không)
function email_exists($email) {
    $sql = "SELECT COUNT(*) AS count FROM users WHERE email = :email";
    $result = pdo_query_one($sql, ['email' => $email]);
    return $result['count'] > 0;
}

// Account Login( Đăng nhập tài khoản)
function select_user_login($email, $password) {
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    return pdo_query_one($sql);
}

// List Account ( Danh sách tất cả tài khoản)
function select_all_users() {
    $sql = "SELECT * FROM users";
    return pdo_query($sql);
}

// Chỉnh sửa tài khoản (lấy thông tin tài khoản theo ID)
function select_user_by_id($user_id) {
    $sql = "SELECT * FROM users WHERE user_id = :user_id";
    return pdo_query_one($sql, compact('user_id'));
}

// Edit Account (Cập nhật thông tin tài khoản)
function update_user($user_id, $full_name, $email, $phone_number, $password, $address, $avatar_url) {
    $sql = "UPDATE users SET full_name = :full_name, email = :email, phone_number = :phone_number, 
            password = :password, address = :address, avatar_url = :avatar_url WHERE user_id = :user_id";
    $params = array(
        ':user_id' => $user_id,
        ':full_name' => $full_name,
        ':email' => $email,
        ':phone_number' => $phone_number,
        ':password' => $password,
        ':address' => $address,
        ':avatar_url' => $avatar_url
    );
    pdo_execute($sql, $params);
}

// Delete Account (Xóa tài khoản)
function delete_users($user_id) {
    $sql = "DELETE FROM users WHERE user_id=" . $user_id;
    pdo_execute($sql);
}


// // Update Users
// function update_user($user_id, $full_name, $email, $password, $phone_number, $address, $avatar_url) {
//     $sql = "UPDATE `users` SET `full_name` = ?, `email` = ?, `password` = ?, `phone_number` = ?, `address` = ?, `avatar_url` = ? WHERE `user_id` = ?";
//     return pdo_execute($sql, $full_name, $email, $password, $phone_number, $address, $avatar_url, $user_id);
// }




