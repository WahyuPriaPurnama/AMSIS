<!DOCTYPE html>
<html lang="id">

<head>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/sass/app.scss')
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link @yield('menuEmployees')" href="/employees">Data Karyawan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('menuSubsidiary')" href="/subsidiaries">Data Perusahaan</a>
                </li>
            </ul>
            @if(session()->has('username'))

            <div class="dropdown">
                <button class="btn btn-danger dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Halo, {{ Str::upper(session()->get('username'))}}
                </button>
                <ul class="dropdown-menu dropdown-menu-dark">
                  <li> <a href="{{url('/logout')}}" class="dropdown-item">Logout</a></li>
                </ul>
              </div>
            @endif
        </div>
    </nav>

        @yield('content')

    <footer class="bg-dark py-4 text-white mt-4 fixed-bottom">
        @vite('resources/js/app.js')
        <div class="container text-center">
            AMS Information System | Copyright © {{ date('Y') }} AMS Group
        </div>
    </footer>
</body>

</html>
