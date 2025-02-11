<form action="{{ route('eslip.store') }}" method="post">
    @csrf
    <div class="row mb-3">
        <div class="col">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" value="{{ old('nama') }}"
                class="form-control @error('nama') is-invalid @enderror">
            @error('nama')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label class="form-label" for="subsidiary_id">Nama Plant</label>
            <select class="form-select @error('subsidiary_id') is-invalid @enderror" name="subsidiary_id"
                id="subsidiary_id">
                <option selected value="">Pilih Plant</option>
                @foreach ($subsidiaries as $subsidiary)
                    <option value="{{ $subsidiary->id }}">{{ $subsidiary->name }}</option>
                @endforeach
            </select>
            @error('subsidiary_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label for="link" class="form-label">URL</label>
            <input type="text" name="link" class="form-control @error('link') is-invalid @enderror"
                value="{{ old('link') }}">
            @error('link')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <button type="reset" class="btn btn-warning">Reset</button>
</form>
