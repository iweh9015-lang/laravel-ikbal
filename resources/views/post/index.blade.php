<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <fieldset>
    <legend>Data Posts</legend>
    <table border="1">
    <tr>
    <th>No</th>
    <th>Title</th>
    <th>Content</th>
    </tr>
    @foreach($post as $data)
        <tr>
        <th>{{$loop->iteration}}</th>
        <th>{{$data->title}}</th>
        <th>{{Str::limit($data->con
        
        tent, 100)}}</th>
        </tr>
    @endforeach
    </table>
    </fieldset>
</body>
</html>