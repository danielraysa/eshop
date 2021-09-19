@extends('layouts.admin', ['title_page' => 'Data Kategori'])
@push('js')
    
@endpush
@section('content')
    {{-- <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah</button> --}}
    <div class="row mb-3">
        <div class="col-lg-12">
            <a href="{{ route('kategori.create') }}" class="btn btn-success">Tambah</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th>No.</th>
                        <th>Kategori</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategori as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_kategori }}</td>
                        <td class="text-center">
                            <a href="{{ route('kategori.edit', $item) }}" class="btn btn-primary"><i data-feather="edit"></i> Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $kategori->links('layouts.components.pagination') }}
        </div>
    </div>
    
@endsection