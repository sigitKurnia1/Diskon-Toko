<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Confirmed Order Page</title>
</head>
<body>
    @include('sweetalert::alert')
    <div class="container mt-5">
        <a class="btn btn-primary mt-5" href="{{ route('orderItems') }}">Back</a>
        <div class="card mt-4">
            <div class="card-header">Confirmed Oder</div>
            <div class="card-body">
                <form action="{{ route('orderConfirmed', $data->id) }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{ $data->user_id }}" name="user_id">
                    <input type="hidden" value="{{ $data->item_id }}" name="item_id">
                    <div class="form-floating mb-3">
                        <input class="form-control" type="number" id="floatingInput" name="total_price" value="{{ $data->total_price }}" placeholder="">
                        <label for="floatingInput">Total Price</label>
                    </div>
                    <select class="form-select" name="voucher">
                        @if ($no_voucher == true)
                        <option value="Not Used Voucher">Don't Used Voucher</option>
                        @else
                        <option value="{{ $data->code }}">Use This Voucher: {{$data->code}}</option>
                        <option value="Not Used Voucher">Don't Used Voucher</option>
                        @endif
                        </select>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-primary mt-3 mb-3" type="submit">Confirmed Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>