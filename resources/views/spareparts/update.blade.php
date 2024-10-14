<form action="{{ route('spareparts.update', $item->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="row">
        <input type="hidden" name="kode_barang" value="{{ $item->kode_barang }}">
        <input type="hidden" name="serial_number" value="{{ $item->serial_number }}">
        <input type="hidden" name="nama_barang" value="{{ $item->nama_barang }}">

        <div class="col mb-3">
            <input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror"
                id="" value="{{ old('jumlah') ?? $item->jumlah }}">
            @error('jumlah')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col mb-3">
            <input type="text" name="satuan" class="form-control" id="" value="{{ $item->satuan }}"
                readonly>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
</form>
