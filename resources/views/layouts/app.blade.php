<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AMSIS') }} | @yield('title')</title>

    <!-- Fonts -->

    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

    <!-- Scripts -->

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- load font awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

</head>

<body class="d-flex flex-column min-vh-100">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top">
            <div class="container">
                @auth
                    @php
                        $user = auth()->user();
                        $isEmployee = $user && $user->role === 'employee';
                        $employeeId = $user->employee_id ?? null;
                    @endphp

                    @if ($isEmployee && $employeeId)
                        {{-- Jika user adalah employee, arahkan ke profil karyawan --}}
                        <a class="navbar-brand" href="{{ route('employees.show', $employeeId) }}">
                            {{ config('app.name', 'AMSIS') }}
                        </a>
                    @else
                        {{-- Jika bukan employee, arahkan ke halaman utama --}}
                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'AMSIS') }}
                        </a>
                    @endif
                @endauth
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @guest
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    E-Slip
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item @yield('menuAMS')" href="/ams-malang">
                                            AMS Holding</a></li>
                                    <li><a class="dropdown-item @yield('menuRMM')" href="/rmm-malang">
                                            RMM</a></li>
                                    <li><a class="dropdown-item @yield('menuELN')" href="/eln-malang">
                                            ELN Malang</a></li>
                                    <li><a class="dropdown-item @yield('menuELN2')" href="/eln-bwi">
                                            ELN Banyuwangi</a></li>
                                    <li><a class="dropdown-item @yield('menuHAKA')" href="/haka-bwi">
                                            HAKA</a></li>
                                    <li><a class="dropdown-item @yield('menuBOFI')" href="/bofi-bwi">
                                            BOFI</a></li>
                                </ul>
                            </li>
                        </ul>
                    @endguest
                    @auth
                        @php
                            $user = auth()->user();
                            $isEmployee = $user && $user->role === 'employee';
                            $employeeId = $user->employee_id ?? null;
                        @endphp
                        @if (!$isEmployee)
                            <ul class="navbar-nav me-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        HRD
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item @yield('menuEmployees')"
                                                href="{{ route('employees.index') }}">
                                                Karyawan</a>
                                        </li>
                                        <li><a class="dropdown-item @yield('menuSubsidiaries')"
                                                href="{{ route('subsidiaries.index') }}">
                                                Perusahaan</a></li>
                                        <li>
                                            <a class="dropdown-item @yield('menuVehicles')"
                                                href="{{ route('vehicles.index') }}">Kendaraan</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                E-Slip &raquo;
                                            </a>
                                            <ul class="dropdown-menu dropdown-submenu">
                                                <li><a class="dropdown-item @yield('menuAMS')" href="/ams-malang">
                                                        AMS Holding</a></li>
                                                <li><a class="dropdown-item @yield('menuRMM')" href="/rmm-malang">
                                                        RMM</a></li>
                                                <li><a class="dropdown-item @yield('menuELN')" href="/eln-malang">
                                                        ELN Malang</a></li>
                                                <li><a class="dropdown-item @yield('menuELN2')" href="/eln-bwi">
                                                        ELN Banyuwangi</a></li>
                                                <li><a class="dropdown-item @yield('menuHAKA')" href="/haka-bwi">
                                                        HAKA</a></li>
                                                <li><a class="dropdown-item @yield('menuBOFI')" href="/bofi-bwi">
                                                        BOFI</a></li>
                                            </ul>
                                        </li>

                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Payroll
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item @yield('menuScanlog')"
                                                href="{{ route('scanlog.index') }}">Scanlog</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item @yield('menuHarian')"
                                                href="{{ route('karyawan-harian.index') }}">Karyawan</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        @endif
                    @endauth
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
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
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
            AMS Information System | © {{ date('Y') }} All rights reserved.
        </div>
    </footer>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>

</html>
