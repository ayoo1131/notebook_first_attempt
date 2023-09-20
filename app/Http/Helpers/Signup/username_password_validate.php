<?php
function username_password_validate($username, $password, $password_repeat)
{
    //Server side validation of user entered Sign-Up information
    if (empty($username))
    {
        return "Username is required";
    }

    elseif (strlen($password) < 8)
    {
        return "Password must be greater than 8 characters";
    }

    elseif( ! preg_match("/[a-zA-Z]/i", $password))
    {
        return "Password must contain at least one letter";
    }

    elseif( ! preg_match("/\d/", $password))
    {
        return "Password must contain at least one number";
    }

    elseif (strcmp($password, $password_repeat) !== 0)
    {
        return "Passwords do not match";
    }

    else
    {
        return null;
    }
}
?>
