@extends('layouts.admin', ['title_page' => 'Data Transaksi Penjualan'])
@push('js')
    
@endpush
@section('content')
    
    <div class="row">
        <div class="col-lg-12 table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th>No.</th>
                        <th>User</th>
                        <th>No. HP</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $item->user_pembeli->name }}</td>
                        <td>{{ $item->phone_number }}</td>
                        <td class="text-center">{{ Formatter::formatRupiah($item->total) }}</td>
                        <td class="text-center">
                            @if($item->status_payment == null)
                            {{-- <button class="btn btn-primary"><i data-feather="edit"></i> Edit</button> --}}
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#transaksi_{{ $item->id }}"><i data-feather="list"></i> Detail</button>
                            <button class="btn btn-success"><i data-feather="send"></i> Process</button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $transaksi->links('layouts.components.pagination') }}
        </div>
    </div>

    @foreach ($transaksi as $item)
    <div class="modal fade" id="transaksi_{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><strong>Detail Transaksi</strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Barang</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($item->detail_transaksi as $detil)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $detil->detail_produk->nama_produk }}</td>
                                <td class="text-center">{{ $detil->jumlah }}</td>
                                <td class="text-center">{{ Formatter::formatRupiah($detil->jumlah * $detil->harga) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection