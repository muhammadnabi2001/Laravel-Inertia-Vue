<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        // dd(123);
        $products = Product::latest()->get();
        return Inertia::render('products/index', compact('products'));
    }
    public function create()
    {
        // dd(123);
        return Inertia::render('products/create', []);
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric|min:0|max:10000000000',
            'discription' => 'nullable|string|max:255',
        ]);
        Inertia::flash('toast', [
            'type' => 'success',
            'message' => 'Product created successfully!'
        ]);
        return redirect()->route('products.index')->with('message', 'Product created successfully!');
    }
}
