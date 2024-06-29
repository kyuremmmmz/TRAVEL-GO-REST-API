<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>API Data</title>
</head>
<body>
    <div class="table-responsive">
        <table class="table table-striped table-dark table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>UID</th>
                    <th>Name</th>
                    <th>Is Public</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Number of Days</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $index = 1;
                @endphp
                @foreach ($data as $item)
                <tr>
                    <td>{{$index++}}</td>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->is_public}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->number_of_days}}</td>
                    <td>
                        <button data-bs-target="#modal{{$item->id}}" data-bs-toggle="modal" class="btn btn-primary">Edit</button>
                    </td>
                    <td>
                        <form action="{{route('destroy', ['travel'=>$item->id])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>

                <!-- MODAL -->
                <div class="modal fade" id="modal{{$item->id}}" tabindex="-1" aria-labelledby="modallabel{{$item->id}}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modallabel{{$item->id}}">Update</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('Update', ['travel' => $item->id]) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="mb-3">
                                        <label for="name{{$item->id}}" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name{{$item->id}}" name="name" value="{{$item->name}}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description{{$item->id}}" class="form-label">Description</label>
                                        <textarea class="form-control" id="description{{$item->id}}" name="description" required>{{$item->description}}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="price{{$item->id}}" class="form-label">Price</label>
                                        <input type="number" class="form-control" id="price{{$item->id}}" name="price" value="{{$item->price}}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="number_of_days{{$item->id}}" class="form-label">Number of Days</label>
                                        <input type="number" class="form-control" id="number_of_days{{$item->id}}" name="number_of_days" value="{{$item->number_of_days}}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="is_public{{$item->id}}" class="form-label">Is Public</label>
                                        <input type="number" class="form-control" id="is_public{{$item->is_public}}" name="is_public"  value="{{$item->is_public}}" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END MODAL -->
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
