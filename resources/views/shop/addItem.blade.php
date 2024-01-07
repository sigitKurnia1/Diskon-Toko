<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Add New Item</title>
</head>
<body>
    @include('sweetalert::alert')
    <div class="container mt-5">
        <a class="btn btn-primary mt-5" href="/shopPage">Back</a>
        <div class="card mt-4">
            <div class="card-header">Add New Shop Item</div>
            <div class="card-body">
                <form action="{{ route('postAddItem') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                        <input class="form-control" type="text" id="floatingInput" name="item_name" placeholder="">
                        <label for="floatingInput">Item Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" type="text" id="floatingInput" name="item_desc" placeholder="">
                        <label for="floatingInput">Item Description</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" type="number" id="floatingInput" name="item_price" placeholder="">
                        <label for="floatingInput">Item Price</label>
                    </div>
                    <label class="mb-2">Item Image</label>
                    <input class="form-control" type="file" name="item_image">
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-primary mt-3 mb-3" type="submit">Add Item</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>