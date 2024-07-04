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
        </div>
    </nav>

        @yield('content')

    <footer class="bg-dark py-4 text-white mt-4">
        @vite('resources/js/app.js')
        <div class="container text-center">
            Sistem Informasi Karyawan | Copyright © {{ date('Y') }} AMS Group
        </div>
    </footer>
</body>

</html>
