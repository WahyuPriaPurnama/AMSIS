<form action="{{ route('inventories.update', ['inventory' => $inventory->id]) }}" method="post">
    @method('PUT')
    @csrf
    <div class="row mb-3">
        <input type="text" name="category" value="{{ $inventory->category }}" hidden>
        <input type="text" name="spec" value="{{ $inventory->spec }}" hidden>
        <div class="col">
            <label class="form-label" for="code">Kode</label>
            <input type="text" id="code" name="code" value="{{ $inventory->code }}"
                class="form-control-plaintext" readonly>
        </div>
        <div class="col">
            <label class="form-label" for="name">Nama</label>
            <input type="text" id="name" name="name" value="{{ $inventory->name }}"
                class="form-control-plaintext" readonly>
        </div>
        <div class="col">
            <label class="form-label" for="qty">Jumlah</label>
            <input type="number" id="qty" name="qty" value="{{ $inventory->qty }}" class="form-control">
        </div>
        <div class="col">
            <label class="form-label" for="unit">Satuan</label>
            <input type="text" id="unit" name="unit" value="{{ $inventory->unit }}"
                class="form-control-plaintext" readonly>
        </div>
    </div>

    <button type="submit" class="btn btn-primary mb-2">Update</button>
</form>
