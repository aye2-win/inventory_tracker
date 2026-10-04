<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Http\Request;

class StockController extends Controller
{
    // show products and stock movements
    public function index()
    {
        // get all products
        $products = Product::orderBy('name')->get();

        // get all stock movements with product details
        $movements = StockMovement::with('product')
            ->latest()
            ->get();

        return view('stocks.index', compact(
            'products',
            'movements'
        ));
    }

    // store a new stock movement
    public function store(Request $request)
    {
        // validate stock movement data
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'type' => 'required|in:in,out',
            'quantity' => 'required|integer|min:1',
            'note' => 'nullable|string',
        ]);

        // find the selected product
        $product = Product::findOrFail($validated['product_id']);

        // check if there is enough stock for stock out
        if (
            $validated['type'] === 'out' &&
            $product->quantity < $validated['quantity']
        ) {
            return redirect()
                ->back()
                ->with('error', 'Not enough stock available.');
        }

        // increase stock when type is in
        if ($validated['type'] === 'in') {
            $product->quantity += $validated['quantity'];
        } else {
            // decrease stock when type is out
            $product->quantity -= $validated['quantity'];
        }

        // save the updated stock quantity
        $product->save();

        // create stock movement record
        StockMovement::create([
            'product_id' => $product->id,
            'type' => $validated['type'],
            'quantity' => $validated['quantity'],
            'note' => $validated['note'] ?? null,
        ]);

        // redirect to stock page
        return redirect()
            ->route('stock.index')
            ->with('success', 'Stock movement recorded successfully.');
    }
}