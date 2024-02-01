<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Login</title>
    <link href="{{url('css/app.css')}}" rel="stylesheet">

</head>
<body>
<div class="navbarContainer">
    <ul class="navbarLogin">
        <li><a href="{{route('login.index')}}">Login</a></li>
    </ul>
</div>
{{$slot}}
</body>
</html>
