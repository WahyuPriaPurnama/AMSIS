@extends('layouts.app')
@section('title', 'Master Supplier')
@section('menuSupplier', 'active')
@section('content')
    <div class="container">
        @component('components.card')
            @slot('header')
                Master Supplier
            @endslot
            <div class="table table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Supplier</th>
                            <th>Kontak</th>
                            <th>Alamat</th>
                            <th>Pembayaran</th>
                            <th>Hari</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                            <tr>
                                <td>{{ $data->firstItem() + $loop->iteration - 1 }}</td>
                                <td>{{ $item->nama_supplier }}</td>
                                <td>{{ $item->kontak }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->pembayaran }}</td>
                                <td>
                                    @if ($item->pembayaran == 'Cash')
                                        -
                                    @else
                                        {{ $item->hari }}
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <td colspan="5" class="text-center">tidak ada data...</td>
                        @endforelse

                    </tbody>
                </table>
            </div>
            <div class="row">
                {{ $data->links() }}
            </div>
        @endcomponent
    </div>

@endsection
