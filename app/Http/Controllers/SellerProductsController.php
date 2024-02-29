<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Models\SellerProducts;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use Schema;

class SellerProductsController extends Controller
{
    public function seller_products()
    {
        $products = DB::table('seller_products')->get();
        return view('seller.sproducts',['products'=>$products]);
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
            'discount' => ['required', 'integer', 'min:0'],
            'quantity'=> ['required', 'integer','min:0'],
            'description' => ['required', 'string'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);
        // Upload the image
        $imagePath = $request->file('image')->store('products', 'public');
        // $instock = $request->has('instock') && $request->input('instock') === '1';
        $instock=$validatedData['quantity']>0;

        // Create the product
        $product = new SellerProducts();
        $product->name = $validatedData['name'];
        $product->brand = $validatedData['brand'];
        $product->category_id = $validatedData['category'];
        $product->price = $validatedData['price'];
        $product->discount = $validatedData['discount'];
        $product->quantity = $validatedData['quantity'];
        $product->instock = $instock;
        $product->description = $validatedData['description'];
        $product->image = $imagePath;
        $product->save();
        // dd($product);

        // Redirect back with success message
        return redirect()->route('products.add.view')->withSuccess('Product added successfully');
    }
    public function product_delete(Request $request, $id)
    {
        $product=SellerProducts::find( $id );
        if(!$product){
            return redirect()->back()->withError('Product Not Found');
        }
        try{
            $product->delete();
            Storage::disk('public')->delete($product->image);
            return redirect()->back()->withSuccess('Product Deleted Successfully');
        }catch(\Exception $e){
            return redirect()->back()->withError('Failed to delete product'. $e->getMessage());
        }
    }
}
