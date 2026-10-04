<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // show all products
    public function index()
    {
        $products = Product::with(['category', 'supplier'])
            ->latest()
            ->get();

        return view('products.index', compact('products'));
    }

    // show create product form
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        $suppliers = Supplier::orderBy('name')->get();

        return view('products.create', compact(
            'categories',
            'suppliers'
        ));
    }

    // store a new product
    public function store(Request $request)
    {
        // validate product data
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:255|unique:products,sku',
            'description' => 'nullable|string',
            'purchase_price' => 'required|numeric|min:0',
            'selling_price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'reorder_level' => 'required|integer|min:0',
        ]);

        // create the product
        Product::create($validated);

        // redirect to product list
        return redirect()
            ->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    // show product details
    public function show(Product $product)
    {
        // load product relationships
        $product->load([
            'category',
            'supplier',
            'stockMovements',
        ]);

        return view('products.show', compact('product'));
    }

    // show edit product form
    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->get();
        $suppliers = Supplier::orderBy('name')->get();

        return view('products.edit', compact(
            'product',
            'categories',
            'suppliers'
        ));
    }

    // update product
    public function update(Request $request, Product $product)
    {
        // validate updated product data
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:255|unique:products,sku,' . $product->id,
            'description' => 'nullable|string',
            'purchase_price' => 'required|numeric|min:0',
            'selling_price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'reorder_level' => 'required|integer|min:0',
        ]);

        // update the product
        $product->update($validated);

        // redirect to product list
        return redirect()
            ->route('products.index')
            ->with('success', 'Product updated successfully.');
    }

    // delete product
    public function destroy(Product $product)
    {
        // delete the product
        $product->delete();

        // redirect to product list
        return redirect()
            ->route('products.index')
            ->with('success', 'Product deleted successfully.');
    }
}