<?php

namespace App\Http\Controllers\Api;

use Auth;
use Hash;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Utils\FilterUtil;

class AuthController extends Controller
{
    public function index()
    {

    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        
        //set the result data 
        $result = [
            "success" => false,
            "message" => "",
            "data" => null
        ];

        $credentials = [
            "email" => $email,
            "password" => $password
        ];

        //check if the account exists. 
        $user = User::where('email', $email)->first();

        if($user == null)
        {
            //then send the response the account does not exists. 
            $result['message'] = "An account for " . $email . " does not exist.";
        }
        else {
            //try to login . 
            if(Auth::attempt($credentials))
            {
                //the password is correct.
                //return the user 
                $result['data'] = $user;
                $result['message'] = "Login Successful";
                $result['success'] = true;
            }
            else{
                $result['message'] = "Incorrect password entered.";
            }
        }

        return response()->json($result, 200);
    }

    public function register(Request $request)
    {
        //try to register the user
        $result = [
            "success" => false,
            "message" => "",
            "data" => null
        ];

        //validate the main field.s 
        if( !isset($request->email) )
        {
            $result['message'] = "The email is required!";   
        }
        elseif( ! isset( $request->tel ) )
        {
            $result['message'] = "The telephone number is required!";  
        }
        elseif( ! isset( $request->password ) )
        {
            $result['message'] = "The password is required!";  
        }
        else{

            //validate the telephon number 
            $telFormatted = FilterUtil::filterPhoneNumber($request->tel);

            if( strlen($telFormatted) != 9 )
            {
                $result['message'] = "The telephone number must be 9 digits";  
            }
            else{
                
                //check that an account does not exists already 
                //check with email 
                if( $this->emailAccountExists($request->email) )
                {
                    $result['message'] = "An account already exist with this email"; 
                }
                else if( $this->telAccountExists($telFormatted) )
                {
                    $result['message'] = "An account already exist with this telephone number"; 
                }
                else {

                    $user = new User;
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->tel_unformatted = $request->tel;
                    $user->tel = $telFormatted;
                    $user->level = User::USER_LEVEL_CLIENT;
                    $user->password = Hash::make($request->password);

                    $user->save();

                    //send an sms 
                    $this->sendSms($user);

                    $result['message'] = "Registration Successful";
                    $result['success'] = true;
                    $result['data'] = $user;
                    
                }
            }

            
        }

        //send the response 
        return response()->json($result, 200);
    }

    private function emailAccountExists($email)
    {
        $account = User::where('email', $email)->first();

        if( is_null($account) )
        {
            return false;
        }

        return true;
    }

    private function telAccountExists($tel)
    {
        //check if an account exists with this tel number 
        $user = User::where('tel', $tel)->first();

        if( is_null($user) )   
            return false;

        return true;
    }

    private function sendSms($user)
    {
        //send an sms to the user 
        $username = urlencode("PCC COOP");
        $password = "Pefscom@2020";

        $tel = $user->tel;

        $sms = "Dear " . $user->name 
                . ", \nThanks for registering with the PCC App";

        $url = "http://api.foseintsms.com/api_v3.php?username=" . $username
                . "&password=" . $password . "&message=" . urlencode($sms) 
                . "&telephone=" . $tel;

        file_get_contents($url);
    }
}
