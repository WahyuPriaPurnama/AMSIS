<form action="{{ route('master-supplier.update', $item->id) }}" method="post">
    @method('PUT')
    @csrf
    <div class="row mb-3">
        <div class="col-sm-4 col-md-4">
            <label for="nama_supplier" class="form-label">Nama Supplier</label>
            <input type="text" name="nama_supplier" value="{{ old('nama_supplier') ?? $item->nama_supplier }}"
                class="form-control @error('nama_supplier') is-invalid @enderror">
            @error('nama_supplier')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-sm-4 col-md-4">
            <label for="jenis_supplier" class="form-label">Jenis Supplier</label>
            <input type="text" name="jenis_supplier" value="{{ old('jenis_supplier') ?? $item->jenis_supplier }}"
                class="form-control @error('jenis_supplier') is-invalid @enderror">
            @error('jenis_supplier')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-sm-4 col-md-4">
            <label for="kontak" class="form-label">Nomor Kontak</label>
            <input type="text" name="kontak" class="form-control @error('kontak') is-invalid @enderror"
                value="{{ old('kontak') ?? $item->kontak }}" id="">
            @error('kontak')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-6 col-md-3">
            <label class="form-label" for="pembayaran">Pembayaran</label>
            <select class="form-select @error('pembayaran') is-invalid @enderror" name="pembayaran" id="pembayaran">
                <option selected value="">Pilih</option>
                <option @selected($item->pembayaran == 'Cash') value="Cash">Cash</option>
                <option @selected($item->pembayarn == 'Tempo') value="Tempo">Tempo</option>
            </select>
            @error('pembayaran')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-3 col-sm-6">
            <label for="hari" class="form-label">Hari</label>
            <input type="number" name="hari" class="form-control @error('hari') is-invalid @enderror"
                value="{{ old('hari') ?? $item->hari }}" id="">
        </div>
        <div class="col-sm-12 col-md-6 mb-3">
            <label class="form-label" for="alamat">Alamat</label>
            <textarea class="form-control" id="alamat" rows="3" name="alamat">{{ old('alamat') ?? $item->alamat }}</textarea>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <button type="reset" class="btn btn-warning">Reset</button>
    
</form>
   