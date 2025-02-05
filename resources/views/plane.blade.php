<!DOCTYPE html>
<html>
<head>
    <title>Planes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Planes</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Model</th>
                <th>Capacity</th>
            </tr>
        </thead>
        <tbody>
            @foreach($planes as $plane)
                <tr>
                    <td>{{ $plane->id }}</td>
                    <td>{{ $plane->name }}</td>
                    <td>{{ $plane->model }}</td>
                    <td>{{ $plane->capacity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>