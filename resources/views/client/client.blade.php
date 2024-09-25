<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container my-5 py-5">
        <div>
            <a href="{{ route('client.create') }}" class="btn btn-info">Create Post</a>
        </div>
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">User Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Body</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($response as $data)
                        <tr>
                            <td>{{ $data['id'] }}</td>
                            <td>{{ $data['userId'] }}</td>
                            <td>{{ $data['title'] }}</td>
                            <td>{{ $data['body'] }}</td>
                            <td>
                                <a href="{{ route('client.show', ['id' => $data['id']]) }}" class="btn btn-success">Show</a>
                                <a href="{{ route('client.edit', ['id' => $data['id']]) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('client.delete', ['id' => $data['id']]) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>
</body>

</html>
