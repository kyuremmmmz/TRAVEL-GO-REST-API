<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">\
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>API Data</title>
</head>
<body>
    <div class="table-responsive">
    <table class="table table-stripped table-dark table-hover">
        <th>#</th>
        <th>UID</th>
        <th>Name</th>
        <th>Is Public</th>
        <th>Description</th>
        <th>Edit</th>
        <th>Delete</th>
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
                <td><button id="modal" data-bs-target="#modal{{$item->id}}" data-bs-toggle="modal"  class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="{{route('destroy', ['travel'=>$item->number_of_days])}}" method="post">
                         @csrf
                         @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>

        </tbody>
    </table>
    <div class="modal fade" id="modal{{$item->id}}" tabindex="-1" aria-labelledby="modallabel{{$item->id}}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modallabel{{$item->id}}">Update</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('Update', ['travel' => $item]) }}" method="post">
                        @csrf
                        @method('post')
                        <div class="mb-3">
                            <label for="name{{$item->id}}" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name{{$item->id}}" name="name{{$item->id}}" value="{{$item->name}}">
                        </div>
                        <div class="mb-3">
                            <label for="is_public{{$item->id}}" class="form-label">Is Public</label>
                            <input type="text" class="form-control" id="is_public{{$item->id}}" name="is_public" value="{{$item->is_public}}">
                        </div>
                        <div class="mb-3">
                            <label for="description{{$item->id}}" class="form-label">Description</label>
                            <textarea class="form-control" id="description{{$item->id}}" name="description">{{$item->description}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>

    @endforeach


    <!-- MODAL -->
</div>
</body>
</html>
