<?php

namespace App\Http\Controllers;
use App\Models\SellerProducts;

use Illuminate\Http\Request;

class SellerProductsController extends Controller
{
    public function seller_products()
    {
        return view('seller.sproducts');
    }
    public function products_add_view()
    {
        return view('seller.addProducts');
    }
    public function products_add(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'category' => 'required|integer',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'instock' => 'nullable|boolean',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        // Upload the image
        $imagePath = $request->file('image')->store('products', 'public');

        // Create the product
        $product = new Product();
        $product->name = $validatedData['name'];
        $product->brand = $validatedData['brand'];
        $product->category_id = $validatedData['category'];
        $product->price = $validatedData['price'];
        $product->quantity = $validatedData['quantity'];
        $product->instock = $validatedData['instock'] ?? true;
        $product->description = $validatedData['description'];
        $product->image = $imagePath;
        $product->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Product added successfully');
    }
}
