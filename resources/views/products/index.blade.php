@extends('layouts.app')

@section('title', 'Products')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Products</h2>

    <a href="{{ route('products.create') }}" class="btn btn-primary">
        Add Product
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">

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
                            <td>{{ $product->id }}</td>

                            <td>
                                {{ $product->name }}
                            </td>

                            <td>
                                {{ $product->sku }}
                            </td>

                            <td>
                                {{ $product->category->name }}
                            </td>

                            <td>
                                {{ $product->supplier->name }}
                            </td>

                            <td>
                                ${{ number_format($product->selling_price, 2) }}
                            </td>

                            <td>
                                @if($product->quantity <= $product->reorder_level)
                                    <span class="badge bg-danger">
                                        {{ $product->quantity }}
                                    </span>
                                @else
                                    <span class="badge bg-success">
                                        {{ $product->quantity }}
                                    </span>
                                @endif
                            </td>

                            <td>
                                <a
                                    href="{{ route('products.show', $product) }}"
                                    class="btn btn-sm btn-info text-white"
                                >
                                    View
                                </a>

                                <a
                                    href="{{ route('products.edit', $product) }}"
                                    class="btn btn-sm btn-warning"
                                >
                                    Edit
                                </a>

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