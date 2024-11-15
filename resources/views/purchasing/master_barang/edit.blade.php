<form action="{{ route('master-barang.update', $item->id) }}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-md-2 mb-3">
            <label class="form-label" for="subsidiary_id">Kebutuhan Plant</label>
            <select class="form-select @error('subsidiary_id') is-invalid @enderror" name="subsidiary_id"
                id="subsidiary_id" required>
                @foreach ($subsidiaries as $subsidiary)
                    <option @selected($subsidiary->id == $item->subsidiary_id) value="{{ $subsidiary->id }}">{{ $subsidiary->name }}
                    </option>
                @endforeach
            </select>
            @error('subsidiary_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-3">
            <label class="form-label" for="master_supplier_id">Nama Supplier</label>
            <select class="form-select @error('master_supplier_id') is-invalid @enderror" name="master_supplier_id"
                id="master_supplier_id" required>
                @foreach ($suppliers as $supplier)
                    <option @selected($supplier->id == $item->master_supplier_id) value="{{ $supplier->id }}">
                        {{ $supplier->nama_supplier }}</option>
                @endforeach
            </select>
            @error('master_supplier_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-5 mb-3">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" name="nama_barang" value="{{ $item->nama_barang }}"
                class="form-control @error('nama_barang') is-invalid @enderror" required>
            @error('nama_barang')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-2 mb-3">
            <label class="form-label" for="kategori">Kategori</label>
            <select class="form-select @error('kategori') is-invalid @enderror" name="kategori" id="kategori" required>
                <option @selected($item->kategori == 'Periodik') value="Periodik">Periodik</option>
                <option @selected($item->kategori == 'Non Periodik') value="Non Periodik">Non Periodik</option>
            </select>
            @error('kategori')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col-md-2 mb-3">
            <label class="form-label" for="periode">Periode Hari</label>
            <input type="number" name="periode" value="{{$item->periode}}" class="form-control" aria-describedby="hariHelpBlock">
            <div id="hariHelpBlock" class="form-text">
                kosongkan jika non periodik </div>
            @error('periode')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror"
                value="{{ $item->harga }}" id="" required>
            @error('harga')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-2 mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror"
                value="{{ $item->jumlah }}" required>
            @error('jumlah')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-2 mb-3">
            <label for="satuan" class="form-label">Satuan</label>
            <input type="text" name="satuan" class="form-control @error('satuan') is-invalid @enderror"
                value="{{ $item->satuan }}" required>
            @error('satuan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-2 mb-3">
            <label for="tgl_pembelian" class="form-label">Tanggal Pembelian</label>
            <input type="date" name="tgl_pembelian" class="form-control @error('tgl_pembelian') is-invalid @enderror"
                value="{{ $item->tgl_pembelian }}" required>
            @error('tgl_pembelian')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <button type="reset" class="btn btn-warning">Reset</button>
</form>
