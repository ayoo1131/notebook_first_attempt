<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SignupController extends Controller
{
    public function signup_new_user(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $password_repeat = $request->input('password_repeat');

        //Valudate user entry to text fields. Returns null if no errors. Returns error message otherwise
        require (app_path().'/Http/Helpers/Signup/username_password_validate.php');
        $signup_error = username_password_validate($username, $password, $password_repeat);

        //Process adding a new user
        if ($signup_error == null)
        {
            //Check if the entered username already exists in the database
            require (app_path().'/Http/Helpers/Signup/check_user.php');
            $username_in_DB = check_user($username);

            if (!$username_in_DB)//new username was not found in the users database, add it to the database
            {
                require (app_path().'/Http/Helpers/Signup/create_new_user.php');
                create_new_user($username, $password);

                return redirect('/login_page')->with('signup_message_success','Account successfully created');;
            }

            else
            {
                $signup_error = "Username is already taken";
            }
        }

        return redirect('/signup_page')->with('signup_message_error',$signup_error);
    }
}
