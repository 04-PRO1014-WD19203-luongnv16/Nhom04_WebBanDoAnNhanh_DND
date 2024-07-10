<?php
function insert_user($full_name, $email, $password, $phone_number, $address, $avatar_url)
{
    $sql = "INSERT INTO `users`(`full_name`, `email`, `password`, `phone_number`, `address`,`avatar_url`)
        VALUES('$full_name','$email','$password','$phone_number','$address','$avatar_url')";
    pdo_execute($sql);
}