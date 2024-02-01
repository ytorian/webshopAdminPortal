<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>admin portal</title>
    <link href="{{url('css/app.css')}}" rel="stylesheet">

</head>
<body>
<div class="navbarContainer">
    <ul class="navbar">
        <li><a href="{{route('home.index')}}">Home</a></li>
        <li class="navbarDropdown"><a href="javascript:void(0)">Product</a>
            <div class="dropdown-content">
                <a href="{{route('products.index')}}">View</a>
                <a href="{{route('products.create')}}">Create</a>
            </div>
        </li>
        <li class="navbarDropdown"><a href="javascript:void(0)">Category</a>
            <div class="dropdown-content">
                <a href="{{route('categories.index')}}">View</a>
                <a href="{{route('categories.create')}}">Create</a>
            </div>
        </li>
    </ul>
    <form class="navbarLogin" action="{{route('login.logout')}}" method="post">
        @csrf
        <button type="submit" class="logoutButton">Logout</button>
    </form>
{{--    <ul class="navbarLogin">--}}
{{--        <li><a href="{{route('login.index')}}">Logout</a></li>--}}
{{--    </ul>--}}
</div>
{{$slot}}
</body>
</html>
