<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issue Tracker - @yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.5/dist/css/uikit.min.css">
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.5/dist/js/uikit.min.js"></script>
    <link rel="stylesheet" href="/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet"> 

</head>
<body>
<nav class="uk-navbar-container" uk-navbar>
    <div class="uk-navbar-left">
        <a class="uk-navbar-item uk-logo navbar-heading" href="/issues">Issue Tracker</a>
    </div>
    <div class="uk-navbar-right">
        <ul class="uk-navbar-nav">
            <li class="navbar-text"><a href="issues/list/">Issues</a></li>
            <li class="navbar-text"><a href="issues/create/">New Issue</a></li>
            <li class="navbar-text"><a href="/account">icon | Logged in as Guest</a></li>
        </ul>

    </div>
</nav>
    <div class="container uk-responsive-height">
        @yield('content')
    </div>
</body>
</html>