@extends('layouts.admin', ['title_page' => 'Laporan Penjualan'])
@push('js')
    
@endpush
@section('content')
    <div class="row mb-3">
        <div class="col-lg-3">
                <label class="form-label">Tanggal Awal</label>
                <input type="date" name="tgl_awal" class="form-control" />
        </div>
        <div class="col-lg-3">
                <label class="form-label">Tanggal Akhir</label>
                <input type="date" name="tgl_akhir" class="form-control" />
        </div>
        <div class="col-lg-3">
                <button class="btn btn-success" type="submit">Filter</button>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card bg-primary">
                <div class="card-body">
                    <h4 class="text-white">Total Jenis Produk</h4>
                    <i class="feather-lg text-white float-end" data-feather="package"></i><h1 class="text-white">{{ $d_transaksi->count() }}</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card bg-warning">
                <div class="card-body">
                    <h4 class="text-white">Total Penjualan</h4>
                    <i class="feather-lg text-white float-end" data-feather="dollar-sign"></i><h2 class="text-white">{{ Formatter::formatRupiah($d_transaksi->sum('sub_total')) }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th>No.</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Terjual</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($d_transaksi as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $item->detail_produk->nama_produk }}</td>
                        <td>{{ $item->detail_produk->kategori_produk->nama_kategori }}</td>
                        <td class="text-center">{{ $item->sub_jumlah }}</td>
                        <td class="text-center">{{ Formatter::formatRupiah($item->sub_total) }}</td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection