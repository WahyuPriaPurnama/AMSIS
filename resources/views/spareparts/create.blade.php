<form action="{{route('spareparts.store')}}" method="post">
    @csrf
    <div class="row mb-3">
        <div class="col-md-2">
            <label for="kode_barang" class="form-label">Kode Barang</label>
            <input type="text" name="kode_barang" value="{{ old('kode_barang') }}"
                class="form-control @error('kode_barang') is-invalid @enderror">
            @error('kode_barang')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-2">
            <label for="serial_number" class="form-label">Serial Number</label>
            <input type="text" name="serial_number" class="form-control @error('serial_number') is-invalid @enderror"
                value="{{ old('serial_number') }}">
            @error('serial_number')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror"
                value="{{ old('nama_barang') }}" id="">
            @error('nama_barang')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-2">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror"
                id="" value="{{ old('jumlah') }}">
            @error('jumlah')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-2">
            <label for="satuan" class="form-label">Satuan</label>
            <input type="text" name="satuan" class="form-control @error('satuan') is-invalid @enderror"
                value="{{ old('satuan') }}" id="">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <button type="reset" class="btn btn-warning">Reset</button>
</form>
