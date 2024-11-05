<form action="{{ route('master-barang.update', $item->id) }}" method="post">
    @method('PUT')
    @csrf
    <div class="row mb-3">
        <div class="col-md-3">
            <label class="form-label" for="subsidiary_id">Kebutuhan Plant</label>
            <select class="form-select @error('subsidiary_id') is-invalid @enderror" name="subsidiary_id"
                id="subsidiary_id">
                @foreach ($subsidiaries as $subsidiary)
                    <option @selected($subsidiary->id == $item->subsidiary_id) value="{{ $item->subsidiary_id }}">{{ $subsidiary->name }}
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
                id="master_supplier_id">
                @foreach ($suppliers as $supplier)
                    <option @selected($supplier->id == $item->master_supplier_id) value="{{ $item->master_supplier_id }}">
                        {{ $supplier->nama_supplier }}</option>
                @endforeach
            </select>
            @error('master_supplier_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label for="nomor_rfo" class="form-label">Nomor RFO</label>
            <input type="text" name="nomor_rfo" value="{{ $item->nomor_rfo }}"
                class="form-control @error('nomor_rfo') is-invalid @enderror">
            @error('nomor_rfo')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label for="nomor_po" class="form-label">Nomor PO</label>
            <input type="text" name="nomor_po" value="{{ $item->nomor_po }}"
                class="form-control @error('nomor_po') is-invalid @enderror">
            @error('nomor_po')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" name="nama_barang" value="{{ $item->nama_barang}}"
                class="form-control @error('nama_barang') is-invalid @enderror">
            @error('nama_barang')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror"
                value="{{ $item->harga}}" id="">
            @error('harga')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-2">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror"
                value="{{ $item->jumlah }}">
            @error('jumlah')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-2">
            <label for="satuan" class="form-label">Satuan</label>
            <input type="text" name="satuan" class="form-control @error('satuan') is-invalid @enderror"
                value="{{ $item->satuan }}">
            @error('satuan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-2">
            <label for="tgl_pembelian" class="form-label">Tanggal Pembelian</label>
            <input type="date" name="tgl_pembelian" class="form-control @error('tgl_pembelian') is-invalid @enderror"
                value="{{ $item->tgl_pembelian}}">
            @error('tgl_pembelian')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <button type="reset" class="btn btn-warning">Reset</button>
</form>
