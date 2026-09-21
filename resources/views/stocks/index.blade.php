@extends('layouts.app')

@section('title', 'Stock Management')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Stock Management</h2>

    <a
        href="{{ route('products.index') }}"
        class="btn btn-secondary"
    >
        Products
    </a>
</div>

<div class="card shadow-sm mb-4">

    <div class="card-header">
        <h5 class="mb-0">Record Stock Movement</h5>
    </div>

    <div class="card-body">

        <form
            action="{{ route('stock.store') }}"
            method="POST"
        >

            @csrf

            <div class="row">

                <div class="col-md-4 mb-3">

                    <label class="form-label">
                        Product
                    </label>

                    <select
                        name="product_id"
                        class="form-select"
                        required
                    >

                        <option value="">
                            Select Product
                        </option>

                        @foreach($products as $product)

                            <option value="{{ $product->id }}">
                                {{ $product->name }}
                                (Stock: {{ $product->quantity }})
                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-md-3 mb-3">

                    <label class="form-label">
                        Type
                    </label>

                    <select
                        name="type"
                        class="form-select"
                        required
                    >

                        <option value="">
                            Select Type
                        </option>

                        <option value="in">
                            Stock In
                        </option>

                        <option value="out">
                            Stock Out
                        </option>

                    </select>

                </div>

                <div class="col-md-2 mb-3">

                    <label class="form-label">
                        Quantity
                    </label>

                    <input
                        type="number"
                        name="quantity"
                        class="form-control"
                        min="1"
                        required
                    >

                </div>

                <div class="col-md-3 mb-3">

                    <label class="form-label">
                        Note
                    </label>

                    <input
                        type="text"
                        name="note"
                        class="form-control"
                        placeholder="Optional"
                    >

                </div>

            </div>

            <button
                type="submit"
                class="btn btn-primary"
            >
                Record Movement
            </button>

        </form>

    </div>

</div>

<div class="card shadow-sm">

    <div class="card-header">
        <h5 class="mb-0">Current Stock</h5>
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead>
                    <tr>
                        <th>Product</th>
                        <th>SKU</th>
                        <th>Current Stock</th>
                        <th>Reorder Level</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($products as $product)

                        <tr>

                            <td>
                                {{ $product->name }}
                            </td>

                            <td>
                                {{ $product->sku }}
                            </td>

                            <td>
                                {{ $product->quantity }}
                            </td>

                            <td>
                                {{ $product->reorder_level }}
                            </td>

                            <td>

                                @if($product->quantity <= $product->reorder_level)

                                    <span class="badge bg-danger">
                                        Low Stock
                                    </span>

                                @else

                                    <span class="badge bg-success">
                                        In Stock
                                    </span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td
                                colspan="5"
                                class="text-center py-4"
                            >
                                No products found.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection