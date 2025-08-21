@extends('layouts.app')
@section('title', 'Pengajuan Cuti')
@section('content')
    <div class="container">
        <div class="col-md-6 mx-auto">
            @component('components.card')
                @slot('header')
                    Pengajuan Cuti {{ Auth::user()->name }}
                @endslot
                <div class="alert alert-warning">
                    <strong>Perhatian:</strong> Pastikan Anda telah membaca dan memahami kebijakan cuti perusahaan sebelum
                    mengajukan cuti. Pengajuan cuti harus dilakukan minimal 3 hari kerja sebelum tanggal mulai cuti.
                </div>
                <form action="{{ route('cuti-requests.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->user()->employee_id }}">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="start_date" class="form-label">Tanggal Mulai</label>
                            <input type="date" name="start_date" id="start_date" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="end_date" class="form-label">Tanggal Selesai</label>
                            <input type="date" name="end_date" id="end_date" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="mb-3">
                                <label for="total_days" class="form-label">Jumlah Hari</label>
                                <input type="number" name="total_days" id="total_days" class="form-control">
                            </div>
                            <label for="attachment_path" class="form-label">Lampiran (opsional)</label>
                            <input type="file" name="attachment_path" id="attachment_path" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="note" class="form-label">Alasan / Catatan</label>
                            <textarea name="note" id="note" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Ajukan Cuti</button>
                    </div>
                </form>
            @endcomponent
        </div>
    </div>
@endsection
