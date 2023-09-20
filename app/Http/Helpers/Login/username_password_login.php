<?php

function username_password_login($login_username, $login_password)
{
    //Insert the Username and Hashed Password into the users table
    $database_password_hash_array = DB::select('SELECT password_hash FROM users WHERE username = ?', [$login_username]);
    $password_hash_array = $database_password_hash_array[0];
    $password_hash = $password_hash_array->password_hash; 

    return password_verify($login_password, $password_hash);
}

?>