@extends('layouts.admin', ['title_page' => 'Data Barang'])
@push('js')
    
@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12 table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th>No.</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Jumlah Stok</th>
                        <th>Harga</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">1.</td>
                        <td>Barang A</td>
                        <td>ATK</td>
                        <td class="text-center">10</td>
                        <td>Rp 100.000</td>
                        <td class="text-center">
                            <button class="btn btn-primary"><i data-feather="edit"></i> Edit</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection