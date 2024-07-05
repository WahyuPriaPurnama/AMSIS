@extends('layout.master')
@section('title', 'Daftar Perusahaan')
@section('menuPurchase_Orders', 'active')
@section('content')
    <div class="container mt-3">
        <div class="py-4 d-flex justify-content-between align-items-center">
            <h2>DATA PO</h2>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Tambah Data
            </button>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Perusahaan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @include('purchase_orders.create')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (session()->has('alert'))
            <div class="alert alert-success">
                {{ session()->get('alert') }}
            </div>
        @endif

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NOMOR</th>
                    <th>SUPPLIER</th>
                    <th>BARANG</th>
                    <th>JUMLAH</th>
                    <th>TGL PENGIRIMAN</th>
                    <th>ALAMAT</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($purchase_orders as $purchase_order)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td><a href="{{ route('purchase_orders.show', ['purchase_order' => $purchase_order->id]) }}">
                                {{ $purchase_order->number }}</td>
                        </a>
                        <td>{{ $purchase_order->supplier }}</td>
                        <td>{{ $purchase_order->items }}</td>
                        <td>{{ $purchase_order->qty }}</td>
                        <td>{{ $purchase_order->delivery_date}}</td>
                        <td>{{ $purchase_order->shipping_address}}</td>
                    </tr>
                @empty
                    <td colspan="7" class="text-center">Tidak ada data...</td>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
