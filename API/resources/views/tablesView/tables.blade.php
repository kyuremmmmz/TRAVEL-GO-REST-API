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
                <td><a href="" class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="{{route('destroy', ['travel'=>$item->number_of_days])}}" method="post">
                         @csrf
                         @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
