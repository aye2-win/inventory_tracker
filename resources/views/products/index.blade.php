@extends('layouts.app')

@section('title', 'Products')

@section('content')

<!-- page header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Products</h2>

    <!-- go to add product page -->
    <a href="{{ route('products.create') }}" class="btn btn-primary">
        Add Product
    </a>
</div>

<!-- products table card -->
<div class="card shadow-sm">
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">

                <!-- table headings -->
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>SKU</th>
                        <th>Category</th>
                        <th>Supplier</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th width="220">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($products as $product)

                        <tr>
                            <!-- product id -->
                            <td>{{ $product->id }}</td>

                            <!-- product name -->
                            <td>{{ $product->name }}</td>

                            <!-- product sku -->
                            <td>{{ $product->sku }}</td>

                            <!-- product category -->
                            <td>{{ $product->category->name }}</td>

                            <!-- product supplier -->
                            <td>{{ $product->supplier->name }}</td>

                            <!-- selling price -->
                            <td>
                                ${{ number_format($product->selling_price, 2) }}
                            </td>

                            <!-- product stock -->
                            <td>
                                @if($product->quantity <= $product->reorder_level)

                                    <!-- show low stock -->
                                    <span class="badge bg-danger">
                                        {{ $product->quantity }}
                                    </span>

                                @else

                                    <!-- show available stock -->
                                    <span class="badge bg-success">
                                        {{ $product->quantity }}
                                    </span>

                                @endif
                            </td>

                            <!-- product actions -->
                            <td>

                                <!-- view product -->
                                <a
                                    href="{{ route('products.show', $product) }}"
                                    class="btn btn-sm btn-info text-white"
                                >
                                    View
                                </a>

                                <!-- edit product -->
                                <a
                                    href="{{ route('products.edit', $product) }}"
                                    class="btn btn-sm btn-warning"
                                >
                                    Edit
                                </a>

                                <!-- delete product -->
                                <form
                                    action="{{ route('products.destroy', $product) }}"
                                    method="POST"
                                    class="d-inline"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Delete this product?')"
                                    >
                                        Delete
                                    </button>
                                </form>

                            </td>
                        </tr>

                    @empty

                        <!-- show message when no products exist -->
                        <tr>
                            <td colspan="8" class="text-center py-4">
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