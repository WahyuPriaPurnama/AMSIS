@extends('layouts.app')
@section('title', 'Edit Data Karyawan')
@section('content')
    <div class="container">
        <form action="{{ route('employees.update', ['employee' => $employee->id]) }}" method="post"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row mb-3">
                <h3>Organisasi</h3>
                <hr>
                <div class="col">
                    <label class="form-label" for="nip">NIP</label>
                    <input type="text" id="nip" name="nip" value="{{ $employee->nip }}"
                        class="form-control @error('nip') is-invalid @enderror">
                    @error('nip')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label" for="nama">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" value="{{ $employee->nama }}"
                        class="form-control @error('nama') is-invalid @enderror">
                    @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label" for="nik">NIK</label>
                    <input type="text" id="nik" name="nik" value="{{ $employee->nik }}"
                        class="form-control @error('nik') is-invalid @enderror">
                    @error('nik')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label" for="perusahaan">Perusahaan</label>
                    <select class="form-select" name="subsidiary_id" id="perusahaan" value="{{ $employee->subsidiary_id }}">

                        @foreach ($subsidiaries as $subsidiary)
                            <option value="{{ $subsidiary->id }}" @selected($subsidiary->id == $employee->subsidiary->id)>{{ $subsidiary->name }}
                            </option>
                        @endforeach

                    </select>
                    @error('perusahaan')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label" for="divisi">Divisi</label>
                    <input type="text" id="divisi" name="divisi" value="{{ $employee->divisi }}"
                        class="form-control @error('divisi') is-invalid @enderror">
                    @error('divisi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label" for="departemen">Departemen</label>
                    <input type="text" id="departemen" name="departemen" value="{{ $employee->departemen }}"
                        class="form-control @error('departemen') is-invalid @enderror">
                    @error('departemen')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label" for="seksi">Seksi</label>
                    <input type="text" id="seksi" name="seksi" value="{{ $employee->seksi }}"
                        class="form-control @error('seksi') is-invalid @enderror">
                    @error('seksi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label" for="posisi">Jabatan</label>
                    <select class="form-select" name="posisi" id="posisi" value="{{ $employee->posisi }}">
                        <option value="Manager" @selected($employee->posisi == 'Manager')>
                            Manager
                        </option>
                        <option value="Staff" @selected($employee->posisi == 'Staff')>
                            Staff
                        </option>
                        <option value="Supervisor" @selected($employee->posisi == 'Supervisor')>
                            Supervisor
                        </option>
                        <option value="Operator" @selected($employee->posisi == 'Operator')>
                            Operator
                        </option>
                        <option value="Admin" @selected($employee->posisi == 'Admin')>
                            Admin
                        </option>
                    </select>
                    @error('posisi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label" for="status_peg">Status Pegawai</label>
                    <select class="form-select" name="status_peg" id="status_peg" value="{{ $employee->status_peg }}">
                        <option value="PKWT" @selected($employee->status_peg == 'PKWT')>PKWT</option>
                        <option value="PKWTT" @selected($employee->status_peg == 'PKWTT')>PKWTT</option>
                    </select>
                    @error('status_peg')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label" for="tgl_masuk">Tanggal Masuk Kerja</label>
                    <input type="date" id="tgl_masuk" name="tgl_masuk" value="{{ $employee->tgl_masuk }}"
                        class="form-control @error('tgl_masuk') is-invalid @enderror">
                    @error('tgl_masuk')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label" for="awal_kontrak">Awal Kontrak</label>
                    <input type="date" id="awal_kontrak" name="awal_kontrak" value="{{ $employee->awal_kontrak }}"
                        class="form-control @error('awal_kontrak') is-invalid @enderror">
                    @error('awal_kontrak')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label" for="akhir_kontrak">Akhir Kontrak</label>
                    <input type="date" id="akhir_kontrak" name="akhir_kontrak"
                        value="{{ $employee->akhir_kontrak }}"
                        class="form-control @error('akhir_kontrak') is-invalid @enderror">
                    @error('akhir_kontrak')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3 pt-3">
                <h3>Biodata</h3>
                <hr>
                <div class="col">
                    <label class="form-label" for="tmpt_lahir">Tempat Lahir</label>
                    <input type="text" id="tmpt_lahir" name="tmpt_lahir" value="{{ $employee->tmpt_lahir }}"
                        class="form-control @error('tmpt_lahir') is-invalid @enderror">
                    @error('tmpt_lahir')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label" for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control"
                        value="{{ $employee->tgl_lahir }}">
                    @error('tgl_lahir')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label">Jenis Kelamin</label>
                    <div class="form-check me-3">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki_laki"
                            value="L" @checked($employee->jenis_kelamin == 'L')>
                        <label class="form-check-label" for="laki_laki">Laki-laki</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan"
                            value="P" @checked($employee->jenis_kelamin == 'P')>
                        <label class="form-check-label" for="perempuan">Perempuan</label>
                    </div>
                    @error('jenis_kelamin')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-5">
                    <label class="form-label" for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" rows="3" name="alamat">{{ $employee->alamat }}</textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label" for="no_telp">No. Telp / WhatsApp</label>
                    <input type="number" id="no_telp" name="no_telp" value="{{ $employee->no_telp }}"
                        class="form-control @error('no_telp') is-invalid @enderror">
                    @error('no_telp')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label" for="email">Email</label>
                    <input type="text" id="email" name="email" value="{{ $employee->email }}"
                        class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-2">
                    <label class="form-label" for="pend_trkhr">Pendidikan Terakhir</label>
                    <select name="pend_trkhr" id="pend_trkhr" class="form-select">
                        <option value="SD" @selected($employee->pend_trkhr == 'SD')>SD</option>
                        <option value="SMP" @selected($employee->pend_trkhr == 'SMP')>SMP</option>
                        <option value="SMA" @selected($employee->pend_trkhr == 'SMA')>SMA</option>
                        <option value="Diploma" @selected($employee->pend_trkhr == 'Diploma')>Diploma</option>
                        <option value="Sarjana" @selected($employee->pend_trkhr == 'Sarjana')>Sarjana</option>
                        <option value="Magister" @selected($employee->pend_trkhr == 'Magister')>Magister</option>
                        <option value="Doktor" @selected($employee->pend_trkhr == 'Doktor')>Doktor</option>
                    </select>
                    @error('pend_trkhr')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label" for="jurusan">Jurusan</label>
                    <input type="text" id="jurusan" name="jurusan" value="{{ $employee->jurusan }}"
                        class="form-control @error('jurusan') is-invalid @enderror">
                    @error('jurusan')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label" for="thn_lulus">Tahun Lulus</label>
                    <input type="number" id="thn_lulus" name="thn_lulus" value="{{ $employee->thn_lulus }}"
                        class="form-control @error('thn_lulus') is-invalid @enderror">
                    @error('thn_lulus')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label" for="nama_ibu">Nama Ibu</label>
                    <input type="text" id="nama_ibu" name="nama_ibu" value="{{ $employee->nama_ibu }}"
                        class="form-control @error('nama_ibu') is-invalid @enderror">
                    @error('nama_ibu')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label" for="npwp">NPWP</label>
                    <input type="text" id="npwp" name="npwp" value="{{ $employee->npwp }}"
                        class="form-control @error('npwp') is-invalid @enderror">
                    @error('npwp')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-2">
                    <label class="form-label" for="status">Status Pernikahan</label>
                    <select name="status" id="status" class="form-select">
                        <option value="Kawin"@selected($employee->status == 'Kawin')>Kawin</option>
                        <option value="Belum Kawin"@selected($employee->status == 'Belum Kawin')>Belum Kawin
                        </option>
                    </select>
                    @error('pend_trkhr')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-2">
                    <label class="form-label" for="jml_ank">Jumlah Anak</label>
                    <input type="number" id="jml_ank" name="jml_ank" value="{{ $employee->jml_ank }}"
                        class="form-control @error('jml_ank') is-invalid @enderror">
                    @error('jml_ank')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3 pt-3">
                <h3>Kontak Darurat</h3>
                <hr>
                <div class="col">
                    <label class="form-label" for="nama_kd">Nama Kontak Darurat</label>
                    <input type="text" id="nama_ibu" name="nama_kd" value="{{ $employee->nama_kd }}"
                        class="form-control @error('nama_kd') is-invalid @enderror">
                    @error('nama_kd')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label" for="no_kd">No. Kontak Darurat</label>
                    <input type="number" id="no_kd" name="no_kd" value="{{ $employee->no_kd }}"
                        class="form-control @error('no_kd') is-invalid @enderror">
                    @error('no_kd')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label" for="hubungan">Hubungan</label>
                    <input type="text" id="hubungan" name="hubungan" value="{{ $employee->hubungan }}"
                        class="form-control @error('hubungan') is-invalid @enderror">
                    @error('hubungan')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3 pt-3">
                <h3>Lampiran</h3>
                <hr>
                <div class="col-3">
                    <label class="form-label" for="pp">Foto Profil</label>
                    <input type="file" id="pp" name="pp"
                        class="form-control @error('pp') is-invalid @enderror" accept="image/*" >
                    @error('pp')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-3">
                    <label class="form-label" for="ktp">KTP</label>
                    <input type="file" id="ktp" name="ktp"
                        class="form-control @error('ktp') is-invalid @enderror" accept="application/pdf">
                    @error('ktp')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-3">
                    <label class="form-label" for="kk">Kartu Keluarga</label>
                    <input type="file" id="kk" name="kk"
                        class="form-control @error('kk') is-invalid @enderror" accept="application/pdf">
                    @error('kk')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-3">
                    <label class="form-label" for="npwp2">NPWP</label>
                    <input type="file" id="npwp2" name="npwp2"
                        class="form-control @error('npwp2') is-invalid @enderror" accept="application/pdf">
                    @error('npwp2')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3 pt-3">

                <div class="col-3">
                    <label class="form-label" for="bpjs_kes">BPJS Kesehatan</label>
                    <input type="file" id="bpjs_kes" name="bpjs_kes"
                        class="form-control @error('bpjs_kes') is-invalid @enderror" accept="application/pdf">
                    @error('bpjs_kes')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-3">
                    <label class="form-label" for="bpjs_ket">BPJS Ketenagakerjaan</label>
                    <input type="file" id="bpjs_ket" name="bpjs_ket"
                        class="form-control @error('bpjs_ket') is-invalid @enderror" accept="application/pdf">
                    @error('bpjs_ket')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Simpan</button>
        </form>
    </div>
@endsection
