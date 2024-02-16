<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SellerController extends Controller
{
    public function seller_login_view()
    {
        return view("seller.slogin");
    }
    public function seller_login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required','min:8'],
        ]);

        if (Auth::guard('seller')->attempt($credentials)) {
            $seller = Auth::guard('seller')->user();
            if ($seller->approved) {
                // Seller is approved, proceed with login
                return redirect()->route('seller.dashboard'); // Adjust the route to your seller dashboard
            } else {
                // Seller is not approved, logout and redirect back with error
                Auth::guard('seller')->logout();
                return redirect()->route('seller.login.view')->with('error', 'Your account is not yet approved by the Admin.');
            }
        } else {
            // Login failed
            return redirect()->route('seller.login.view')->with('error', 'Invalid credentials.');
        }
    }

    public function seller_register_view()
    {
        return view("seller.sregister");
    }

    public function seller_register(Request $request)
    {
        $credentials = $request->validate([
            'company_name'=> ['required'],
            'approved',
            'gst_no'=> ['nullable', 'regex:/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/'],
            'phone'=> ['required','min:10'],
            'address'=> ['required'],
            'email'=> ['required','email','unique:sellers'],
            'password'=>['required', 'min:8', 'confirmed'],
        ]);

        //hashing password
        $hashedPassword = Hash::make($credentials['password']);
        $seller=new Seller();
        $seller->company_name=$credentials['company_name'];
        $seller->gst_no=$credentials['gst_no'];
        $seller->phone=$credentials['phone'];
        $seller->address=$credentials['address'];
        $seller->email=$credentials['email'];
        $seller->password=$hashedPassword;
        $seller->save();

        Session::flash('success', 'Registration successful!');

        return redirect()->route('seller.login.view');
    }
    public function seller_logout(){
        Auth::logout(); // Clear the user's session
        return redirect('seller.login.view');
    }
}
