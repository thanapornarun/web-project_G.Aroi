<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.0.0-beta1/css/all.css">

<style>
    body {
        background-color: #b8c1ec;
        color: #232946;
        font-family: 'Poppins';
    }

    .navbar-inverse {
        padding-top: 15px;
        font-weight: bold;
        font-size: 18px;
    }

    .navbar-brand {
        padding: 0px;
        padding-left: 15px;
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
        color: black;
        text-decoration: none;
    }

    /* Hover effect for the links */
    .nav.navbar-nav li a:hover {
        text-decoration: underline;
    }
</style>

<body>
    <nav class="navbar navbar-inverse" style="background-color: #eebbc3; height: 80px">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">
                    <img src="https://cdn-icons-png.flaticon.com/512/3656/3656949.png" alt="Logo" style="max-height: 100%; max-width: 100%;">
                </a>
            </div>
            <ul class="nav navbar-nav">
                <li style="padding: 0px;"><a href="/"><i class="fa-solid fa-house"></i> Home</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <div class="navbar-nav">
                    @if(Auth::check())
                    <div class="dropdown" style="padding-right: 30px;">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">{{ Auth::user()->name }}
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="/my_profile">My Profile</a></li>
                            <li><a href="#">My Event</a></li>
                            <li><a href="#"><i class="fa-regular fa-calendar-plus"></i> Event</a></li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item" style="padding-left: 30px;">Logout</button>
                            </form>
                        </ul>
                    </div>
                    @else
                    <li>
                        <a href="{{ route('register') }}">
                            <i class="fa-solid fa-user"></i> Register
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}">
                            <i class="fa-solid fa-right-to-bracket"></i> Login
                        </a>
                    </li>
                    @endif
                </div>
            </ul>
        </div>
    </nav>
</body>