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
        <form action="{{route('ToursCreate')}}" method="POST">
            @method('POST')
            @csrf
            <div class="form-group">
                <label for="travel_id">Travel ID</label>
                <input type="text" class="form-control" id="travel_id" name="travel_id" required>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" step="1" required>
            </div>
            <div class="form-group">
                <label for="starting_date">Starting Date</label>
                <input type="date" class="form-control" id="starting_date" name="starting_date" required>
            </div>
            <div class="form-group">
                <label for="ending_date">Ending Date</label>
                <input type="date" class="form-control" id="ending_date" name="ending_date" required>
            </div>
            <div class="form-group">
                <label for="number_of_days">Number of Days</label>
                <input type="number" class="form-control" id="number_of_days" name="number_of_days" required>
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
                    <h1 class="modal-title">Update data</h1>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Add your modal content here -->
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
