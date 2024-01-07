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
        <h4 class="h4">List Items Order</h4>
        <a class="btn btn-primary mt-4" role="button" href="/">Back</a>
        <table class="table table-hover mt-4">
            <thead>
                <td>No</td>
                <td>Item ID</td>
                <td>Order Date</td>
                <td>Total Price</td>
                <td>Confirmed Status</td>
                <td>Confirmed Order</td>
            </thead>
            <tbody>
                @php
                    $no = 0
                @endphp
                @foreach ($data as $order)
                <tr>
                    <td>{{ $no += 1 }}</td>
                    <td>{{ $order->item_id }}</td>
                    <td>{{ $order->order_date }}</td>
                    <td>{{ $order->total_price }}</td>
                    <td>
                        @if ($order->confirmed == false)
                            Not Confirmed
                        @else
                            Confirmed
                        @endif
                    </td>
                    <td>
                        @if ($order->confirmed == false)
                            <a class="badge text-bg-warning" style="text-decoration: none;" href="{{ route('faktur', $order->id) }}">Confirmed Now</a>
                        @else
                            <a class="badge text-bg-success disabled" style="text-decoration: none;" href="#">Already Confirmed</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>