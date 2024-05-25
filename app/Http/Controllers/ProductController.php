<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::paginate(10);

        return view('pages.product.index', [
            'product' => $product
        ]);
    }

    public function create()
    {
        $category = Category::all();
        return view('pages.product.create', [
            'category' => $category
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Product::create($data);

        return redirect()->route('dashboard.product.index');
    }

    public function edit(Product $product)
    {
        $category = Category::all();

        return view('pages.product.edit', [
            'item' => $product,
            'category' => $category
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->all();
        $product->update($data);

        return redirect()->route('dashboard.product.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('dashboard.product.index');
    }
}
