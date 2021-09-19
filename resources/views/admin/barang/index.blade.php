@extends('layouts.admin', ['title_page' => 'Data Barang'])
@push('js')
    
@endpush
@section('content')
    {{-- <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah</button> --}}
    <div class="row mb-3">
        <div class="col-lg-12">
            <a href="{{ route('barang.create') }}" class="btn btn-success">Tambah</a>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#defaultModalPrimary">
                Primary
            </button>
        </div>
    </div>
    <div class="modal fade" id="defaultModalPrimary" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Default modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body m-3">
                    <p class="mb-0">Use Bootstrap’s JavaScript modal plugin to add dialogs to your site for lightboxes, user
                        notifications, or completely custom content.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
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
                        {{-- <th>Jumlah Stok</th> --}}
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produk as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_produk }}</td>
                        <td>{{ $item->kategori_produk->nama_kategori }}</td>
                        <td class="text-center">{{ $item->harga }}</td>
                        <td class="text-center">
                            @foreach ($item->gambar_produk as $gambar)
                                <a href="{{ $gambar->getFile() }}" target="_blank"><img src="{{ $gambar->getFile() }}" width="50" /></a>
                            @endforeach
                        </td>
                        <td class="text-center">
                            <a href="{{ route('barang.edit', $item->id) }}" class="btn btn-primary"><i data-feather="edit"></i> Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $produk->links('layouts.components.pagination') }}
            {{-- {{ $produk->links('pagination::simple-tailwind') }} --}}
        </div>
    </div>    
    
@endsection