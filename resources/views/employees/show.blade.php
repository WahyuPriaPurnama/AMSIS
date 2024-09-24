@extends('layouts.app')
@section('title', "Biodata $employee->nama")
@section('menuEmployees','active')
@section('content')
    <div class="container mt-3">
        @component('components.card')
            @slot('header')
                {{ $employee->nama }}
            @endslot
            <div class="d-flex justify-content-between">
                <div class="d-flex">
                    @can('update', $employee)
                        <div class="btn-group">
                            <a href="{{ route('employees.edit', ['employee' => $employee->id]) }}" class="btn btn-primary">Edit</a>
                        @endcan
                        @can('delete', $employee)
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Hapus
                            </button>
                        </div>
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Yakin mau hapus {{ $employee->nama }}?
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Gak Jadi</button>
                                        <button type="submit" form="delete" class="btn btn-danger ms-3">Iya, Yakin</button>
                                        <form id="delete"
                                            action="{{ route('employees.destroy', ['employee' => $employee->id]) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endcan
                </div>
                <a href="{{ route('employee.pdf', ['employee' => $employee->id]) }}" class="btn btn-danger"
                    target="_blank">PDF</a>
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
                                            {{ $employee->subsidiary->name }}
                                        </div>
                                        <div class="card-body text-center">
                                            <div class="mb-3">
                                                <img class="img-thumbnail" oncontextmenu="return false"
                                                    @if ($employee->pp == null) src="
                                                {{ Storage::url('public/foto_profil/default.png') }}"
                                               @else
                                              src="  {{ Storage::url('public/foto_profil/') . $employee->pp }}" @endif
                                                    alt="" srcset="">
                                            </div>
                                            <h5 class="mb-1">{{ $employee->nama }}</h5>
                                            </b>Usia: {{ Carbon\Carbon::parse($employee->tgl_lahir)->age }} Tahun
                                            <p class="text-secondary mb-4">{{ $employee->posisi }}</p>
                                            <hr>
                                            <div class="card-body text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                                </svg>

                                                {{ $employee->status_peg == 'PKWT' ? 'PKWT' : '' }}
                                                {{ $employee->status_peg == 'PKWTT' ? 'PKWTT' : '' }}<br>

                                                @if ($employee->status_peg == 'PKWT')
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                                                    </svg> {{ $employee->akhir_kontrak }}<br>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-hourglass-split" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z" />
                                                    </svg>
                                                    {{ Carbon\Carbon::now()->diffInDays($employee->akhir_kontrak) }}
                                                    hari
                                                @endif
                                            </div>
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
                                                aria-controls="emergency-tab-pane" aria-selected="false">Kontak
                                                Darurat</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="lampiran-tab" data-bs-toggle="tab"
                                                data-bs-target="#lampiran-tab-pane" type="button" role="tab"
                                                aria-controls="lampiran-tab-pane" aria-selected="false">Lampiran</button>
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
                                                    <div class="p-2">{{ $employee->subsidiary->name }}</div>
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
                                                    <div class="p-2">
                                                        {{ Carbon\Carbon::create($employee->tgl_lahir)->isoFormat('dddd, D MMMM YYYY') }}
                                                    </div>
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

                                        <div class="tab-pane fade show" id="lampiran-tab-pane" role="tabpanel"
                                            aria-labelledby="lampiran-tab" tabindex="0">

                                            <div class="row g-0">
                                                <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                    <div class="p-2">Foto Profil</div>
                                                </div>
                                                <div
                                                    class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                    <div class="p-2">
                                                        @if ($employee->pp == null)
                                                            <p class="font-monospace">kosong</p>
                                                        @else
                                                            <a href="{{ route('employee.pp', $employee->pp) }}"
                                                                target="_blank" class="btn btn-primary"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-file-earmark-arrow-down-fill"
                                                                    viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1m-1 4v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 11.293V7.5a.5.5 0 0 1 1 0" />
                                                                </svg></a>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                    <div class="p-2">KTP</div>
                                                </div>
                                                <div
                                                    class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                    <div class="p-2">
                                                        @if ($employee->ktp == null)
                                                            <p class="font-monospace">kosong</p>
                                                        @else
                                                            <a href="{{ route('employee.ktp', $employee->ktp) }}"
                                                                target="_blank" class="btn btn-primary"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-file-earmark-arrow-down-fill"
                                                                    viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1m-1 4v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 11.293V7.5a.5.5 0 0 1 1 0" />
                                                                </svg></a>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                    <div class="p-2">NPWP</div>
                                                </div>
                                                <div
                                                    class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                    <div class="p-2">
                                                        @if ($employee->npwp2 == null)
                                                            <p class="font-monospace">kosong</p>
                                                        @else
                                                            <a href="{{ route('employee.npwp', $employee->npwp2) }}"
                                                                target="_blank" class="btn btn-primary"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-file-earmark-arrow-down-fill"
                                                                    viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1m-1 4v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 11.293V7.5a.5.5 0 0 1 1 0" />
                                                                </svg></a>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                    <div class="p-2">Kartu Keluarga</div>
                                                </div>
                                                <div
                                                    class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                    <div class="p-2">
                                                        @if ($employee->kk == null)
                                                            <p class="font-monospace">kosong</p>
                                                        @else
                                                            <a href="{{ route('employee.kk', $employee->kk) }}"
                                                                target="_blank" class="btn btn-primary"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-file-earmark-arrow-down-fill"
                                                                    viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1m-1 4v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 11.293V7.5a.5.5 0 0 1 1 0" />
                                                                </svg></a>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                    <div class="p-2">BPJS Ketenagakerjaan</div>
                                                </div>
                                                <div
                                                    class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                    <div class="p-2">
                                                        @if ($employee->bpjs_ket == null)
                                                            <p class="font-monospace">kosong</p>
                                                        @else
                                                            <a href="{{ route('employee.bpjs_ket', $employee->bpjs_ket) }}"
                                                                target="_blank" class="btn btn-primary"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-file-earmark-arrow-down-fill"
                                                                    viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1m-1 4v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 11.293V7.5a.5.5 0 0 1 1 0" />
                                                                </svg></a>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                    <div class="p-2">BPJS Kesehatan</div>
                                                </div>
                                                <div
                                                    class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                    <div class="p-2">
                                                        @if ($employee->bpjs_kes == null)
                                                            <p class="font-monospace">kosong</p>
                                                        @else
                                                            <a href="{{ route('employee.bpjs_kes', $employee->bpjs_kes) }}"
                                                                target="_blank" class="btn btn-primary"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-file-earmark-arrow-down-fill"
                                                                    viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1m-1 4v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 11.293V7.5a.5.5 0 0 1 1 0" />
                                                                </svg></a>
                                                        @endif
                                                    </div>
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
        @endcomponent
    </div>
@endsection
