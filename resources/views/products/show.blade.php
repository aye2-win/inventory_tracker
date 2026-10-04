@extends('layouts.app')

@section('title', 'Product Details')

@section('content')

<div class="container-fluid px-0">

    {{-- header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="mb-1">{{ $product->name }}</h2>
        </div>

        <div class="d-flex gap-2">
            <a
                href="{{ route('products.edit', $product) }}"
                class="btn btn-warning"
            >
                Edit
            </a>

            <a
                href="{{ route('products.index') }}"
                class="btn btn-outline-secondary"
            >
                Back
            </a>
        </div>

    </div>


    {{-- product information --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            {{-- basic information --}}
            <div class="mb-5">

                <h6 class="text-uppercase text-muted fw-semibold mb-4">
                    Product Information
                </h6>

                <div class="row g-4">

                    <div class="col-md-6">
                        <div class="small text-muted mb-1">
                            Product Name
                        </div>

                        <div class="fw-semibold">
                            {{ $product->name }}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="small text-muted mb-1">
                            SKU
                        </div>

                        <div class="fw-semibold">
                            {{ $product->sku }}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="small text-muted mb-1">
                            Category
                        </div>

                        <div class="fw-semibold">
                            {{ $product->category->name }}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="small text-muted mb-1">
                            Supplier
                        </div>

                        <div class="fw-semibold">
                            {{ $product->supplier->name }}
                        </div>
                    </div>

                </div>

            </div>


            {{-- pricing and inventory --}}
            <div class="border-top pt-4 mb-5">

                <h6 class="text-uppercase text-muted fw-semibold mb-4">
                    Pricing & Inventory
                </h6>

                <div class="row g-4">

                    <div class="col-sm-6 col-lg-3">
                        <div class="small text-muted mb-1">
                            Purchase Price
                        </div>

                        <div class="fs-5 fw-semibold">
                            ${{ number_format($product->purchase_price, 2) }}
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="small text-muted mb-1">
                            Selling Price
                        </div>

                        <div class="fs-5 fw-semibold">
                            ${{ number_format($product->selling_price, 2) }}
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="small text-muted mb-1">
                            Current Stock
                        </div>

                        <div class="fs-5 fw-semibold">
                            {{ $product->quantity }}
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="small text-muted mb-1">
                            Reorder Level
                        </div>

                        <div class="fs-5 fw-semibold">
                            {{ $product->reorder_level }}
                        </div>
                    </div>

                </div>

            </div>


            {{-- description --}}
            <div class="border-top pt-4">

                <h6 class="text-uppercase text-muted fw-semibold mb-3">
                    Description
                </h6>

                @if($product->description)

                    <p class="text-muted mb-0">
                        {{ $product->description }}
                    </p>

                @else

                    <p class="text-muted fst-italic mb-0">
                        No description available.
                    </p>

                @endif

            </div>

        </div>

    </div>

</div>

@endsection
