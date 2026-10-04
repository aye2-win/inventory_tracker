<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- set the page title -->
    <title>@yield('title', 'Inventory Tracker')</title>

    <!-- load bootstrap css -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">

<!-- navigation bar -->
<nav class="navbar navbar-dark bg-dark">
    <div class="container">

        <!-- link to products page -->
        <a class="navbar-brand" href="{{ route('products.index') }}">
            Inventory Tracker
        </a>

        <!-- navigation links -->
        <div>
            <a href="{{ route('products.index') }}" class="btn btn-outline-light btn-sm">
                Products
            </a>

            <a href="{{ route('stock.index') }}" class="btn btn-outline-light btn-sm">
                Stock
            </a>
        </div>
    </div>
</nav>

<!-- main page content -->
<main class="container py-4">

    <!-- show success message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- show error message -->
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- show validation errors -->
    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- display page content -->
    @yield('content')

</main>

</body>
</html>