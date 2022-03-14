<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Document</title>
</head>
<header>
    <div class="container">
        <div>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand">Library</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    @cannot('view', auth()->user())
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('login')}}">Login</a>
                        </li>
                    </ul>
                    @endcannot
                    @can('view', auth()->user())
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('author.index')}}">Admin</a>
                        </li>
                    </ul>
                    @endcan
                </div>
            </nav>
        </div>
    </div>
</header>
<body>
@yield('content')
</body>
</html>
