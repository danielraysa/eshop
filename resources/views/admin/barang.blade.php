@extends('layouts.admin', ['title_page' => 'Data Barang'])
@push('js')
    
@endpush
@section('content')
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah</button>
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
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">1.</td>
                        <td>Barang A</td>
                        <td>ATK</td>
                        <td class="text-center">10</td>
                        {{-- <td>Rp 100.000</td> --}}
                        <td class="text-center">
                            <button class="btn btn-primary"><i data-feather="edit"></i> Edit</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
@endsection
@push('modal')
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#sizedModalLg">
    Large
</button>
<div class="modal fade" id="sizedModalLg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Large modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
<!-- END  modal -->
    <!-- Modal -->
    <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('barang.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Produk</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group">
                            <label>Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
            </form>
        </div>
    </div>
@endpush