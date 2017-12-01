<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
@foreach ($tasks as $task)
    <li>{{ $task->body}}</li>
@endforeach
</body>
</html>