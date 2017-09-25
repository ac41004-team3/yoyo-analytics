<!doctype html>
<html>
<head>
    <title></title>
</head>
<body>
<ul>
    @foreach ($outlets as $outlet)
        <li>
            {{ $outlet->name }}
        </li>
    @endforeach
</ul>
</body>
</html>
