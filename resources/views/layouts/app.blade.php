<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AMSIS') }} - @yield('title')</title>

    <!-- Fonts -->

    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- load font awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <!-- add your custom CSS -->
    <style>


        /* Add WA floating button CSS */
        .floating {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 40px;
            right: 40px;
            background-color: #0fe45d;
            color: #fff;
            border-radius: 50px;
            text-align: center;
            font-size: 30px;
            box-shadow: 2px 2px 3px #999;
            z-index: 100;
        }

        .fab-icon {
            margin-top: 16px;
        }
    </style>

    <!-- render the button and direct it to wa.me -->
    <a href="https://wa.me/6285745334330?text=Halo, Saya butuh bantuan" class="floating" target="_blank" >
        <i class="fab fa-whatsapp fab-icon"></i>
    </a>
   
</head>

<body class="d-flex flex-column min-vh-100">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'AMSIS') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @guest
                    @else
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Human Resources
                                </a>
                                <ul class="dropdown-menu">
                                    @can('view', App\Models\Employee::class)
                                        <li><a class="dropdown-item @yield('menuEmployees')" href="{{ route('employees.index') }}">
                                                Karyawan</a></li>
                                    @endcan
                                    @can('view', App\Models\Subsidiary::class)
                                        <li><a class="dropdown-item @yield('menuSubsidiaries')" href="{{ route('subsidiaries.index') }}">
                                                Perusahaan</a></li>
                                    @endcan
                                    @can('view', App\Models\Vehicle::class)
                                        <li>
                                            <a class="dropdown-item @yield('menuVehicles')"
                                                href="{{ route('vehicle.index') }}">Kendaraan</a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                            @can('view', App\Models\Sparepart::class)
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-expanded="false">Stockroom</a>
                                    <ul class="dropdown-menu">
                                        <a href="{{ route('spareparts.index') }}"
                                            class="dropdown-item @yield('menuSparepart')">Sparepart</a>
                                    </ul>
                                </li>
                            @endcan
                            @can('view', App\Models\Purchasing\MasterBarang::class)
                                <li class="nav-item dropdown">
                                    <a href="{{ route('master-barang.trash') }}" class="nav-link dropdown-toggle"
                                        data-bs-toggle="dropdown">
                                        Purchasing
                                    </a>
                                    <ul class="dropdown-menu">
                                        <a href="{{ route('master-barang.index') }}"
                                            class="dropdown-item @yield('menuBarang')">Master Barang</a>
                                        <a href="{{ route('master-supplier.index') }}"
                                            class="dropdown-item @yield('menuSupplier')">Master
                                            Supplier</a>
                                        <a href="{{ route('master-barang.trash') }}"
                                            class="dropdown-item @yield('menuRiwayat')">Transaksi Selesai</a>
                                    </ul>
                                </li>
                            @endcan
                        </ul>
                    @endguest
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @else
        
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    <!-- <a class="dropdown-item" href="{ route('register') }}">Register</a>-->
                                    @if (Auth::user()->role == 'super-admin')
                                        <a class="dropdown-item" href="{{ route('users.index') }}">User Management</a>
                                        <a class="dropdown-item" href="{{ route('log.activity') }}">Log Activity</a>
                                    @endif
                                    <a class="dropdown-item text-danger fw-bold" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                </div>
                            </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer class="bg-dark py-4 text-white  mt-auto">
        <div class="container text-center">
            AMS Information System | © {{ date('Y') }} WPP. All rights reserved.
        </div>
    </footer>

</body>

</html>
