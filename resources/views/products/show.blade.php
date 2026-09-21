@extends('layouts.app')

@section('title', 'Product Details')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Product Details</h2>

    <div>

        <a
            href="{{ route('products.edit', $product) }}"
            class="btn btn-warning"
        >
            Edit
        </a>

        <a
            href="{{ route('products.index') }}"
            class="btn btn-secondary"
        >
            Back
        </a>

    </div>

</div>

<div class="card shadow-sm">

    <div class="card-body">

        <div class="row">

            <div class="col-md-6 mb-3">

                <strong>Name</strong>

                <p>
                    {{ $product->name }}
                </p>

            </div>

            <div class="col-md-6 mb-3">

                <strong>SKU</strong>

                <p>
                    {{ $product->sku }}
                </p>

            </div>

            <div class="col-md-6 mb-3">

                <strong>Category</strong>

                <p>
                    {{ $product->category->name }}
                </p>

            </div>

            <div class="col-md-6 mb-3">

                <strong>Supplier</strong>

                <p>
                    {{ $product->supplier->name }}
                </p>

            </div>

            <div class="col-md-4 mb-3">

                <strong>Purchase Price</strong>

                <p>
                    ${{ number_format(
                        $product->purchase_price,
                        2
                    ) }}
                </p>

            </div>

            <div class="col-md-4 mb-3">

                <strong>Selling Price</strong>

                <p>
                    ${{ number_format(
                        $product->selling_price,
                        2
                    ) }}
                </p>

            </div>

            <div class="col-md-4 mb-3">

                <strong>Quantity</strong>

                <p>
                    {{ $product->quantity }}
                </p>

            </div>

            <div class="col-md-4 mb-3">

                <strong>Reorder Level</strong>

                <p>
                    {{ $product->reorder_level }}
                </p>

            </div>

            <div class="col-12">

                <strong>Description</strong>

                <p>
                    {{ $product->description ?: 'No description.' }}
                </p>

            </div>

        </div>

    </div>

</div>

@endsection