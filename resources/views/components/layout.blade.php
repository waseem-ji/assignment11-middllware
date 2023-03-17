<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/signin.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/9c9eece858.js" crossorigin="anonymous"></script>

    {{-- <script src="https://unpkg.com/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> --}}

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <title>MySocial</title>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <x-logo />
            @auth
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/feed">My Feed</a>
                        </li>

                    </ul>
                    <form class="d-flex mx-auto">
                        <input class="form-control me-2" type="search" name="search" placeholder="Search"
                            aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    <ul class="navbar-nav ms-auto ">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">

                                <img src="{{ asset(auth()->user()->profile_pic ?? asset('images/profile/dummy.jpg')) }}"
                                    alt="Profile Picture" class="rounded-circle" width="40" height="40">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                {{-- @can('admin')
                                    <li><a class="dropdown-item" href="/admin">Admin</a></li>
                                @endcan --}}

                                @if (Auth::user()->is_admin)
                                    <li><a class="dropdown-item" href="/admin">Admin</a></li>
                                @endif
                                <li><a class="dropdown-item" href="/feed">My feed</a></li>
                                <li><a class="dropdown-item" href="/settings">Settings</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item text-danger" href="/logout">Log Out</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            @endauth
            @guest

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto ">
                        <li><a href="/login" type="button" class="btn btn-outline-primary me-2">Login</a></li>
                        <li><a href="/register" type="button" class="btn btn-outline-success me-2">Register</a></li>
                    </ul>

                </div>
            @endguest
        </div>
    </nav>
    {{ $slot }}

</body>

</html>
