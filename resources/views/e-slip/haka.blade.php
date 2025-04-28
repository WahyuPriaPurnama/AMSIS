@extends('layouts.app')
@section('title', 'E-Slip HAKA')
@section('menuHAKA', 'active')
@section('content')
    <div class="container">
        @component('components.card')
            @slot('header')
                E-Slip HAKA
            @endslot
            <div class="table table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>NAMA</th>
                            <th>E-Slip</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Achmad Soni</td>
                            <td><a class="btn btn-primary" href="https://gofile.me/7hje9/JC6S81IEO"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-file-earmark" viewBox="0 0 16 16">
                                        <path
                                            d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z" />
                                    </svg></a></td>
                        </tr>
                        <tr>
                            <td>Agus Affandi</td>
                            <td><a class="btn btn-primary" href="https://gofile.me/7hje9/ueeJFLUiN"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-file-earmark" viewBox="0 0 16 16">
                                        <path
                                            d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z" />
                                    </svg></a></td>
                        </tr>
                        <tr>
                            <td>Dhimas Perwira Setyawan</td>
                            <td><a class="btn btn-primary" href="https://gofile.me/7hje9/Xg4epG0ML"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-file-earmark" viewBox="0 0 16 16">
                                        <path
                                            d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z" />
                                    </svg></a></td>
                        </tr>
                        <tr>
                            <td>Firman Novianto</td>
                            <td><a class="btn btn-primary" href="https://gofile.me/7hje9/2al02JuXy"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-file-earmark" viewBox="0 0 16 16">
                                        <path
                                            d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z" />
                                    </svg></a></td>
                        </tr>
                        <tr>
                            <td>Hendrio</td>
                            <td><a class="btn btn-primary" href="https://gofile.me/7hje9/eX9QxYlrb"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-file-earmark" viewBox="0 0 16 16">
                                        <path
                                            d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z" />
                                    </svg></a></td>
                        </tr>
                        <tr>
                            <td>Heru Surahmad</td>
                            <td><a class="btn btn-primary" href="https://gofile.me/7hje9/o1mVnFn5C"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-file-earmark" viewBox="0 0 16 16">
                                        <path
                                            d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z" />
                                    </svg></a></td>
                        </tr>
                        <tr>
                            <td>Imam Wahyudi</td>
                            <td><a class="btn btn-primary" href="https://gofile.me/7hje9/Tv4OZE2CP"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-file-earmark" viewBox="0 0 16 16">
                                        <path
                                            d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z" />
                                    </svg></a></td>
                        </tr>
                        <tr>
                            <td>Moh. Iwan</td>
                            <td><a class="btn btn-primary" href="https://gofile.me/7hje9/pHtGlwCGh"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-file-earmark" viewBox="0 0 16 16">
                                        <path
                                            d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z" />
                                    </svg></a></td>
                        </tr>
                        <tr>
                            <td>Mohammad Taufik</td>
                            <td><a class="btn btn-primary" href="https://gofile.me/7hje9/G1YPMO6SR"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-file-earmark" viewBox="0 0 16 16">
                                        <path
                                            d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z" />
                                    </svg></a></td>
                        </tr>
                        <tr>
                            <td>Muntholib</td>
                            <td><a class="btn btn-primary" href="https://gofile.me/7hje9/rizIjLuBU"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-file-earmark" viewBox="0 0 16 16">
                                        <path
                                            d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z" />
                                    </svg></a></td>
                        </tr>
                        <tr>
                            <td>Novian Hadi</td>
                            <td><a class="btn btn-primary" href="https://gofile.me/7hje9/SrAhV0hy2"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-file-earmark" viewBox="0 0 16 16">
                                        <path
                                            d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z" />
                                    </svg></a></td>
                        </tr>
                        <tr>
                            <td>Nurul Hadi Syafa'at</td>
                            <td><a class="btn btn-primary" href="https://gofile.me/7hje9/Qr6BWWEkH"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-file-earmark" viewBox="0 0 16 16">
                                        <path
                                            d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z" />
                                    </svg></a></td>
                        </tr>
                        <tr>
                            <td>Rachmadiyanto</td>
                            <td><a class="btn btn-primary" href="https://gofile.me/7hje9/sCqJ5JoIi"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-file-earmark" viewBox="0 0 16 16">
                                        <path
                                            d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z" />
                                    </svg></a></td>
                        </tr>
                        <tr>
                            <td>Suparno</td>
                            <td><a class="btn btn-primary" href="https://gofile.me/7hje9/DG51ZNZA2"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-file-earmark" viewBox="0 0 16 16">
                                        <path
                                            d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z" />
                                    </svg></a></td>
                        </tr>
                        <tr>
                            <td>Syajidi</td>
                            <td><a class="btn btn-primary" href="https://gofile.me/7hje9/wVTiLQSHF"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-file-earmark" viewBox="0 0 16 16">
                                        <path
                                            d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z" />
                                    </svg></a></td>
                        </tr>
                        <tr>
                            <td>Taufik</td>
                            <td><a class="btn btn-primary" href="https://gofile.me/7hje9/yAcHVcdlS"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-file-earmark" viewBox="0 0 16 16">
                                        <path
                                            d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z" />
                                    </svg></a></td>
                        </tr>
                        <tr>
                            <td>Wage Trubus Istanto</td>
                            <td><a class="btn btn-primary" href="https://gofile.me/7hje9/BdULDlTUa"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-file-earmark" viewBox="0 0 16 16">
                                        <path
                                            d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z" />
                                    </svg></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endcomponent
    </div>
@endsection
