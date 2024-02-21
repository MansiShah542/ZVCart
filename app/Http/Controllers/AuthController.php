<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function userlogin_view()
    {
        return view("auth.usrlogin");
    }

    public function userlogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        //attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role === 'user') {
                $accessToken = auth()->user()->createToken('UserToken', ['user'])->accessToken;
                return redirect()->route('home');
            }else{
                return redirect()->route('login.view')->withInput()->withError('Error: Unauthorized User!');
            }
        } else {
            //authentication failed
            return redirect()->route('login.view')->withInput()->withError('Error: Incorrect Credentials!');
        }
    }

    public function registerUser_view()
    {
        return view("auth.register");
    }

    public function registerUser(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        //hashing password
        $hashedPassword = Hash::make($validatedData['password']);

        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = $hashedPassword;

        //save the user
        $user->save();
        return redirect()->route('login.view')->withSuccess('Registered Successfully');
    }

    public function logout()
    {
        if (Auth::check()) {
            $user = Auth::user();
            //revoking access token
            $user->tokens->each(function ($token,$key) {
                $token->delete();
            });
        Auth::logout(); // Clear the user's session
        }
        return redirect()->route('login.view');
    }

}
