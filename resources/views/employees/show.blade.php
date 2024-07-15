@extends('layouts.app')
@section('title', "Biodata $employee->nama")
@section('content')
    <div class="container mt-3">
        <div class="pt-3 d-flex justify-content-between align-items-center">
            <h2><b>BIODATA: </b>{{ $employee->nama }} </h2>
            <h2><b>USIA: </b>{{ Carbon\Carbon::parse($employee->tgl_lahir)->age }} Tahun</h2>
            <div class="d-flex">
                <a href="{{ route('employees.edit', ['employee' => $employee->id]) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('employees.destroy', ['employee' => $employee->id]) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger ms-3">Hapus</button>
                </form>
            </div>
        </div>
        <hr>
        @if (session()->has('alert'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('alert') }}
            </div>
        @endif
        <section class="bg-light py-3 py-md-5 py-xl-8">
            <div class="container">
                <div class="row gy-4 gy-lg-0">
                    <div class="col-12 col-lg-4 col-xl-3">
                        <div class="row gy-4">
                            <div class="col-12">
                                <div class="card widget-card border-light shadow-sm">
                                    <div class="card-header text-bg-secondary">
                                        {{ $employee->perusahaan }}
                                    </div>
                                    <div class="card-body">
                                        <div class="text-center mb-3">
                                            <img class="img-fluid rounded-circle"
                                                src="https://images.pexels.com/photos/3785079/pexels-photo-3785079.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                                alt="" srcset="">
                                        </div>
                                        <h5 class="text-center mb-1">{{ $employee->nama }}</h5>
                                        <p class="text-center text-secondary mb-4">{{ $employee->posisi }}</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-12 col-lg-8 col-xl-9">
                        <div class="card widget-card border-light shadow-sm">
                            <div class="card-body p-4">
                                <ul class="nav nav-tabs" id="biodataTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="organisasi-tab" data-bs-toggle="tab"
                                            data-bs-target="#organisasi-tab-pane" type="button" role="tab"
                                            aria-controls="organisasi-tab-pane" aria-selected="true">Organisasi</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="biodata-tab" data-bs-toggle="tab"
                                            data-bs-target="#biodata-tab-pane" type="button" role="tab"
                                            aria-controls="biodata-tab-pane" aria-selected="false">Biodata</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="emergency-tab" data-bs-toggle="tab"
                                            data-bs-target="#emergency-tab-pane" type="button" role="tab"
                                            aria-controls="emergency-tab-pane" aria-selected="false">Kontak Darurat</button>
                                    </li>

                                </ul>
                                <div class="tab-content pt-4" id="organisasiTabContent">
                                    <div class="tab-pane fade show active" id="organisasi-tab-pane" role="tabpanel"
                                        aria-labelledby="organisasi-tab" tabindex="0">

                                        <div class="row g-0">
                                            <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                <div class="p-2">NIP</div>
                                            </div>
                                            <div
                                                class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                <div class="p-2">{{ $employee->nip }}</div>
                                            </div>
                                            <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                <div class="p-2">Nama Lengkap</div>
                                            </div>
                                            <div
                                                class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                <div class="p-2">{{ $employee->nama }}</div>
                                            </div>
                                            <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                <div class="p-2">NIK</div>
                                            </div>
                                            <div
                                                class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                <div class="p-2">{{ $employee->nik }}</div>
                                            </div>
                                            <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                <div class="p-2">Perusahaan</div>
                                            </div>
                                            <div
                                                class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                <div class="p-2">{{ $employee->perusahaan }}</div>
                                            </div>
                                            <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                <div class="p-2">Divisi</div>
                                            </div>
                                            <div
                                                class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                <div class="p-2">{{ $employee->divisi }}</div>
                                            </div>
                                            <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                <div class="p-2">Departemen</div>
                                            </div>
                                            <div
                                                class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                <div class="p-2">{{ $employee->departemen }}</div>
                                            </div>
                                            <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                <div class="p-2">Seksi</div>
                                            </div>
                                            <div
                                                class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                <div class="p-2">{{ $employee->seksi }}</div>
                                            </div>
                                            <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                <div class="p-2">Jabatan</div>
                                            </div>
                                            <div
                                                class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                <div class="p-2">{{ $employee->posisi }}</div>
                                            </div>
                                            <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                <div class="p-2">Status Pegawai</div>
                                            </div>
                                            <div
                                                class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                <div class="p-2">{{ $employee->status_peg }}</div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="tab-pane fade show" id="biodata-tab-pane" role="tabpanel"
                                        aria-labelledby="biodata-tab" tabindex="0">
                                        <div class="row g-0">
                                            <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                <div class="p-2">Tempat Lahir</div>
                                            </div>
                                            <div
                                                class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                <div class="p-2">{{ $employee->tmpt_lahir }}</div>
                                            </div>
                                            <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                <div class="p-2">Tanggal Lahir</div>
                                            </div>
                                            <div
                                                class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                <div class="p-2">{{ $employee->tgl_lahir }}</div>
                                            </div>
                                            <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                <div class="p-2">Jenis Kelamin</div>
                                            </div>
                                            <div
                                                class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                <div class="p-2">
                                                    {{ $employee->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</div>
                                            </div>
                                            <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                <div class="p-2">Alamat</div>
                                            </div>
                                            <div
                                                class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                <div class="p-2">{{ $employee->alamat }}</div>
                                            </div>
                                            <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                <div class="p-2">No. Telepon</div>
                                            </div>
                                            <div
                                                class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                <div class="p-2">{{ $employee->no_telp }}</div>
                                            </div>
                                            <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                <div class="p-2">Email</div>
                                            </div>
                                            <div
                                                class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                <div class="p-2">{{ $employee->email }}</div>
                                            </div>
                                            <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                <div class="p-2">Pendidikan Terakhir</div>
                                            </div>
                                            <div
                                                class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                <div class="p-2">{{ $employee->pend_trkhr }}</div>
                                            </div>
                                            <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                <div class="p-2">Jurusan</div>
                                            </div>
                                            <div
                                                class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                <div class="p-2">{{ $employee->jurusan }}</div>
                                            </div>
                                            <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                <div class="p-2">Tahun Lulus</div>
                                            </div>
                                            <div
                                                class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                <div class="p-2">{{ $employee->thn_lulus }}</div>
                                            </div>
                                            <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                <div class="p-2">Nama Ibu</div>
                                            </div>
                                            <div
                                                class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                <div class="p-2">{{ $employee->nama_ibu }}</div>
                                            </div>
                                            <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                <div class="p-2">NPWP</div>
                                            </div>
                                            <div
                                                class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                <div class="p-2">{{ $employee->npwp }}</div>
                                            </div>
                                            <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                <div class="p-2">Status Pernikahan</div>
                                            </div>
                                            <div
                                                class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                <div class="p-2">{{ $employee->status }}</div>
                                            </div>
                                            <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                <div class="p-2">Jumlah Anak</div>
                                            </div>
                                            <div
                                                class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                <div class="p-2">{{ $employee->jml_ank }}</div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="tab-pane fade show" id="emergency-tab-pane" role="tabpanel"
                                        aria-labelledby="emergency-tab" tabindex="0">

                                        <div class="row g-0">
                                            <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                <div class="p-2">Nama</div>
                                            </div>
                                            <div
                                                class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                <div class="p-2">{{ $employee->nama_kd }}</div>
                                            </div>
                                            <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                <div class="p-2">No. Telepon</div>
                                            </div>
                                            <div
                                                class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                <div class="p-2">{{ $employee->no_kd }}</div>
                                            </div>
                                            <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                <div class="p-2">Hubungan</div>
                                            </div>
                                            <div
                                                class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                <div class="p-2">{{ $employee->hubungan }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
