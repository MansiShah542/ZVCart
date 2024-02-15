<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    public function admin_login_view(Request $request)
    {
        return view("admin.adminLogin");
    }


    public function admin_login(Request $req)
    {
        $credentials = $req->only('name', 'password');
        $validated = $req->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($validated)) {
            $user = Auth::user();

            if ($user->role === 'admin') {

                return redirect()->route('admin.dashboard');
            }else{
                return redirect('login')->withInput()->withError('Error: Incorrect Credentials!');
            }
        } else {
            // Authentication failed
            // dd($credentials);
            return redirect('admin/login')->withInput()->withError('Error: Incorrect Credentials!');
        }
    }

    public function admin_logout()
    {
        Auth::logout(); // Clear the user's session
        return redirect('admin/login'); // Redirect the user to the login page or any other desired page
    }
}
