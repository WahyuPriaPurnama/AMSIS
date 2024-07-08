<form action="{{ route('subsidiaries.store') }}" method="post">
    @csrf
    <div class="row mb-3">
        <div class="col">
            <label class="form-label" for="name">Atas Nama:</label>
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
            <label class="form-label" for="npwp">NPWP</label>
            <input type="text" id="npwp" name="npwp" value="{{ old('npwp') }}"
                class="form-control @error('npwp') is-invalid @enderror">
            @error('npwp')
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
            <label class="form-label" for="date">Tanggal PO:</label>
            <input type="date" id="date" name="date" value="{{ old('date') }}"
                class="form-control @error('supplier') is-invalid @enderror">
            @error('date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label class="form-label" for="supplier">Nama Supplier:</label>
            <input type="text" id="supplier" name="supplier" value="{{ old('supplier') }}"
                class="form-control @error('supplier') is-invalid @enderror">
            @error('supplier')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label class="form-label" for="phone">No. Telp.</label>
            <input type="number" id="phone" name="phone" value="{{ old('supplier') }}"
                class="form-control @error('phone') is-invalid @enderror">
            @error('phone')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label class="form-label" for="address">Alamat Supplier</label>
            <textarea class="form-control" id="address" rows="3" name="address">{{ old('address') }}</textarea>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label class="form-label" for="items">Nama Barang:</label>
            <input type="text" id="items" name="items" value="{{ old('items') }}"
                class="form-control @error('items') is-invalid @enderror">
            @error('items')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label class="form-label" for="oty">QTY:</label>
            <input type="number" id="qty" name="qty" value="{{ old('qty') }}"
                class="form-control @error('qty') is-invalid @enderror">
            @error('qty')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label class="form-label" for="unit">Satuan:</label>
            <input type="text" id="unit" name="unit" value="{{ old('unit') }}"
                class="form-control @error('unit') is-invalid @enderror">
            @error('unit')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label class="form-label" for="price">Harga Satuan:</label>
            <input type="number" id="price" name="price" value="{{ old('price') }}"
                class="form-control @error('price') is-invalid @enderror">
            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label class="form-label" for="grand_price">Jumlah Harga:</label>
            <input type="number" id="grand_price" name="grand_price" value="{{ old('grand_price') }}"
                class="form-control @error('grand_price') is-invalid @enderror">
            @error('grand_price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label class="form-label" for="top">Syarat Pembayaran:</label>
            <textarea class="form-control" id="top" rows="3" name="top">{{ old('top') }}</textarea>
        </div>
        <div class="col">
            <label class="form-label" for="grand_price">Jumlah</label>
            <input type="number" id="grand_price" name="grand_price" value="{{ old('grand_price') }}"
                class="form-control @error('grand_price') is-invalid @enderror">
            @error('grand_price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label class="form-label" for="discount">Discount</label>
            <input type="number" id="discount" name="discount" value="{{ old('discount') }}"
                class="form-control @error('discount') is-invalid @enderror">
            @error('discount')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

    </div>

    <button type="submit" class="btn btn-primary mb-2">Daftar</button>
</form>
