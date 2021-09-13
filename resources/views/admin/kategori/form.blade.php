@extends('layouts.admin', ['title_page' => 'Tambah Produk'])
@push('js')
    
@endpush
@section('content')
    <div class="row">
        <form action="{{ route('kategori.store') }}" method="POST">
        <div class="col-lg-6">
            @csrf
            <div class="form-group">
                <label>Nama Kategori</label>
                <input name="nama_kategori" class="form-control"/>
            </div>
        </div>
        <button class="btn btn-success mt-3" type="submit">Simpan</button>
        </form>
    </div>
    
@endsection