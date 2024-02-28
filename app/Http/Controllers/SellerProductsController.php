<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Models\SellerProducts;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Schema;

class SellerProductsController extends Controller
{
    public function seller_products()
    {
        return view('seller.sproducts');
    }
    public function products_add_view()
    {
        $categories = DB::table('product_categories')->get();
        return view('seller.addProducts', ['categories' => $categories]);
    }

    public function products_add(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'brand' => ['required', 'string', 'max:255'],
            'category' => ['required', 'integer'],
            'price' => ['required', 'integer', 'min:0'],
            'quantity' => ['required', 'integer', 'min:0'],
            'instock' => ['boolean'],
            'description' => ['required', 'string'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);
        // Upload the image
        $imagePath = $request->file('image')->store('products', 'public');
        $instock = $request->has('instock') && $request->input('instock') === '1';

        // Create the product
        $product = new sellerProducts();
        $product->name = $validatedData['name'];
        $product->brand = $validatedData['brand'];
        $product->category_id = $validatedData['category'];
        $product->price = $validatedData['price'];
        $product->quantity = $validatedData['quantity'];
        $product->instock = $instock;
        $product->description = $validatedData['description'];
        $product->image = $imagePath;
        $product->save();
        // dd($product);

        // Redirect back with success message
        return redirect()->route('products.add.view')->withSuccess('Product added successfully');
    }
}
