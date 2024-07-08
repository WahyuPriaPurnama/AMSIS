@extends('layout.master')
@section('title', 'Edit Perusahaan')
@section('content')
    <div class="container mt-3">
        <h3>Edit Inventory</h3>
        <hr>
        <form action="{{ route('inventories.update', ['inventory' => $inventory->id]) }}" method="post">
            @method('PUT')
            @csrf
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label" for="category">Kategori</label>
                    <select class="form-select" name="category" id="category">
                        <option value="Bahan Baku"
                            {{ old('inventory') ?? $inventory->category == 'Bahan Baku' ? 'selected' : '' }}>
                            Bahan Baku
                        </option>
                        <option value="Bahan Pembantu"
                            {{ old('inventory') ?? $inventory->category == 'Bahan Pembantu' ? 'selected' : '' }}>
                            Bahan Pembantu
                        </option>
                        <option value="Bahan Kemas"
                            {{ old('inventory') ?? $inventory->category == 'Bahan Kemas' ? 'selected' : '' }}>
                            Bahan Kemas
                        </option>
                        <option value="Sparepart"
                            {{ old('inventory') ?? $inventory->category == 'Sparepart' ? 'selected' : '' }}>
                            Sparepart
                        </option>
                        <option value="ATK" {{ old('inventory') ?? $inventory->category == 'ATK' ? 'selected' : '' }}>
                            ATK
                        </option>
                    </select>
                    @error('category')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label" for="code">Kode</label>
                    <input type="text" id="code" name="code" value="{{ old('code') ?? $inventory->code }}"
                        class="form-control @error('code') is-invalid @enderror" required>
                    @error('code')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label" for="name">Nama</label>
                    <input type="text" id="name" name="name" value="{{ old('name') ?? $inventory->name }}"
                        class="form-control @error('name') is-invalid @enderror" required>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label" for="qty">Jumlah</label>
                    <input type="number" id="qty" name="qty" value="{{ old('qty') ?? $inventory->qty }}"
                        class="form-control @error('code') is-invalid @enderror" required>
                    @error('qty')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label" for="unit">Satuan</label>
                    <input type="text" id="unit" name="unit" value="{{ old('unit') ?? $inventory->unit }}"
                        class="form-control @error('unit') is-invalid @enderror" required>
                    @error('unit')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="spec">Spesifikasi:</label>
                    <textarea class="form-control w-50" id="spec" rows="3" name="spec" required>{{ old('spec') ?? $inventory->spec }}</textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mb-2">Update</button>
        </form>
    </div>

@endsection
