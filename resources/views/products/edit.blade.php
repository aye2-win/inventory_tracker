@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')

<!-- page header -->
<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Edit Product</h2>

    <!-- go back to products page -->
    <a
        href="{{ route('products.index') }}"
        class="btn btn-secondary"
    >
        Back
    </a>

</div>

<!-- product edit form card -->
<div class="card shadow-sm">

    <div class="card-body">

        <!-- edit product form -->
        <form
            action="{{ route('products.update', $product) }}"
            method="POST"
        >

            @csrf
            @method('PUT')

            <div class="row">

                <!-- product name -->
                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{ old('name', $product->name) }}"
                        required
                    >

                </div>

                <!-- product sku -->
                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        SKU
                    </label>

                    <input
                        type="text"
                        name="sku"
                        class="form-control"
                        value="{{ old('sku', $product->sku) }}"
                        required
                    >

                </div>

                <!-- select product category -->
                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Category
                    </label>

                    <select
                        name="category_id"
                        class="form-select"
                        required
                    >

                        @foreach($categories as $category)

                            <option
                                value="{{ $category->id }}"
                                @selected(
                                    old(
                                        'category_id',
                                        $product->category_id
                                    ) == $category->id
                                )
                            >
                                {{ $category->name }}
                            </option>

                        @endforeach

                    </select>

                </div>

                <!-- select product supplier -->
                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Supplier
                    </label>

                    <select
                        name="supplier_id"
                        class="form-select"
                        required
                    >

                        @foreach($suppliers as $supplier)

                            <option
                                value="{{ $supplier->id }}"
                                @selected(
                                    old(
                                        'supplier_id',
                                        $product->supplier_id
                                    ) == $supplier->id
                                )
                            >
                                {{ $supplier->name }}
                            </option>

                        @endforeach

                    </select>

                </div>

                <!-- purchase price -->
                <div class="col-md-4 mb-3">

                    <label class="form-label">
                        Purchase Price
                    </label>

                    <input
                        type="number"
                        step="0.01"
                        name="purchase_price"
                        class="form-control"
                        value="{{ old(
                            'purchase_price',
                            $product->purchase_price
                        ) }}"
                        min="0"
                        required
                    >

                </div>

                <!-- selling price -->
                <div class="col-md-4 mb-3">

                    <label class="form-label">
                        Selling Price
                    </label>

                    <input
                        type="number"
                        step="0.01"
                        name="selling_price"
                        class="form-control"
                        value="{{ old(
                            'selling_price',
                            $product->selling_price
                        ) }}"
                        min="0"
                        required
                    >

                </div>

                <!-- product quantity -->
                <div class="col-md-4 mb-3">

                    <label class="form-label">
                        Quantity
                    </label>

                    <input
                        type="number"
                        name="quantity"
                        class="form-control"
                        value="{{ old(
                            'quantity',
                            $product->quantity
                        ) }}"
                        min="0"
                        required
                    >

                </div>

                <!-- reorder level -->
                <div class="col-md-4 mb-3">

                    <label class="form-label">
                        Reorder Level
                    </label>

                    <input
                        type="number"
                        name="reorder_level"
                        class="form-control"
                        value="{{ old(
                            'reorder_level',
                            $product->reorder_level
                        ) }}"
                        min="0"
                        required
                    >

                </div>

                <!-- product description -->
                <div class="col-12 mb-3">

                    <label class="form-label">
                        Description
                    </label>

                    <textarea
                        name="description"
                        class="form-control"
                        rows="4"
                    >{{ old(
                        'description',
                        $product->description
                    ) }}</textarea>

                </div>

            </div>

            <!-- update product -->
            <button
                type="submit"
                class="btn btn-primary"
            >
                Update Product
            </button>

        </form>

    </div>

</div>

@endsection