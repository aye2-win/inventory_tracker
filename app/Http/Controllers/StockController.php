<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('name')->get();

        $movements = StockMovement::with('product')
            ->latest()
            ->get();

        return view('stocks.index', compact(
            'products',
            'movements'
            ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'type' => 'required|in:in,out',
            'quantity' => 'required|integer|min:1',
            'note' => 'nullable|string',
        ]);

        $product = Product::findOrFail($validated['product_id']);

        if (
            $validated['type'] === 'out' &&
            $product->quantity < $validated['quantity']
        ) {
            return redirect()
                ->back()
                ->with('error', 'Not enough stock available.');
        }

        if ($validated['type'] === 'in') {
            $product->quantity += $validated['quantity'];
        } else {
            $product->quantity -= $validated['quantity'];
        }

        $product->save();

        StockMovement::create([
            'product_id' => $product->id,
            'type' => $validated['type'],
            'quantity' => $validated['quantity'],
            'note' => $validated['note'] ?? null,
        ]);

        return redirect()
            ->route('stock.index')
            ->with('success', 'Stock movement recorded successfully.');
    }
}