<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Seller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
                // $user->createToken('AdminToken')->accessToken;
                $accessToken = auth()->user()->createToken('AdminToken')->accessToken;
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('admin.login.view')->withInput()->withError('Unauthorised User!');
            }
        } else {
            // Authentication failed
            return redirect()->route('admin.login.view')->withInput()->withError('Error: Incorrect Credentials!');
        }
    }
    public function admin_logout()
    {
        if (Auth::check()) {
            $user = Auth::user();
            //revoking access token
            $user->tokens->each(function ($token,$key) {
                $token->delete();
            });
            // $user->token()->revoke();
            Auth::logout(); // Clear the user's session
        }

        return redirect()->route('admin.login.view'); // Redirect the user to the login page
    }

    public function admin_home()
    {
        return view('admin.adminhome');
    }
    // AdminController.php
    public function admin_vendors()
    {
        // $sellers = DB::table("sellers")->get(); // Retrieve all sellers from the database
        $sellers = DB::table("sellers")->paginate(10); // Retrieve all sellers from the database
        return view("admin.vendors", ['sellers' => $sellers]); // Pass fetched sellers data to the view
    }
    public function vendor_approve(Seller $seller)
    {
        $seller->update(['approved' => true]);
        return redirect()->back()->with('success', 'Seller approved successfully.');
    }
    public function vendor_disapprove(Seller $seller)
    {
        $seller->update(['approved' => false]);
        return redirect()->back()->with('success', 'Seller disapproved successfully.');
    }

    public function admin_seller_delete(Seller $seller)
    {
        $seller->delete();
        return redirect()->route('admin.vendors')->with('success', 'Seller deleted Successfully!');
    }
}