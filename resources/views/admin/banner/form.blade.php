@extends('layouts.admin', ['title_page' => isset($slideBanner) ? 'Update Slide Banner' : 'Tambah Slide Banner'])
@push('js')
    
@endpush
@section('content')
@if(isset($slideBanner))
<form action="{{ route('banner.update', $slideBanner->id) }}" method="POST">
@method('PUT')
@else
<form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
@endif
    <div class="row">
        <div class="col-lg-6">
            @csrf
            <div class="form-group mb-3">
                <label>Judul</label>
                <input name="judul" value="{{ isset($slideBanner) ? $slideBanner->judul : '' }}" class="form-control" required/>
            </div>
            <div class="form-group mb-3">
                <label>Deskripsi</label>
                <textarea rows="4" name="deskripsi" class="form-control" required>{{ isset($slideBanner) ? $slideBanner->deskripsi : '' }}</textarea>
            </div>
            <div class="form-group">
                <label>File Banner</label>
                <input name="file_gambar" type="file" accept="image/png" class="form-control" {{ isset($slideBanner) ? '' : 'required' }}/>
            </div>
            <button class="btn btn-success mt-3" type="submit">Simpan</button>
        </div>
    </div>
</form>
    
@endsection