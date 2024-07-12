@extends('layouts.app')
@section('title', 'Input Data Karyawan')
@section('content')
    <div class="container">
        <form action="{{ route('employees.store') }}" method="post">
            @csrf
            <div class="row mb-3">
                <h3>Organisasi</h3>
                <hr>
                <div class="col">
                    <label class="form-label" for="nip">NIP</label>
                    <input type="text" id="nip" name="nip" value="{{ old('nip') }}"
                        class="form-control @error('nip') is-invalid @enderror">
                    @error('nip')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label" for="nama">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
                        class="form-control @error('nama') is-invalid @enderror">
                    @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label" for="nik">NIK</label>
                    <input type="text" id="nik" name="nik" value="{{ old('nik') }}"
                        class="form-control @error('nik') is-invalid @enderror">
                    @error('nik')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label" for="posisi">Perusahaan</label>
                    <select class="form-select" name="posisi" id="posisi" value="{{ old('posisi') }}">
                        <option value="AMS Holding" {{ old('posisi') == 'AMS Holding' ? 'selected' : '' }}>
                            AMS Holding
                        </option>
                        <option value="PT. ELN Plant 1" {{ old('posisi') == 'PT. ELN Plant 1' ? 'selected' : '' }}>
                            PT. ELN Plant 1
                        </option>
                        <option value="PT. ELN Plant 2" {{ old('posisi') == 'PT. ELN Plant 2' ? 'selected' : '' }}>
                            PT. ELN Plant 2
                        </option>
                        <option value="PT. BOFI" {{ old('posisi') == 'PT. BOFI' ? 'selected' : '' }}>
                            PT. BOFI
                        </option>
                        <option value="PT. Haka" {{ old('posisi') == 'PT. Haka' ? 'selected' : '' }}>
                            PT. Haka
                        </option>
                        <option value="PT. RMM" {{ old('posisi') == 'PT. RMM' ? 'selected' : '' }}>
                            PT. RMM
                        </option>
                    </select>
                    @error('posisi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label" for="divisi">Divisi</label>
                    <input type="text" id="divisi" name="divisi" value="{{ old('divisi') }}"
                        class="form-control @error('divisi') is-invalid @enderror">
                    @error('divisi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label" for="departemen">Departemen</label>
                    <input type="text" id="departemen" name="departemen" value="{{ old('departemen') }}"
                        class="form-control @error('departemen') is-invalid @enderror">
                    @error('departemen')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label" for="seksi">Seksi</label>
                    <input type="text" id="seksi" name="seksi" value="{{ old('seksi') }}"
                        class="form-control @error('seksi') is-invalid @enderror">
                    @error('seksi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label" for="posisi">Jabatan</label>
                    <select class="form-select" name="posisi" id="posisi" value="{{ old('posisi') }}">
                        <option value="Manager" {{ old('posisi') == 'Manager' ? 'selected' : '' }}>
                            Manager
                        </option>
                        <option value="Staff" {{ old('posisi') == 'Staff' ? 'selected' : '' }}>
                            Staff
                        </option>
                        <option value="Supervisor" {{ old('posisi') == 'Supervisor' ? 'selected' : '' }}>
                            Supervisor
                        </option>
                        <option value="Operator" {{ old('posisi') == 'Operator' ? 'selected' : '' }}>
                            Operator
                        </option>
                        <option value="Admin" {{ old('posisi') == 'Admin' ? 'selected' : '' }}>
                            Admin
                        </option>
                    </select>
                    @error('posisi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label" for="status_peg">Status Pegawai</label>
                    <select class="form-select" name="status_peg" id="status_peg" value="{{ old('status_peg') }}">
                        <option value="PKWT" {{ old('status_peg') == 'PKWT' ? 'selected' : '' }}>PKWT</option>
                        <option value="PKWTT"{{ old('status_peg') == 'PKWTT' ? 'selected' : '' }}>PKWTT</option>
                        <option value="Alihdaya"{{ old('status_peg') == 'Alihdaya' ? 'selected' : '' }}>Alihdaya</option>
                    </select>
                    @error('status_peg')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label" for="tgl_masuk">Tanggal Masuk Kerja</label>
                    <input type="date" id="tgl_masuk" name="tgl_masuk" value="{{ old('tgl_masuk') }}"
                        class="form-control @error('tgl_masuk') is-invalid @enderror">
                    @error('tgl_masuk')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label" for="awal_kontrak">Awal Kontrak</label>
                    <input type="date" id="awal_kontrak" name="awal_kontrak" value="{{ old('awal_kontrak') }}"
                        class="form-control @error('awal_kontrak') is-invalid @enderror">
                    @error('awal_kontrak')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label" for="akhir_kontrak">Akhir Kontrak</label>
                    <input type="date" id="akhir_kontrak" name="akhir_kontrak" value="{{ old('akhir_kontrak') }}"
                        class="form-control @error('akhir_kontrak') is-invalid @enderror">
                    @error('akhir_kontrak')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <h3>Biodata</h3>
                <hr>
                <div class="col">
                    <label class="form-label" for="tmpt_lahir">Tempat Lahir</label>
                    <input type="text" id="tmpt_lahir" name="tmpt_lahir" value="{{ old('tmpt_lahir') }}"
                        class="form-control @error('tmpt_lahir') is-invalid @enderror">
                    @error('tmpt_lahir')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label" for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control"
                        value="{{ old('tgl_lahir') }}">
                    @error('tgl_lahir')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label">Jenis Kelamin</label>
                    <div class="form-check me-3">
                        <input class="form-check-input" type="radio" name="gender" id="laki_laki" value="L"
                            {{ old('gender') == 'L' ? 'checked' : '' }}>
                        <label class="form-check-label" for="laki_laki">Laki-laki</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="perempuan" value="P"
                            {{ old('gender') == 'P' ? 'checked' : '' }}>
                        <label class="form-check-label" for="perempuan">Perempuan</label>
                    </div>
                    @error('gender')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-5">
                    <label class="form-label" for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" rows="3" name="alamat">{{ old('alamat') }}</textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label" for="no_telp">No. Telp / WhatsApp</label>
                    <input type="number" id="no_telp" name="no_telp" value="{{ old('no_telp') }}"
                        class="form-control @error('no_telp') is-invalid @enderror">
                    @error('no_telp')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label" for="email">Email</label>
                    <input type="text" id="email" name="email" value="{{ old('email') }}"
                        class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-2">
                    <label class="form-label" for="pend_trkhr">Pendidikan Terakhir</label>
                    <select name="pend_trkhr" id="pend_trkhr" class="form-select">
                        <option value="SD"{{ old('pend_trkhr') == 'SD' ? 'selected' : '' }}>SD</option>
                        <option value="SMP"{{ old('pend_trkhr') == 'SMP' ? 'selected' : '' }}>SMP</option>
                        <option value="SMA"{{ old('pend_trkhr') == 'SMA' ? 'selected' : '' }}>SMA</option>
                        <option value="Diploma"{{ old('pend_trkhr') == 'Diploma' ? 'selected' : '' }}>Diploma</option>
                        <option value="Sarjana"{{ old('pend_trkhr') == 'Sarjana' ? 'selected' : '' }}>Sarjana</option>
                        <option value="Magister"{{ old('pend_trkhr') == 'Magister' ? 'selected' : '' }}>Magister</option>
                        <option value="Doktor"{{ old('pend_trkhr') == 'Doktor' ? 'selected' : '' }}>Doktor</option>
                    </select>
                    @error('pend_trkhr')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label" for="jurusan">Jurusan</label>
                    <input type="text" id="jurusan" name="jurusan" value="{{ old('jurusan') }}"
                        class="form-control @error('jurusan') is-invalid @enderror">
                    @error('jurusan')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label" for="thn_lulus">Tahun Lulus</label>
                    <input type="number" id="thn_lulus" name="thn_lulus" value="{{ old('thn_lulus') }}"
                        class="form-control @error('thn_lulus') is-invalid @enderror">
                    @error('thn_lulus')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">

            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label" for="foto">Foto:</label>
                    <input type="file" name="foto" id="foto" class="form-control" disabled>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Simpan</button>
        </form>
    </div>
@endsection
