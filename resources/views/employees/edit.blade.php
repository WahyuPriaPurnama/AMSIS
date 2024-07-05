@extends('layout.master')
@section('title', 'Edit Data Karyawan')
@section('content')
    <div class="container mt-3">
        <h3>Edit Data Karyawan</h3>
        <hr>
        <form action="{{ route('employees.update', ['employee' => $employee->id]) }}" method="post">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label class="form-label" for="nik">NIK</label>
                <input type="text" id="nik" name="nik" value="{{ old('nik') ?? $employee->nik }}"
                    class="form-control @error('nik') is-invalid @enderror">
                @error('nik')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="name">Nama Lengkap</label>
                <input type="text" id="name" name="name" value="{{ old('name') ?? $employee->name }}"
                    class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <div class="d-flex">
                    <div class="form-check me-3">
                        <input class="form-check-input" type="radio" name="gender" id="laki_laki" value="L"
                            {{ old('gender') ?? $employee->gender == 'L' ? 'checked' : '' }}>
                        <label class="form-check-label" for="laki_laki">Laki-laki</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="perempuan" value="P"
                            {{ old('gender') ?? $employee->gender == 'P' ? 'checked' : '' }}>
                        <label class="form-check-label" for="perempuan">Perempuan</label>
                    </div>
                </div>
                @error('gender')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="subsidiary">Perusahaan</label>
                <select class="form-select" name="subsidiary" id="subsidiary" value="{{ old('subsidiary') }}">
                    <option value="AMS Holding"
                        {{ old('subsidiary') ?? $employee->subsidiary == 'AMS Holding' ? 'selected' : '' }}>
                        AMS Holding
                    </option>
                    <option value="PT. ELN Plant 1"
                        {{ old('subsidiary') ?? $employee->subsidiary == 'PT. ELN Plant 1' ? 'selected' : '' }}>
                        PT. ELN Plant 1
                    </option>
                    <option value="PT. ELN Plant 2"
                        {{ old('subsidiary') ?? $employee->subsidiary == 'PT. ELN Plant 2' ? 'selected' : '' }}>
                        PT. ELN Plant 2
                    </option>
                    <option value="PT. BOFI"
                        {{ old('subsidiary') ?? $employee->subsidiary == 'PT. BOFI' ? 'selected' : '' }}>
                        PT. BOFI
                    </option>
                    <option value="PT. Haka"
                        {{ old('subsidiary') ?? $employee->subsidiary == 'PT. Haka' ? 'selected' : '' }}>
                        PT. Haka
                    </option>
                    <option value="PT. RMM"
                        {{ old('subsidiary') ?? $employee->subsidiary == 'PT. RMM' ? 'selected' : '' }}>
                        PT. RMM
                    </option>
                </select>
                @error('subsidiary')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="position">Jabatan</label>
                <select class="form-select" name="position" id="position" value="{{ old('position') }}">
                    <option value="Manager" {{ old('position') ?? $employee->position == 'Manager' ? 'selected' : '' }}>
                        Manager
                    </option>
                    <option value="Staff" {{ old('subsidiary') ?? $employee->position == 'Staff' ? 'selected' : '' }}>
                        Staff
                    </option>
                    <option value="Supervisor"
                        {{ old('subsidiary') ?? $employee->position == 'Supervisor' ? 'selected' : '' }}>
                        Supervisor
                    </option>
                    <option value="Operator"
                        {{ old('subsidiary') ?? $employee->position == 'Operator' ? 'selected' : '' }}>
                        Operator
                    </option>
                    <option value="Admin" {{ old('subsidiary') ?? $employee->position == 'Admin' ? 'selected' : '' }}>
                        Admin
                    </option>
                </select>
                @error('subsidiary')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="address">Address</label>
                <textarea class="form-control" id="address" rows="3" name="address">{{ old('address') ?? $employee->address }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary mb-2">Update</button>
        </form>
    </div>

@endsection
