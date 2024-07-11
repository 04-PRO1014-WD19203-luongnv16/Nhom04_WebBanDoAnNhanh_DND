<?php

// accouct Signup
function insert_user($full_name, $email, $password, $phone_number, $address, $avatar_url)
{
    $sql = "INSERT INTO `users`(`full_name`, `email`, `password`, `phone_number`, `address`,`avatar_url`)
        VALUES('$full_name','$email','$password','$phone_number','$address','$avatar_url')";
    pdo_execute($sql);
}

// Account Login
function select_user_login($email, $password) {
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    return pdo_query_one($sql);
}

// List Account
function select_all_users() {
    $sql = "SELECT * FROM users";
    return pdo_query($sql);
}

// Edit Account
// Select User by ID
function select_user_by_id($user_id) {
    $sql = "SELECT * FROM users WHERE user_id = :user_id";
    return pdo_query_one($sql, ['user_id' => $user_id]);
}

// Update User
function update_user($user_id, $full_name, $email, $phone_number, $password, $address, $avatar_url) {
    $sql = "UPDATE users SET full_name = :full_name, email = :email, phone_number = :phone_number, password = :password, address = :address, avatar_url = :avatar_url WHERE user_id = :user_id";
    pdo_execute($sql, [
        'full_name' => $full_name,
        'email' => $email,
        'phone_number' => $phone_number,
        'password' => $password,
        'address' => $address,
        'avatar_url' => $avatar_url,
        'user_id' => $user_id
    ]);
}




// Delete Account
function delete_user($user_id) {
    $sql = "DELETE FROM users WHERE user_id=" . $user_id;
    pdo_execute($sql);
}
