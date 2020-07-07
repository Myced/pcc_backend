<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users', compact('users'));
    }

    public function show($user_id)
    {
        $user = User::find($user_id);

        return view('user_details', ['user' => $user]);
    }

    public function updatePassword(Request $request, $user_id)
    {
        //update the user password 
        $password = $request->password;

        if( ! empty($password) )
        {
            $user = User::find($user_id);

            if( ! is_null($user) )
            {
                $user->password = \Hash::make($password);
                $user->save();

                session()->flash('success', "User Password Updated");
            }
        }

        return back();
    }

    public function updateUserInfo(Request $request, $user_id)
    {
        $user = User::find($user_id);

        if( ! is_null($user) )
        {
            //update the user information
            $user->name = $request->name;
            $user->email = $request->email;
            $user->tel = $request->tel;

            $user->save();

            //flash notification to the session 
            session()->flash('info', 'User Information Updated');

        }

        return back();
    }
}
