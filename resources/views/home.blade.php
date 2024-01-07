<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Homepage</title>
</head>
<body>
    @include('sweetalert::alert')
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img class="d-inline-block align-text-top me-3" width="35" height="29" src="{{ asset('/images/trolley.png')}}" alt="Logo">
                Online Shopping
            </a>
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link" style="text-decoration: none;" href="{{ route('orderItems') }}">Orders</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            @foreach ($data as $item)
            <div class="col-md-4">
                <div class="card mb-3">
                    <img class="card-img-top" width="40" height="200" src="{{ asset('/images/item/'. $item->item_image) }}" alt="Item">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->item_name }}</h5>
                        <p class="card-text">{{ $item->item_desc }}</p>
                        <a class="btn btn-primary" href="{{ route('buyItem', $item->id) }}">Buy</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>