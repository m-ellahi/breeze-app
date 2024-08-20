<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view('product/product',compact('product'));
    }

    public function view_product($id)
    {
        $product = Product::find($id);
        return view('product/view',compact('product'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('product/edit',compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_discounted_price' => 'required|numeric',
            'product_actual_price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $product = Product::findOrFail($id);

        $product->product_name = $request->product_name;
        $product->product_discounted_price = $request->product_discounted_price;
        $product->product_actual_price = $request->product_actual_price;


        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads/product', 'public');
            
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $product->image = $imagePath;
        }

        $product->save();

        return redirect()->route('edit-product', $id)->with('status', 'product-updated');
    }

    public function destroy_product($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image) {
            $imagePath = 'uploads/product/' . $product->image;
            Storage::disk('public')->delete($imagePath);
        }
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }

    public function add()
    {
        return view('product/add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_discounted_price' => 'required|numeric',
            'product_actual_price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads/product', 'public');
        }

        Product::create([
            'product_name' => $request->input('product_name'),
            'product_discounted_price' => $request->input('product_discounted_price'),
            'product_actual_price' => $request->input('product_actual_price'),
            'image' => $imagePath,
        ]);

        return redirect()->route('product.index')->with('success', 'Product added successfully.');
    }


}
