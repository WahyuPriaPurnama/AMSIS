@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">List User</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NAMA</th>
                                    <th>EMAIL</th>
                                    <th>LEVEL</th>
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
                                        <td>
                                            <!-- Button trigger modal -->
                                            <div class="input-group">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#editData{{ $user->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path
                                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd"
                                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                    </svg>
                                                    <form action="{{ route('users.destroy', ['user' => $user->id]) }}"
                                                        method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor" class="bi bi-trash3-fill"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                                            </svg></button>
                                                    </form>
                                                </button>
                                            </div>


                                            <!-- Modal -->
                                            <div class="modal fade" id="editData{{ $user->id }}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="editDataLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="editDataLabel">Edit User</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="{{ route('users.update', ['user' => $user->id]) }}"
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
                                                                        <option value="super admin"
                                                                            @selected($user->role == 'super admin')>
                                                                            super admin</option>
                                                                        <option value="admin" @selected($user->role == 'admin')>
                                                                            admin</option>
                                                                        <option value="user" @selected($user->role == 'user')>
                                                                            user
                                                                        </option>
                                                                        <option value="guest" @selected($user->role == 'guest')>
                                                                            guest</option>
                                                                    </select>
                                                                    <label for="floatingSelect">level</label>
                                                                    @error('role')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="password"
                                                                        class="form-control @error('password') is-invalid @enderror"
                                                                        id="floatingInput" name="password"
                                                                        placeholder="password">
                                                                    <label for="floatingInput">password</label>
                                                                    @error('password')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="password" class="form-control"
                                                                        name="password_confirmation" id="floatingInput"
                                                                        placeholder="konfirmasi password">
                                                                    <label for="floatingInput">konfirmasi password</label>
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
                </div>
            </div>
        </div>
    </div>
@endsection
