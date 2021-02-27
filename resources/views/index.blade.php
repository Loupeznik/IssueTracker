<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issue Tracker - @yield('title')</title>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.5/dist/js/uikit.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.5/dist/css/uikit.min.css">
    <link rel="stylesheet" href="/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    @yield('head')
</head>
<body>
    <nav class="uk-navbar-container" uk-navbar>
        <div class="uk-navbar-left">
            <a class="uk-navbar-item uk-logo navbar-heading" href="/issues">Issue Tracker</a>
        </div>
        <div class="uk-navbar-right">
            <ul class="uk-navbar-nav">
                <li class="navbar-text"><a href="/issues/list/">All Issues</a></li>
                @auth
                    <li class="navbar-text"><a href="/issues/create/">New Issue</a></li>
                    <li class="navbar-text"><a href="/account"><i class="ri-user-fill"></i>Logged in as {{ Auth::user()->name }}</a></li>
                    <li class="navbar-text"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endauth
                @Guest
                    <li class="navbar-text"><a href="/login">Log In</a></li>
                @endguest
            </ul>
        </div>
    </nav>
    <div class="container uk-responsive-height">
        @yield('content')
    </div>
    @yield('script')
</body>
</html>
