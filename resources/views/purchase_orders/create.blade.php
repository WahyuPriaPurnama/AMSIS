<form action="{{ route('subsidiaries.store') }}" method="post">
    @csrf
    <div class="row mb-3">
        <div class="col">
            <label class="form-label" for="name">Perusahaan</label>
            <select class="form-select" name="name" id="name" value="{{ old('name') }}">
                <option value="AMS Holding" {{ old('name') == 'AMS Holding' ? 'selected' : '' }}>
                    AMS Holding
                </option>
                <option value="PT. ELN Plant 1" {{ old('name') == 'PT. ELN Plant 1' ? 'selected' : '' }}>
                    PT. ELN Plant 1
                </option>
                <option value="PT. ELN Plant 2" {{ old('name') == 'PT. ELN Plant 2' ? 'selected' : '' }}>
                    PT. ELN Plant 2
                </option>
                <option value="PT. BOFI" {{ old('name') == 'PT. BOFI' ? 'selected' : '' }}>
                    PT. BOFI
                </option>
                <option value="PT. Haka" {{ old('name') == 'PT. Haka' ? 'selected' : '' }}>
                    PT. Haka
                </option>
                <option value="PT. RMM" {{ old('name') == 'PT. RMM' ? 'selected' : '' }}>
                    PT. RMM
                </option>
            </select>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label class="form-label" for="number">Nomor PO:</label>
            <input type="text" id="number" name="number" value="{{ old('number') }}"
                class="form-control @error('number') is-invalid @enderror">
            @error('number')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label class="form-label" for="supplier">Nama Supplier</label>
            <input type="text" id="supplier" name="supplier" value="{{ old('supplier') }}"
                class="form-control @error('supplier') is-invalid @enderror">
            @error('supplier')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label class="form-label" for="address">Alamat</label>
            <textarea class="form-control" id="address" rows="3" name="address">{{ old('address') }}</textarea>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label class="form-label" for="npwp">NPWP</label>
            <input type="text" id="npwp" name="npwp" value="{{ old('npwp') }}"
                class="form-control @error('supplier') is-invalid @enderror">
            @error('npwp')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label class="form-label" for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}"
                class="form-control @error('email') is-invalid @enderror">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label class="form-label" for="phone">Phone</label>
            <input type="number" id="phone" name="phone" value="{{ old('supplier') }}"
                class="form-control @error('phone') is-invalid @enderror">
            @error('phone')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <button type="submit" class="btn btn-primary mb-2">Daftar</button>
</form>
