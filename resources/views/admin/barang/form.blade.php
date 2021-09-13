@extends('layouts.admin', ['title_page' => isset($produk) ? 'Ubah Produk' : 'Tambah Produk'])
@push('js')
    
@endpush
@section('content')
@if(isset($produk))
<form action="{{ route('barang.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
@method('PUT')
@else
<form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
@endif
    @csrf
    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select name="kategori" class="form-select" required>
                    <option selected disabled>Pilih kategori</option>
                @foreach ($kategori as $item)
                    <option {{ isset($produk) && $produk->kategori == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Produk</label>
                <input name="nama_produk" class="form-control" value="{{ isset($produk) ? $produk->nama_produk : '' }}" required/>
            </div>
            <div class="mb-3">
                <label class="form-label">Harga</label>
                <input name="harga" class="form-control" value="{{ isset($produk) ? $produk->harga : '' }}" required/>
            </div>
            <div class="mb-3">
                <label class="form-label">Stok</label>
                <input name="stok" class="form-control" value="{{ isset($produk) ? $produk->stok : '' }}" required/>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">File Gambar</label>
                <input type="file" accept=".jpg,.jpeg,.png" name="file_gambar[]" class="form-control" multiple required/>
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="8">{{ isset($produk) ? $produk->deskripsi : '' }}</textarea>
            </div>
        </div>
    </div>
    <button class="btn btn-success" type="submit">Simpan</button>
</form>
    
@endsection