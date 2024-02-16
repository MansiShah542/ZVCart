<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function seller_login_view()
    {
        return view("seller.slogin");
    }
    public function seller_register_view()
    {
        return view("seller.sregister");
    }
}
