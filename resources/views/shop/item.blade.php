<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Shop Page</title>
</head>
<body>
    @include('sweetalert::alert')
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img class="d-inline-block align-text-top me-3" width="35" height="29" src="{{ asset('/images/trolley.png')}}" alt="Logo">
                Online Shopping
            </a>
        </div>
    </nav>
    <div class="container mt-5">
        <h4 class="h4">Item List</h4>
        <a class="btn btn-primary mt-4" role="button" href="{{ route('addItem') }}">Add New Item</a>
        <table class="table table-hover mt-4">
            <thead>
                <td>No</td>
                <td>Item Name</td>
                <td>Item Image</td>
                <td>Item Desc</td>
                <td>Item Price</td>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->item_name }}</td>
                    <td>
                        <img src="{{ asset('/images/item/'. $item->item_image )}}" alt="Item Image" width="30" height="24">
                    </td>
                    <td>{{ $item->item_desc }}</td>
                    <td>Rp. {{ $item->item_price }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>