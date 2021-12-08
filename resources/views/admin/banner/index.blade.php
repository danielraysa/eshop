@extends('layouts.admin', ['title_page' => 'Slide Banner'])
@push('js')
    
@endpush
@section('content')
    <div class="row mb-3">
        <div class="col-lg-12">
            <a href="{{ route('banner.create') }}" class="btn btn-success">Tambah</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th>No.</th>
                        <th>Judul</th>
                        <th>Deksripsi</th>
                        <th>Banner</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($banner as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ strlen($item->deskripsi) < 100 ? $item->deskripsi : substr($item->deskripsi, 0, 100).'..' }}</td>
                        <td><a href="{{ $item->getFile() }}" target="_blank"><img src="{{ $item->getFile() }}" width="50" /></a></td>
                        <td class="text-center">
                            <a href="{{ route('banner.edit', $item) }}" class="btn btn-primary"><i data-feather="edit"></i> Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $banner->links('layouts.components.pagination') }}
        </div>
    </div>
    
@endsection