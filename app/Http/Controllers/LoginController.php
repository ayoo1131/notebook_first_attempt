<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login_existing_user(Request $request)
    {
        $data=$request->input();
        //return $data;

        $login_username = $request->input('username');
        $login_password = $request->input('password');

        //Handle errors caused by users not entering in textfield for username, password, or both
        if(empty($login_username) and empty($login_password))
        {
            return redirect('/login_page') -> with('login_message_error', 'Please Enter the Username and Password');
        }

        elseif (empty($login_username))
        {
            return redirect('/login_page') -> with('login_message_error', 'Please Enter the Username');
        }

        elseif(empty($login_password))
        {
            return redirect('/login_page') -> with('login_message_error', 'Please Enter the Password');
        }

        //Process the username and password entered by the user
        else
        {
            //Valudate user entry to text fields. Returns null if no errors. Returns error message otherwise
            require (app_path().'/Http/Helpers/Signup/check_user.php');
            $user_in_database = check_user($login_username);
            
            if(!$user_in_database)//username is not in the database, requrn error message
            {
                return redirect('/login_page') -> with('login_message_error', 'Username is not recognized');
            }

            else //username is in the database, check if the password matches the one in the database
            {
                require (app_path().'/Http/Helpers/Login/username_password_login.php');
                $successful_login = username_password_login($login_username, $login_password);

                if (! $successful_login)//username does not match password
                {
                    return redirect('/login_page')->with('login_message_error', 'Username and Password are not valid');
                }

                else //user entered username password are correct
                {
                    $request -> session()-> put('username', $login_username);
                    print_r($data);
                    //return redirect('notebook_page');
                }
            }

            
        }


    }
}
