<?php
function check_user($username) //Return true if user is in database, false if user not in database
{
    $num_returned_rows = sizeof(DB::select("SELECT * FROM users WHERE username =?", [$username]));

    if ($num_returned_rows >= 1)//Username already exists in the database
    {
        return true;
    }

    else //Username is not registered in the database
    {
        return false;
    }
}
?>