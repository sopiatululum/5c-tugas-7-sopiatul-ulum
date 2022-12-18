<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
        .bg-maroon {
            background-color: green;
        }
    </style>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-maroon">
        <div class="container">
            <a class="navbar-brand" href="/guru">
                SDN KARAWANG I
            </a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link @yield('menu')" href="/guru">Guru</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('menu1')" href="/murid">Murid</a>
                </li>
            </ul>
        </div>
    </nav>
    @yield('content')
</body>
</html>
