<?php
function create_new_user($username, $password)
{
    //Hash the password for safe storage
    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    //Insert the Username and Hashed Password into the users table
    DB::insert('INSERT INTO users (username, password_hash) VALUES (?, ?)', [$username, $hash_password]);
}
?>