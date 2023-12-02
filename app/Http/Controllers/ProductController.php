<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product; // Import model Product

class ProductController extends Controller // Ganti nama controller agar tidak bentrok
{
    public function index() : View
    {
        return view('index', [
            'products' => Product::latest()->paginate(3)
        ]);
    }

    public function create() : View
    {
        return view('products.create');
    }

    public function store(StoreProductRequest $request) : RedirectResponse
    {
        Product::create($request->all());
        return redirect()->route('index') // Ganti menjadi route yang benar
            ->withSuccess('New product is added successfully.');
    }

    public function show(Product $product) : View
    {
        return view('products.show', [
            'product' => $product // Perbaiki nama variabel
        ]);
    }

    public function edit(Product $product) : View
    {
        return view('products.edit', [
            'product' => $product
        ]);
    }

    public function update(UpdateProductRequest $request, Product $product) : RedirectResponse
    {
        $product->update($request->all());
        return redirect()->back()
                ->withSuccess('Product is updated successfully.');
    }

    public function destroy(Product $product) : RedirectResponse
    {
        $product->delete();
        return redirect()->route('index') // Ganti menjadi route yang benar
            ->withSuccess('Product is deleted successfully.');
    }
}
