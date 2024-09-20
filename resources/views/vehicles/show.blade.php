@extends('layouts.app')
@section('title', "$vehicle->jenis_kendaraan")
@section('menuVehicles', 'active')
@section('content')
    <div class="container mt-3">
        @component('components.card')
            @slot('header')
                {{ $vehicle->jenis_kendaraan }}
            @endslot
            <div class="d-flex justify-content-between">
                <div class="d-flex">
                    @can('update', $vehicle)
                        <div class="btn-group">
                            <a href="{{ route('vehicle.edit', ['vehicle' => $vehicle->id]) }}" class="btn btn-primary">Edit</a>
                        @endcan
                        @can('delete', $vehicle)
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Hapus
                            </button>
                        </div>
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Yakin mau hapus
                                            {{ $vehicle->jenis_kendaraan }}?
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Gak Jadi</button>
                                        <button type="submit" form="delete" class="btn btn-danger ms-3">Iya, Yakin</button>
                                        <form id="delete" action="{{ route('vehicle.destroy', ['vehicle' => $vehicle->id]) }}"
                                            method="post">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endcan
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
                                            {{ $vehicle->subsidiary->name }}
                                        </div>
                                        <div class="card-body text-center">
                                            <div class="mb-3">
                                                <img class="img-thumbnail"
                                                    @if ($vehicle->foto == null) src="
                                                {{ Storage::url('public/vehicles/foto/default.png') }}"
                                               @else
                                              src="  {{ Storage::url('public/vehicles/foto/') . $vehicle->foto }}" @endif
                                                    alt="" srcset="">
                                            </div>
                                            <h5 class="mb-1">{{ $vehicle->jenis_kendaraan }}</h5>
                                            </b>Usia Kendaraan: {{ Carbon\Carbon::parse($vehicle->tahun)->age }} Tahun
                                            <p class="text-secondary">{{ $vehicle->nopol }}</p>
                                            <h4>Kondisi: {{ $vehicle->kondisi }}</h4>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                            </svg>
                                            {{ $vehicle->pengguna }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-8 col-xl-9">
                            <div class="card widget-card border-light shadow-sm">
                                <div class="card-body p-4">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="ringkasan-tab" data-bs-toggle="tab"
                                                data-bs-target="#ringkasan-tab-pane" type="button" role="tab"
                                                aria-controls="ringkasan-tab-pane" aria-selected="true">Ringkasan</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="kelengkapan-tab" data-bs-toggle="tab"
                                                data-bs-target="#kelengkapan-tab-pane" type="button" role="tab"
                                                aria-controls="kelengkapan-tab-pane" aria-selected="false">Kelengkapan</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="jatuh-tempo-tab" data-bs-toggle="tab"
                                                data-bs-target="#jatuh-tempo-tab-pane" type="button" role="tab"
                                                aria-controls="jatuh-tempo-tab-pane" aria-selected="false">Jatuh Tempo</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="lampiran-tab" data-bs-toggle="tab"
                                                data-bs-target="#lampiran-tab-pane" type="button" role="tab"
                                                aria-controls="lampiran-tab-pane" aria-selected="false">Lampiran</button>
                                        </li>

                                    </ul>
                                    <div class="tab-content pt-4" id="ringkasanTabContent">
                                        <div class="tab-pane fade show active" id="ringkasan-tab-pane" role="tabpanel"
                                            aria-labelledby="ringkasan-tab" tabindex="0">

                                            <div class="row g-0">
                                                <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                    <div class="p-2">Kendaraan</div>
                                                </div>
                                                <div
                                                    class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                    <div class="p-2">{{ $vehicle->jenis_kendaraan }}</div>
                                                </div>
                                                <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                    <div class="p-2">Tanggal Perolehan</div>
                                                </div>
                                                <div
                                                    class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                    <div class="p-2">{{ $vehicle->tgl_perolehan }}</div>
                                                </div>
                                                <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                    <div class="p-2">Pengguna</div>
                                                </div>
                                                <div
                                                    class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                    <div class="p-2">{{ $vehicle->pengguna }}</div>
                                                </div>
                                                <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                    <div class="p-2">Perusahaan</div>
                                                </div>
                                                <div
                                                    class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                    <div class="p-2">{{ $vehicle->subsidiary->name }}</div>
                                                </div>
                                                <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                    <div class="p-2">Warna</div>
                                                </div>
                                                <div
                                                    class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                    <div class="p-2">{{ $vehicle->nama_warna }}</div>
                                                </div>
                                                <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                    <div class="p-2">Visual dan Kode Warna</div>
                                                </div>
                                                <div
                                                    class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                    <div class="p-2" style="background-color:{{ $vehicle->warna }}">
                                                        {{ $vehicle->warna }}</div>
                                                </div>
                                                <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                    <div class="p-2">Tahun Produksi</div>
                                                </div>
                                                <div
                                                    class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                    <div class="p-2">{{ $vehicle->tahun }}</div>
                                                </div>
                                                <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                    <div class="p-2">Atas Nama</div>
                                                </div>
                                                <div
                                                    class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                    <div class="p-2">{{ $vehicle->atas_nama }}</div>
                                                </div>
                                                <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                    <div class="p-2">Kondisi</div>
                                                </div>
                                                <div
                                                    class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                    <div class="p-2">{{ $vehicle->kondisi }}</div>
                                                </div>
                                                <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                    <div class="p-2">Keterangan</div>
                                                </div>
                                                <div
                                                    class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                    <div class="p-2">
                                                        @if ($vehicle->keterangan == null)
                                                            <p class="font-monospace">Belum ada keterangan</p>
                                                        @else
                                                            {{ $vehicle->keterangan }}
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="tab-pane fade show" id="kelengkapan-tab-pane" role="tabpanel"
                                            aria-labelledby="kelengkapan-tab" tabindex="0">
                                            <div class="row g-0">
                                                <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                    <div class="p-2">No. Rangka</div>
                                                </div>
                                                <div
                                                    class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                    <div class="p-2">{{ $vehicle->no_rangka }}</div>
                                                </div>
                                                <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                    <div class="p-2">No. BPKB</div>
                                                </div>
                                                <div
                                                    class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                    <div class="p-2">
                                                        {{ $vehicle->no_bpkb }}
                                                    </div>
                                                </div>
                                                <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                    <div class="p-2">No. Mesin</div>
                                                </div>
                                                <div
                                                    class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                    <div class="p-2">
                                                        {{ $vehicle->no_mesin }}</div>
                                                </div>
                                                <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                    <div class="p-2">Jenis Asuransi</div>
                                                </div>
                                                <div
                                                    class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                    <div class="p-2">
                                                        {{ $vehicle->j_asuransi }}</div>
                                                </div>
                                                <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                    <div class="p-2">Polis Asuransi</div>
                                                </div>
                                                <div
                                                    class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                    <div class="p-2">
                                                        {{ $vehicle->p_asuransi }}</div>
                                                </div>
                                                <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                    <div class="p-2">No. Asuransi</div>
                                                </div>
                                                <div
                                                    class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                    <div class="p-2">
                                                        {{ $vehicle->no_asuransi }}</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade show" id="jatuh-tempo-tab-pane" role="tabpanel"
                                            aria-labelledby="jatuh-tempo-tab" tabindex="0">

                                            <div class="row g-0">
                                                <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                    <div class="p-2">Asuransi</div>
                                                </div>
                                                <div
                                                    class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                    <div class="p-2">{{ $vehicle->jth_tempo }}</div>
                                                </div>
                                                <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                    <div class="p-2">STNK</div>
                                                </div>
                                                <div
                                                    class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                    <div class="p-2">{{ $vehicle->stnk }}</div>
                                                </div>
                                                <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                    <div class="p-2">Pajak</div>
                                                </div>
                                                <div
                                                    class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                    <div class="p-2">{{ $vehicle->pajak }}</div>
                                                </div>
                                                <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                    <div class="p-2">KIR</div>
                                                </div>
                                                <div
                                                    class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                    <div class="p-2">
                                                        {{ $vehicle->kir }}</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade show" id="lampiran-tab-pane" role="tabpanel"
                                            aria-labelledby="lampiran-tab" tabindex="0">

                                            <div class="row g-0">
                                                <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                    <div class="p-2">Foto Kendaraan</div>
                                                </div>
                                                <div
                                                    class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                    <div class="p-2">
                                                        @if ($vehicle->foto == null)
                                                            <p class="font-monospace">kosong</p>
                                                        @else
                                                            <a href="{{ route('vehicle.foto', $vehicle->foto) }}"
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
                                                    <div class="p-2">STNK</div>
                                                </div>
                                                <div
                                                    class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                    <div class="p-2">
                                                        @if ($vehicle->f_stnk == null)
                                                            <p class="font-monospace">kosong</p>
                                                        @else
                                                            <a href="{{ route('vehicle.stnk', $vehicle->f_stnk) }}"
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
                                                    <div class="p-2">PAJAK</div>
                                                </div>
                                                <div
                                                    class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                    <div class="p-2">
                                                        @if ($vehicle->f_pajak == null)
                                                            <p class="font-monospace">kosong</p>
                                                        @else
                                                            <a href="{{ route('vehicle.pajak', $vehicle->f_pajak) }}"
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
                                                    <div class="p-2">KIR</div>
                                                </div>
                                                <div
                                                    class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                    <div class="p-2">
                                                        @if ($vehicle->f_kir == null)
                                                            <p class="font-monospace">kosong</p>
                                                        @else
                                                            <a href="{{ route('vehicle.kir', $vehicle->f_kir) }}"
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
                                                    <div class="p-2">QR Code BBM Subsidi</div>
                                                </div>
                                                <div
                                                    class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                    <div class="p-2">
                                                        @if ($vehicle->qr == null)
                                                            <p class="font-monospace">kosong</p>
                                                        @else
                                                            <a href="{{ route('vehicle.qr', $vehicle->qr) }}" target="_blank"
                                                                class="btn btn-primary"><svg
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
