@extends('layouts.admin', ['title_page' => isset($kategori) ? 'Ubah Kategori' : 'Tambah Kategori'])
@push('js')
    
@endpush
@section('content')
@if(isset($kategori))
<form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
@method('PUT')
@else
<form action="{{ route('kategori.store') }}" method="POST">
@endif
    <div class="row">
        <div class="col-lg-6">
            @csrf
            <div class="form-group">
                <label>Nama Kategori</label>
                <input name="nama_kategori" value="{{ isset($kategori) ? $kategori->nama_kategori : '' }}" class="form-control"/>
            </div>
            <button class="btn btn-success mt-3" type="submit">Simpan</button>
        </div>
    </div>
</form>
    
@endsection