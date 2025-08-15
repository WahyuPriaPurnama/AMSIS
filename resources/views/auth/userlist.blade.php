@extends('layouts.app')
@section('title', 'List User')
@section('content')
    <div class="container mt-3">
        @component('components.card')
            @slot('header')
                LIST USER
            @endslot
            <div class="d-flex gap-2 mb-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUser" data-bs-toggle="tooltip"
                title="Tambah User">
                <i class="bi bi-person-fill-add"></i>
            </button>
            <x-buttons.excel href="{{ route('users.export') }}" class="btn btn-success">
            </x-buttons.excel>
        </div>
            <!-- Modal -->
            <div class="modal fade" id="addUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="addUserLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="addUserLabel">Tambah User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('users.store') }}" method="post">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="floatingInput" placeholder="username" name="name">
                                    <label for="floatingInput">username</label>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">
                                        hanya berupa huruf dan tanpa spasi
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        name="email" id="floatingInput" placeholder="email">
                                    <label for="floatingInput">email</label>
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <select name="role" id="floatingSelect"
                                        class="form-select @error('role') is-invalid @enderror" aria-placeholder="level">
                                        <option value="" selected>pilih level</option>
                                        @if (Auth::user()->role == 'super-admin')
                                            <option value="super-admin">
                                                super-admin</option>
                                        @endif
                                        <option value="holding-admin">
                                            holding-admin
                                        </option>
                                        <option value="eln-admin">
                                            eln-admin</option>
                                        <option value="eln-sparepart">
                                            eln-sparepart</option>
                                        <option value="eln2-admin">
                                            eln2-admin
                                        </option>
                                        <option value="haka-admin">
                                            haka-admin</option>
                                        <option value="bofi-admin">bofi-admin</option>
                                        <option value="rmm-admin">rmm-admin</option>
                                        <option value="employee">employee</option>
                                    </select>
                                    <label for="floatingSelect">level</label>
                                    @error('role')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="floatingInput" name="password" placeholder="password">
                                    <label for="floatingInput">password</label>
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" name="password_confirmation" id="floatingInput"
                                        placeholder="konfirmasi password">
                                    <label for="floatingInput">konfirmasi password</label>
                                    @error('password_confirmation')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-floating text-end">
                                    <x-buttons.submit>
                                        Simpan
                                    </x-buttons.submit>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover" id="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NAMA</th>
                            <th>USERNAME</th>
                            <th>LEVEL</th>
                            <th>PLANT</th>
                            <th>MENU</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td> {{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->subsidiary?->name ?? '-' }}</td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <div class="input-group">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#editData{{ $user->id }}">
                                            <i class="bi bi-pencil-square" data-bs-toggle="tooltip" title="Edit Data"></i>
                                        </button>
                                        <button type="submit" class="btn btn-danger" form="delete-form{{ $user->id }}"
                                            data-bs-toggle="tooltip" title="Delete"><i class="bi bi-trash3-fill"></i></button>
                                    </div>
                                    <form id="delete-form{{ $user->id }}"
                                        action="{{ route('users.destroy', ['user' => $user->id]) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                    </form>


                                    <!-- Modal -->
                                    <div class="modal fade" id="editData{{ $user->id }}" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="editDataLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="editDataLabel">Edit User
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('users.update', ['user' => $user->id]) }}"
                                                        method="post">
                                                        @method('put')
                                                        @csrf
                                                        <div class="form-floating mb-3">
                                                            <input type="text"
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                id="floatingInput" value="{{ $user->name }}"
                                                                placeholder="username" name="name">
                                                            <label for="floatingInput">username</label>
                                                            @error('name')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                            <div class="form-text">
                                                                hanya berupa huruf dan tanpa spasi
                                                            </div>
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <input type="text"
                                                                class="form-control @error('email') is-invalid @enderror"
                                                                name="email" id="floatingInput"
                                                                value="{{ $user->email }}" placeholder="email">
                                                            <label for="floatingInput">email</label>
                                                            @error('email')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <select name="role" id="floatingSelect"
                                                                class="form-select @error('role') is-invalid @enderror"
                                                                aria-placeholder="level">
                                                                <option value="super-admin" @selected($user->role == 'super-admin')>
                                                                    super-admin</option>
                                                                <option value="holding-admin" @selected($user->role == 'holding-admin')>
                                                                    holding-admin</option>
                                                                <option value="eln-admin" @selected($user->role == 'eln-admin')>
                                                                    eln-admin
                                                                </option>
                                                                <option value="eln-sparepart" @selected($user->role == 'eln-sparepart')>
                                                                    eln-sparepart</option>
                                                                <option value="eln2-admin" @selected($user->role == 'eln2-admin')>
                                                                    eln2-admin</option>
                                                                <option value="haka-admin" @selected($user->role == 'haka-admin')>
                                                                    haka-admin
                                                                </option>
                                                                <option value="bofi-admin" @selected($user->role == 'bofi-admin')>
                                                                    bofi-admin
                                                                </option>
                                                                <option value="rmm-admin" @selected($user->role == 'rmm-admin')>
                                                                    rmm-admin
                                                                </option>
                                                            </select>
                                                            <label for="floatingSelect">level</label>
                                                            @error('role')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <input type="password"
                                                                class="form-control @error('password') is-invalid @enderror"
                                                                id="floatingInput" name="password" placeholder="password">
                                                            <label for="floatingInput">password</label>
                                                            @error('password')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <input type="password" class="form-control"
                                                                name="password_confirmation" id="floatingInput"
                                                                placeholder="konfirmasi password">
                                                            <label for="floatingInput">konfirmasi
                                                                password</label>
                                                            @error('password_confirmation')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                            <div class="form-text">
                                                                kosongi password jika tidak ingin merubahnya
                                                            </div>
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <button class="btn btn-success mb-2"
                                                                type="submit">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endcomponent
    @endsection
