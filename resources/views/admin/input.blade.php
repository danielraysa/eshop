@extends('layouts.admin', ['title_page' => 'Input Transaksi'])
@push('js')
    
@endpush
@section('content')
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" />
            </div>
            <div class="mb-3">
                <label class="form-label">Harga</label>
                <input type="text" name="nama" class="form-control" />
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah</label>
                <input type="text" name="nama" class="form-control" />
            </div>
        </div>
        <div class="col-lg-6 col-12">
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" />
            </div>
            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea type="text" name="nama" class="form-control" rows="5"></textarea>
            </div>
        </div>
        <div class="">
            <button name="simpan" class="btn btn-success btn-block">Simpan</button>
        </div>
    </div>
@endsection