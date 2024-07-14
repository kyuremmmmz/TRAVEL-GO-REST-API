<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Product Form</h2>
        <form action="{{route('Creator')}}" method="POST">
            {{ csrf_token() }}
            @csrf
            {{ csrf_field() }}
            @method('POST')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="number_of_days">Number of  days</label>
                <input type="number" class="form-control" id="number_of_days" name="number_of_days"  required>
            </div>

            <div class="form-check">
                <input type="hidden" name="is_public" value="0">
                <input type="checkbox" class="form-check-input" id="is_public" name="is_public" value="1" checked>
                <label class="form-check-label" for="is_public">Public</label>
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                <button type="button" class="btn btn-primary mt-3" data-target="#view" data-toggle="modal">View Table</button>
            </div>

        </form>
    </div>

    <!-- Modal -->

    <div class="modal fade" id="view">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Heading -->
                <div class="modal-header">
                    <h1 class="modal-title">
                        Update data
                    </h1>
                    <button class="close" data-dismiss="modal">
                        &times;
                    </button>
                </div>
                <!-- MODAL BODY -->
                <div class="modal-body">

                </div>


            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
