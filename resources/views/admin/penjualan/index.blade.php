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
                        <th>Bukti Bayar</th>
                        <th>Status</th>
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
                        <td class="text-center">{{ $item->payment_method }}</td>
                        <td class="text-center">{{ $item->status_payment == null ? 'menunggu' : $item->status_payment }}</td>
                        <td class="text-center">
                            {{-- <button class="btn btn-primary"><i data-feather="edit"></i> Edit</button> --}}
                            <form action="{{ route('penjualan.update', $item->id) }}" method="POST">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#transaksi_{{ $item->id }}"><i data-feather="list"></i> Detail</button>
                                @csrf
                                @method('PUT')
                                @if($item->status_payment == null)
                                <button type="submit" class="btn btn-success"><i data-feather="send"></i> Process</button>
                                @endif
                                @if($item->status_payment == 'proses')
                                <button type="button" class="btn btn-danger"><i data-feather="check-circle"></i> Selesai</button>
                                @endif
                            </form>
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
                    @if($item->payment_method == 'transfer')
                    <p><b>Bukti Pembayaran</b></p>
                    @if($item->transfer_receipt == null)
                    Tidak Ada File
                    @else
                    <a href="{{ $item->getFile() }}" target="_blank"><img src="{{ $item->getFile() }}" style="width: 10rem" /></a>
                    @endif
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection