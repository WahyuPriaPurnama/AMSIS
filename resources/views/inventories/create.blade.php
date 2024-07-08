<form action="{{ route('inventories.store') }}" method="post">
    @csrf
    <div class="row mb-3">
        <div class="col">
            <label class="form-label" for="category">Kategori</label>
            <select class="form-select" name="category" id="category">
                <option value="Bahan Baku" selected>
                    Bahan Baku
                </option>
                <option value="Bahan Pembantu">
                    Bahan Pembantu
                </option>
                <option value="Bahan Kemas">
                    Bahan Kemas
                </option>
                <option value="Sparepart">
                    Sparepart
                </option>
                <option value="ATK">
                    ATK
                </option>
            </select>
            @error('category')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label class="form-label" for="code">Kode</label>
            <input type="text" id="code" name="code" value="{{ old('code') }}"
                class="form-control @error('code') is-invalid @enderror" required>
            @error('code')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label class="form-label" for="name">Nama</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}"
                class="form-control @error('name') is-invalid @enderror" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label class="form-label" for="qty">Jumlah</label>
            <input type="number" id="qty" name="qty" value="{{ old('qty') }}"
                class="form-control @error('qty') is-invalid @enderror" required>
            @error('qty')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label class="form-label" for="unit">Satuan</label>
            <input type="text" id="unit" name="unit" value="{{ old('unit') }}"
                class="form-control @error('unit') is-invalid @enderror" required>
            @error('unit')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="spec">Spesifikasi:</label>
            <textarea class="form-control w-50" id="spec" rows="3" name="spec" required>{{ old('spec') }}</textarea>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mb-2">Tambahkan</button>
</form>
