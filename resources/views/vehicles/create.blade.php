@extends('layouts.app')
@section('title', 'Data Kendaraan')
@section('menuVehicle', 'active')
@section('content')
    <div class="container mt-3">
        @component('components.card')
            @slot('header')
                TAMBAH DATA KENDARAAN
            @endslot
            <form action="{{ route('vehicle.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6 col-12">
                        <label class="form-label" for="jenis_kendaraan">Jenis Kendaraan</label>
                        <input type="text" id="jenis_kendaraan" placeholder="Toyota Starlet" name="jenis_kendaraan"
                            value="{{ old('jenis_kendaraan') }}"
                            class="form-control @error('jenis_kendaraan') is-invalid @enderror">
                        @error('jenis_kendaraan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 col-6">
                        <label class="form-label" for="subsidiary_id">Plant</label>
                        <select class="form-select @error('subsidiary_id') is-invalid @enderror" name="subsidiary_id"
                            id="subsidiary_id">
                            <option selected value="">Pilih Plant</option>
                            @foreach ($sub as $subsidiary)
                                <option value="{{ $subsidiary->id }}">{{ $subsidiary->name }}</option>
                            @endforeach
                        </select>
                        @error('subsidiary_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-2 col-6">
                        <label class="form-label" for="tgl_perolehan">Tanggal Perolehan</label>
                        <input type="date" class="form-control @error('tgl_perolehan') is-invalid @enderror"
                            name="tgl_perolehan" value="{{ old('tgl_perolehan') }}" id="">
                        @error('subsidiary_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2 col-6">
                        <label class="form-label" for="pengguna">Pengguna</label>
                        <input type="text" class="form-control @error('pengguna') is-invalid @enderror" placeholder="Samsul"
                            name="pengguna" value="{{ old('pengguna') }}" id="">
                        @error('pengguna')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-2">
                        <label class="form-label" for="warna">Warna</label>
                        <input type="color" class="form-control @error('warna') is-invalid @enderror" name="warna"
                            value="{{ old('warna') }}" id="">
                        @error('warna')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 col-3">
                        <label class="form-label" for="tahun">Tahun</label>
                        <input type="number" class="form-control @error('tahun') is-invalid @enderror" name="tahun"
                            placeholder="2022" value="{{ old('tahun') }}" id="">
                        @error('tahun')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 col-6">
                        <label class="form-label" for="atas_nama">Atas Nama</label>
                        <input type="text" class="form-control @error('atas_nama') is-invalid @enderror" placeholder="Toha"
                            name="atas_nama" value="{{ old('atas_nama') }}" id="">
                        @error('atas_nama')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-2 col-6">
                        <label class="form-label" for="nopol">Nopol</label>
                        <input type="text" class="form-control @error('nopol') is-invalid @enderror" placeholder="X 1111 XX"
                            name="nopol" value="{{ old('nopol') }}" id="">
                        @error('nopol')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 col-6">
                        <label class="form-label" for="no_rangka">No. Rangka</label>
                        <input type="text" class="form-control @error('no_rangka') is-invalid @enderror" name="no_rangka"
                            value="{{ old('no_rangka') }}" id="">
                        @error('no_rangka')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 col-6">
                        <label class="form-label" for="no_bpkb">No. BPKB</label>
                        <input type="text" class="form-control @error('no_bpkb') is-invalid @enderror" name="no_bpkb"
                            value="{{ old('no_bpkb') }}" id="">
                        @error('no_bpkb')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 col-6">
                        <label class="form-label" for="no_mesin">No. Mesin</label>
                        <input type="text" class="form-control @error('no_mesin') is-invalid @enderror" name="no_mesin"
                            value="{{ old('no_mesin') }}" id="">
                        @error('no_mesin')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 col-6">
                        <label class="form-label" for="stnk">STNK</label>
                        <input type="date" class="form-control @error('stnk') is-invalid @enderror" name="stnk"
                            value="{{ old('stnk') }}" id="">
                        @error('stnk')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 col-6">
                        <label class="form-label" for="pajak">Pajak</label>
                        <input type="date" class="form-control @error('pajak') is-invalid @enderror" name="pajak"
                            value="{{ old('pajak') }}" id="">
                        @error('pajak')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 col-6">
                        <label class="form-label" for="kir">KIR</label>
                        <input type="date" class="form-control @error('kir') is-invalid @enderror" name="kir"
                            value="{{ old('kir') }}" id="">
                        @error('kir')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 col-6">
                        <label class="form-label" for="j_asuransi">Jenis Asuransi</label>
                        <input type="text" class="form-control @error('j_asuransi') is-invalid @enderror" name="j_asuransi"
                            value="{{ old('j_asuransi') }}" id="">
                        @error('j_asuransi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 col-6">
                        <label class="form-label" for="p_asuransi">Perusahaan Asuransi</label>
                        <input type="text" class="form-control @error('p_asuransi') is-invalid @enderror" name="p_asuransi"
                            value="{{ old('p_asuransi') }}" id="">
                        @error('p_asuransi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 col-6">
                        <label class="form-label" for="no_asuransi">No. Asuransi</label>
                        <input type="text" class="form-control @error('no_asuransi') is-invalid @enderror" name="no_asuransi"
                        value="{{ old('no_asuransi') }}" id="">
                        @error('no_asuransi')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 col-6">
                        <label class="form-label" for="jth_tempo">Jatuh Tempo</label>
                        <input type="date" class="form-control @error('jth_tempo') is-invalid @enderror" name="jth_tempo"
                            value="{{ old('jth_tempo') }}" id="">
                        @error('jth_tempo')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 col-6">
                        <label class="form-label" for="kondisi">Kondisi</label>
                        <select class="form-select @error('kondisi') is-invalid @enderror" name="kondisi" id="kondisi">
                            <option selected value="">Pilih Kondisi</option>
                            <option value="Baik">Baik</option>
                            <option value="Kurang Baik">Kurang Baik</option>
                        </select>
                        @error('kondisi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 col-6">
                        <label class="form-label" for="keterangan">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        @endcomponent
    </div>
@endsection
