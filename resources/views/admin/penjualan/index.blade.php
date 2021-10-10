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
                        <th>User</th>
                        <th>No. HP</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $item->user_pembeli->name }}</td>
                        <td>{{ $item->phone_number }}</td>
                        <td class="text-center">{{ number_format($item->total,0,",",".") }}</td>
                        <td class="text-center">
                            @if($item->status_payment == null)
                            <button class="btn btn-primary"><i data-feather="edit"></i> Edit</button>
                            <button class="btn btn-success"><i data-feather="send"></i> Process</button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {{ $produk->links('pagination::simple-tailwind') }} --}}
        </div>
    </div>    
    
@endsection