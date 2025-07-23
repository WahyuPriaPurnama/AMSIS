@extends('layouts.app')
@section('title', 'Data Kendaraan')
@section('menuVehicles', 'active')
@section('content')
    <div class="container mt-3">
        @component('components.card')
            @slot('header')
                EDIT {{ $vehicle->jenis_kendaraan }}
            @endslot
            <form action="{{ route('vehicle.update', ['vehicle' => $vehicle->id]) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-3 col-6 mb-3">
                        <label class="form-label" for="jenis_kendaraan">Jenis Kendaraan</label>
                        <input type="text" id="jenis_kendaraan" name="jenis_kendaraan"
                            value="{{ old('jenis_kendaraan') ?? $vehicle->jenis_kendaraan }}"
                            class="form-control @error('jenis_kendaraan') is-invalid @enderror"aria-describedby="jenis_kendaraan">
                        <div id="jenis_kendaraan" class="form-text">
                            contoh: Toyota Starlet</div>
                        @error('jenis_kendaraan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 col-6 mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select name="kategori" id="" class="form-select @error('kategori') is-invalid @enderror">
                            <option value="" selected>Pilih Kategori</option>
                            <option value="Pribadi" @selected($vehicle->kategori == 'Pribadi')>Pribadi</option>
                            <option value="Kantor" @selected($vehicle->kategori == 'Kantor')>Kantor</option>
                            <option value="Umum" @selected($vehicle->kategori == 'Umum')>Umum</option>
                        </select>
                        @error('kategori')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 col-6 mb-3">
                        <label class="form-label" for="subsidiary_id">Plant</label>
                        <select class="form-select @error('subsidiary_id') is-invalid @enderror" name="subsidiary_id"
                            id="subsidiary_id">
                            @foreach ($sub as $subsidiary)
                                <option value="{{ $subsidiary->id }}" @selected($subsidiary->id == $vehicle->subsidiary_id)>{{ $subsidiary->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('subsidiary_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-2 col-6 mb-3">
                        <label class="form-label" for="tgl_perolehan">Tanggal Perolehan</label>
                        <input type="date" class="form-control @error('tgl_perolehan') is-invalid @enderror"
                            name="tgl_perolehan" value="{{ old('tgl_perolehan') ?? $vehicle->tgl_perolehan }}" id="">
                        @error('subsidiary_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 col-6 mb-3">
                        <label class="form-label" for="pengguna">Pengguna</label>
                        <input type="text" class="form-control @error('pengguna') is-invalid @enderror" name="pengguna"
                            value="{{ old('pengguna') ?? $vehicle->pengguna }}" id="">
                        @error('pengguna')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-2 col-3 mb-3">
                        <label class="form-label" for="nama_warna">Warna</label>
                        <input type="text" class="form-control @error('nama_warna') is-invalid @enderror" name="nama_warna"
                            value="{{ old('nama_warna') ?? $vehicle->nama_warna }}" id="">
                        @error('nama_warna')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-1 col-3 mb-3">
                        <label class="form-label" for="warna">Palet</label>
                        <input type="color" class="form-control @error('warna') is-invalid @enderror" name="warna"
                            value="{{ old('warna') ?? $vehicle->warna }}" id="">
                        <div class="form-text">
                            pilih warna
                        </div>
                        @error('warna')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-2 col-3 mb-3">
                        <label class="form-label" for="tahun">Tahun Produksi</label>
                        <input type="number" class="form-control @error('tahun') is-invalid @enderror" name="tahun"
                            placeholder="2022" value="{{ old('tahun') ?? $vehicle->tahun }}" id="">
                        @error('tahun')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 col-6 mb-3">
                        <label class="form-label" for="atas_nama">Atas Nama</label>
                        <input type="text" class="form-control @error('atas_nama') is-invalid @enderror" name="atas_nama"
                            value="{{ old('atas_nama') ?? $vehicle->atas_nama }}" id="">
                        @error('atas_nama')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-2 col-3 mb-3">
                        <label class="form-label" for="nopol">Nopol</label>
                        <input type="text" class="form-control @error('nopol') is-invalid @enderror" name="nopol"
                            value="{{ old('nopol') ?? $vehicle->nopol }}" id=""aria-describedby="nopol">
                        <div id="nopol" class="form-text">
                            contoh: X 1234 XX</div>
                        @error('nopol')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-6 mb-3">
                        <label class="form-label" for="no_rangka">No. Rangka</label>
                        <input type="text" class="form-control @error('no_rangka') is-invalid @enderror" name="no_rangka"
                            value="{{ old('no_rangka') ?? $vehicle->no_rangka }}" id="">
                        @error('no_rangka')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 col-6 mb-3">
                        <label class="form-label" for="no_bpkb">No. BPKB</label>
                        <input type="text" class="form-control @error('no_bpkb') is-invalid @enderror" name="no_bpkb"
                            value="{{ old('no_bpkb') ?? $vehicle->no_bpkb }}" id="">
                        @error('no_bpkb')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 col-6 mb-3">
                        <label class="form-label" for="no_mesin">No. Mesin</label>
                        <input type="text" class="form-control @error('no_mesin') is-invalid @enderror" name="no_mesin"
                            value="{{ old('no_mesin') ?? $vehicle->no_mesin }}" id="">
                        @error('no_mesin')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 col-6 mb-3">
                        <label class="form-label" for="stnk">STNK</label>
                        <input type="date" class="form-control @error('stnk') is-invalid @enderror" name="stnk"
                            value="{{ old('stnk') ?? $vehicle->stnk }}" id="">
                        @error('stnk')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-6 mb-3">
                        <label class="form-label" for="pajak">Pajak</label>
                        <input type="date" class="form-control @error('pajak') is-invalid @enderror" name="pajak"
                            value="{{ old('pajak') ?? $vehicle->pajak }}" id="">
                        @error('pajak')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 col-6 mb-3">
                        <label class="form-label" for="kir">KIR</label>
                        <input type="date" class="form-control @error('kir') is-invalid @enderror" name="kir"
                            value="{{ old('kir') ?? $vehicle->kir }}" id="">
                        @error('kir')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 col-6 mb-3">
                        <label class="form-label" for="j_asuransi">Jenis Asuransi</label>
                        <input type="text" class="form-control @error('j_asuransi') is-invalid @enderror"
                            name="j_asuransi" value="{{ old('j_asuransi') ?? $vehicle->j_asuransi }}" id="">
                        @error('j_asuransi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 col-6 mb-3">
                        <label class="form-label" for="p_asuransi">Perusahaan Asuransi</label>
                        <input type="text" class="form-control @error('p_asuransi') is-invalid @enderror"
                            name="p_asuransi" value="{{ old('p_asuransi') ?? $vehicle->p_asuransi }}" id="">
                        @error('p_asuransi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-6 mb-3">
                        <label class="form-label" for="no_asuransi">No. Asuransi</label>
                        <input type="text" class="form-control @error('no_asuransi') is-invalid @enderror"
                            name="no_asuransi" value="{{ old('no_asuransi') ?? $vehicle->no_asuransi }}" id="">
                        @error('no_asuransi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 col-6 mb-3">
                        <label class="form-label" for="jth_tempo">Jatuh Tempo</label>
                        <input type="date" class="form-control @error('jth_tempo') is-invalid @enderror" name="jth_tempo"
                            value="{{ old('jth_tempo') ?? $vehicle->jth_tempo }}" id="">
                        @error('jth_tempo')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 col-6 mb-3">
                        <label class="form-label" for="kondisi">Kondisi</label>
                        <select class="form-select @error('kondisi') is-invalid @enderror" name="kondisi" id="kondisi">
                            <option value="Baik" @selected($vehicle->kondisi == 'Baik')>Baik</option>
                            <option value="Kurang Baik" @selected($vehicle->kondisi == 'Kurang Baik')>Kurang Baik</option>
                        </select>
                        @error('kondisi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 col-6 mb-3">
                        <label class="form-label" for="keterangan">Keterangan</label>
                        <input type="text" name="keterangan" value="{{ old('keterangan') ?? $vehicle->keterangan }}"
                            class="form-control @error('keterangan') is-invalid @enderror">
                        @error('keterangan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <h3>Lampiran</h3>
                <hr>
                <div class="row">
                    <div class="col-md-3 col-3 mb-3">
                        <label for="foto" class="form-label">Foto Kendaraan</label>
                        <input type="file" name="foto" id=""
                            class="form-control @error('foto') is-invalid @enderror"
                            accept="image/png, image/jpeg, image/jpg, application/pdf">
                        @error('foto')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 col-3 mb-3">
                        <label for="f_stnk" class="form-label">STNK</label>
                        <input type="file" name="f_stnk" id=""
                            class="form-control @error('f_stnk') is-invalid @enderror"
                            accept="image/png, image/jpeg, image/jpg, application/pdf">
                        @error('stnk')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 col-3 mb-3">
                        <label for="f_pajak" class="form-label">Pajak</label>
                        <input type="file" name="f_pajak" id=""
                            class="form-control @error('f_pajak') is-invalid @enderror"
                            accept="image/png, image/jpeg, image/jpg, application/pdf">
                        @error('f_pajak')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 col-3 mb-3">
                        <label for="f_kir" class="form-label">KIR</label>
                        <input type="file" name="f_kir" id=""
                            class="form-control @error('f_kir') is-invalid @enderror"
                            accept="image/png, image/jpeg, image/jpg, application/pdf">
                        @error('f_kir')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 col-3 mb-3">
                        <label for="qr" class="form-label">QR Code BBM Subsidi</label>
                        <input type="file" name="qr" id=""
                            class="form-control @error('qr') is-invalid @enderror"
                            accept="image/png, image/jpeg, image/jpg, application/pdf">
                        @error('qr')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 col-3 mb-3">
                        <label for="polis" class="form-label">Polis Asuransi</label>
                        <input type="file" name="f_polis" id=""
                            class="form-control @error('polis') is-invalid @enderror"
                            accept="image/png, image/jpeg, image/jpg, application/pdf">
                        @error('polis')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <x-buttons.submit></x-buttons.submit>
            </form>
        @endcomponent
    </div>
@endsection
