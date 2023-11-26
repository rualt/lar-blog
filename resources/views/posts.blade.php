<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="/app.css">
</head>
<body>
    @foreach ($posts as $post)
        <article>
            <p>This is user {!! $post !!}</p>
        </article>
    @endforeach
</body>
</html>