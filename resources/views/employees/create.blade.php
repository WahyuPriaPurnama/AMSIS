<form action="{{ route('employees.store') }}" method="post">
    @csrf
    <div class="row mb-3">
        <div class="col">
            <label class="form-label" for="nik">NIK</label>
            <input type="text" id="nik" name="nik" value="{{ old('nik') }}"
                class="form-control @error('nik') is-invalid @enderror">
            @error('nik')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label class="form-label" for="name">Nama Lengkap</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}"
                class="form-control @error('name') is-invalid @enderror">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label class="form-label">Jenis Kelamin</label>
            <div class="d-flex">
                <div class="form-check me-3">
                    <input class="form-check-input" type="radio" name="gender" id="laki_laki" value="L"
                        {{ old('gender') == 'L' ? 'checked' : '' }}>
                    <label class="form-check-label" for="laki_laki">Laki-laki</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="perempuan" value="P"
                        {{ old('gender') == 'P' ? 'checked' : '' }}>
                    <label class="form-check-label" for="perempuan">Perempuan</label>
                </div>
            </div>
            @error('gender')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label class="form-label" for="whatsapp">WhatsApp</label>
            <input type="number" id="whatsapp" name="whatsapp" value="{{ old('whatsapp') }}"
                class="form-control @error('whatsapp') is-invalid @enderror">
            @error('whatsapp')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label class="form-label" for="email">Email</label>
            <input type="text" id="email" name="email" value="{{ old('email') }}"
                class="form-control @error('email') is-invalid @enderror">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label class="form-label" for="dob">Tanggal Lahir</label>
            <input type="date" name="dob" id="dob" class="form-control" value="{{ old('dob') }}">
            @error('dob')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label class="form-label" for="subsidiary">Perusahaan</label>
            <select class="form-select" name="subsidiary" id="subsidiary" value="{{ old('subsidiary') }}">
                <option value="AMS Holding" {{ old('subsidiary') == 'AMS Holding' ? 'selected' : '' }}>
                    AMS Holding
                </option>
                <option value="PT. ELN Plant 1" {{ old('subsidiary') == 'PT. ELN Plant 1' ? 'selected' : '' }}>
                    PT. ELN Plant 1
                </option>
                <option value="PT. ELN Plant 2" {{ old('subsidiary') == 'PT. ELN Plant 2' ? 'selected' : '' }}>
                    PT. ELN Plant 2
                </option>
                <option value="PT. BOFI" {{ old('subsidiary') == 'PT. BOFI' ? 'selected' : '' }}>
                    PT. BOFI
                </option>
                <option value="PT. Haka" {{ old('subsidiary') == 'PT. Haka' ? 'selected' : '' }}>
                    PT. Haka
                </option>
                <option value="PT. RMM" {{ old('subsidiary') == 'PT. RMM' ? 'selected' : '' }}>
                    PT. RMM
                </option>
            </select>
            @error('subsidiary')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label class="form-label" for="position">Jabatan</label>
            <select class="form-select" name="position" id="position" value="{{ old('position') }}">
                <option value="Manager" {{ old('position') == 'Manager' ? 'selected' : '' }}>
                    Manager
                </option>
                <option value="Staff" {{ old('subsidiary') == 'Staff' ? 'selected' : '' }}>
                    Staff
                </option>
                <option value="Supervisor" {{ old('subsidiary') == 'Supervisor' ? 'selected' : '' }}>
                    Supervisor
                </option>
                <option value="Operator" {{ old('subsidiary') == 'Operator' ? 'selected' : '' }}>
                    Operator
                </option>
                <option value="Admin" {{ old('subsidiary') == 'Admin' ? 'selected' : '' }}>
                    Admin
                </option>
            </select>
            @error('subsidiary')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-3">

        <div class="col">
            <label class="form-label" for="address">Address</label>
            <textarea class="form-control" id="address" rows="3" name="address">{{ old('address') }}</textarea>
        </div>
        <div class="col">
            <label class="form-label" for="foto">Foto:</label>
            <input type="file" name="foto" id="foto" class="form-control" disabled>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mb-2">Simpan</button>
</form>
