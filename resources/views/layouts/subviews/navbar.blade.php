<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Event Manager</title>
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3656/3656949.png">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.0.0-beta1/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,600" rel="stylesheet" type="text/css">
</head>

<style>
    body {
        background-color: #b8c1ec;
        color: #232946;
    }


    .navbar-inverse {
        font-family: 'Poppins';
        padding-top: 15px;
        font-weight: bold;
        font-size: 18px;
        color: #232946;
        height: 80px;
    }

    .navbar-brand img {
        max-height: 100%;
        max-width: 100%;
    }

    .navbar-brand {
        padding: 0px;
        padding-left: 15px;
        color: #232946;
    }

    .nav.navbar-nav {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
    }

    /* Style for the individual list items */
    .nav.navbar-nav li {
        margin: 0 10px;
        list-style: none;
    }

    /* Style for the links within the list items */
    .nav.navbar-nav li a {
        color: #232946;
        text-decoration: none;
    }


    /* Hover effect for the links */
    .nav.navbar-nav li a:hover {
        text-decoration: underline;
    }
</style>

<body>
    <nav class="navbar navbar-inverse" style="background-color: #ff8906;">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">
                    <img src="https://cdn-icons-png.flaticon.com/512/3656/3656949.png" alt="Logo">
                </a>
            </div>
            <ul class="nav navbar-nav" style="padding: 0px;">
                <li><a href="/" style="color: #fffffe;"><i class="fa-solid fa-house"></i> Home</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <div class="navbar-nav">
                    @if(Auth::check())
                    <div class="dropdown mt-3" style="margin-right: 30px;">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="color: black; background-color: #fffffe; font-weight: 900;">
                            <i class="fa-solid fa-user" style="padding-right: 5px;"></i> {{ Auth::user()->name }}
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="/profile" style="font-weight: 600" >My Profile</a></li>
                            <li><a href="/event" style="font-weight: 600">My Event</a></li>
                            <li><a href="{{ route('event.create') }}" style="font-weight: 600"><i class="fa-regular fa-calendar-plus" style="padding-right: 5px;"></i> Create Event</a></li>
                            <li><a href="/eventAttendee" style="font-weight: 600">Event Joined</a></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item" style="padding-left: 20px;">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    @else
                    <li>
                        <a href="{{ route('register') }}" style="color: #fffffe;" class="navbar-brand">
                            <i class="fa-solid fa-user"></i> Register
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}" style="color: #fffffe;" class="navbar-brand">
                            <i class="fa-solid fa-right-to-bracket"></i> Login
                        </a>
                    </li>
                    @endif
                </div>
            </ul>
        </div>
    </nav>
</body>

</html>