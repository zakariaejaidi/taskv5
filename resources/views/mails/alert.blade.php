<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Hello, {{$data['name']}} we have a new post for you</h1>
    {{$data['title']}}

    <p>Click the link below to view the post</p>
    <a href="{{$data['url']}}">View</a>
</body>
</html>