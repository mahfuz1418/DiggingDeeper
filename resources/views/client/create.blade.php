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
    <div class="container py-5">
        <form action="{{ route('client.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="">User Id:</label>
            <input class="form-control" type="number" name="useId" placeholder="Enter UserId"> <br>

            <label for="">Title:</label>
            <input class="form-control" type="text" name="title" placeholder="Enter Title"> <br>
            <label for="">Body:</label>
            <input class="form-control" type="text" name="body" placeholder="Enter body"> <br>
            <input type="submit" class="btn btn-info" value="Create">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</body>
</html>
