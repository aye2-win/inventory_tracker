@extends('layouts.app')

@section('title', 'Stock Management')

@section('content')

<div class="container-fluid px-0">

    {{-- header --}}
    <div class="mb-4">
        <h2 class="mb-1">Stock Management</h2>
        <p class="text-muted mb-0">
            Record stock changes and monitor current inventory.
        </p>
    </div>


    {{-- record stock movement --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body p-4">

            <div class="mb-4">
                <h5 class="mb-1">Record Stock Movement</h5>
                <p class="text-muted small mb-0">
                    Add or remove stock from inventory.
                </p>
            </div>

            <form
                action="{{ route('stock.store') }}"
                method="POST"
            >

                @csrf

                <div class="row g-3">

                    <div class="col-md-4">

                        <label
                            for="product_id"
                            class="form-label"
                        >
                            Product
                        </label>

                        <select
                            id="product_id"
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


                    <div class="col-md-3">

                        <label
                            for="type"
                            class="form-label"
                        >
                            Type
                        </label>

                        <select
                            id="type"
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


                    <div class="col-md-2">

                        <label
                            for="quantity"
                            class="form-label"
                        >
                            Quantity
                        </label>

                        <input
                            id="quantity"
                            type="number"
                            name="quantity"
                            class="form-control"
                            min="1"
                            required
                        >

                    </div>


                    <div class="col-md-3">

                        <label
                            for="note"
                            class="form-label"
                        >
                            Note
                        </label>

                        <input
                            id="note"
                            type="text"
                            name="note"
                            class="form-control"
                            placeholder="Optional"
                        >

                    </div>

                </div>


                <div class="mt-4">

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Record Movement
                    </button>

                </div>

            </form>

        </div>

    </div>


    {{-- current stock --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-0">

            <div class="p-4 border-bottom">
                <h5 class="mb-1">Current Stock</h5>
                <p class="text-muted small mb-0">
                    Current inventory levels for all products.
                </p>
            </div>


            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>
                            <th class="px-4">Product</th>
                            <th>SKU</th>
                            <th>Current Stock</th>
                            <th>Reorder Level</th>
                            <th>Status</th>
                        </tr>

                    </thead>


                    <tbody>

                        @forelse($products as $product)

                            <tr>

                                <td class="px-4 fw-semibold">
                                    {{ $product->name }}
                                </td>

                                <td class="text-muted">
                                    {{ $product->sku }}
                                </td>

                                <td>
                                    {{ $product->quantity }}
                                </td>

                                <td>
                                    {{ $product->reorder_level }}
                                </td>

                                <td>

                                    @if($product->quantity <= 0)

                                        <span class="badge bg-danger">
                                            Out of Stock
                                        </span>

                                    @elseif($product->quantity <= $product->reorder_level)

                                        <span class="badge bg-warning text-dark">
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
                                    class="text-center text-muted py-5"
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

</div>

@endsection