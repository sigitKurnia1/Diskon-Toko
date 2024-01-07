<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Buy Shop Item</title>
</head>
<body>
    @include('sweetalert::alert')
    <div class="container mt-5">
        <a class="btn btn-primary mt-5" href="/">Back</a>
        <div class="card mt-4">
            <div class="card-header">Item Detail</div>
            <div class="card-body">
                <form action="{{ route('postBuyItem') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{ $data->id }}" name="item_id">
                    <div class="form-floating mb-3">
                        <input class="form-control" type="text" id="floatingInput" value="{{ $data->item_name }}" placeholder="">
                        <label for="floatingInput">Item Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" type="text" id="floatingInput" value="{{ $data->item_desc }}" placeholder="">
                        <label for="floatingInput">Item Description</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" type="number" id="floatingInput" name="total_price" value="{{ $data->item_price }}" placeholder="">
                        <label for="floatingInput">Item Price</label>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-primary mt-3 mb-3" type="submit">Order Item</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>