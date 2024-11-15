<form action="{{ route('master-supplier.update', $item->id) }}" method="post">
    @method('PUT')
    @csrf
    <div class="row mb-3">
        <div class="col-sm-4 col-md-4">
            <label for="nama_supplier" class="form-label">Nama Supplier</label>
            <input type="text" name="nama_supplier" value="{{ old('nama_supplier') ?? $item->nama_supplier }}"
                class="form-control @error('nama_supplier') is-invalid @enderror" required>
            @error('nama_supplier')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-sm-4 col-md-4">
            <label class="form-label" for="jenis_supplier">Jenis Supplier</label>
            <select class="form-select @error('jenis_supplier') is-invalid @enderror" name="jenis_supplier"
                id="jenis_supplier" required>
                <option @selected($item->jenis_supplier == 'Umum') value="Umum">Umum</option>
                <option @selected($item->jenis_supplier == 'Maintenance') value="Maintenance">Maintenance</option>
                <option @selected($item->jenis_supplier == 'Kelistrikan')value="Kelistrikan">Kelistrikan</option>
                <option @selected($item->jenis_supplier == 'Chemical dan Alat Lab') value="Chemical dan Alat Lab">Chemical dan Alat Lab</option>
                <option @selected($item->jenis_supplier == 'Pelumas') value="Pelumas">Pelumas</option>
                <option @selected($item->jenis_supplier == 'ATK')value="ATK">ATK</option>
                <option @selected($item->jenis_supplier=='Lain-lain') value="Lain-lain">Lain-lain</option>
            </select>
            @error('jenis_supplier')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-sm-4 col-md-4">
            <label for="kontak" class="form-label">Nomor Kontak</label>
            <input type="text" name="kontak" class="form-control @error('kontak') is-invalid @enderror"
                value="{{ old('kontak') ?? $item->kontak }}" id="" required>
            @error('kontak')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id=""
                class="form-control @error('email') is-invalid @enderror" value="{{ old('email') ?? $item->email }}">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="up" class="form-label">UP</label>
            <input type="text" name="up" class="form-control @error('up') is-invalid @enderror"
                value="{{ old('up') ?? $item->up }}" id="">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-6 col-md-3">
            <label class="form-label" for="pembayaran">Pembayaran</label>
            <select class="form-select @error('pembayaran') is-invalid @enderror" name="pembayaran" id="pembayaran"
                required>
                <option @selected($item->pembayaran == 'Cash') value="Cash">Cash</option>
                <option @selected($item->pembayaran == 'Tempo') value="Tempo">Tempo</option>
                <option @selected($item->pembayaran == 'BG') value="BG">Billyet Giro</option>
            </select>
            @error('pembayaran')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-3 col-sm-6">
            <label for="hari" class="form-label">Hari</label>
            <input type="number" name="hari" class="form-control @error('hari') is-invalid @enderror"
                value="{{ old('hari') ?? $item->hari }}" id="" aria-describedby="hariHelpBlock">
            <div id="hariHelpBlock" class="form-text">
                kosongkan jika cash </div>
        </div>
        <div class="col-sm-12 col-md-6 mb-3">
            <label class="form-label" for="alamat">Alamat</label>
            <textarea class="form-control" id="alamat" rows="3" name="alamat" required>{{ old('alamat') ?? $item->alamat }}</textarea>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <button type="reset" class="btn btn-warning">Reset</button>

</form>
