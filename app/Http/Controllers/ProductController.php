<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($name)
    {
        $product = Product::where('name', $name)->firstOrFail();
        return view('products.show', compact('product'));
    }

    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products',
            'status' => 'required|in:instock,not_in_stock',
        ]);

        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit($name)
    {
        $product = Product::where('name', $name)->firstOrFail();
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $name)
    {
        $request->validate([
            'status' => 'required|in:instock,not_in_stock',
        ]);

        $product = Product::where('name', $name)->firstOrFail();
        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($name)
    {
        $product = Product::where('name', $name)->firstOrFail();
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
