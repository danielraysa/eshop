@extends('layouts.eshop')
@section('content')

    <!-- Start Blog Single -->
    <section class="blog-single section">
        <div class="container">
            <div class="blog-single-main">
                <div class="row">
                    <div class="col-lg-4 col-sm-12">
                        <h4 class="mb-3">Profile</h4>
                        <p>Name: {{ $user->name }}</p>
                        <p>Email: {{ $user->email }}</p>
                        <p>Phone Number: {{ $user->phone_number }}</p>
                        <p>Address: {{ $user->address }}</p>
                    </div>
                    <div class="col-lg-8 col-sm-12">
                        <h4 class="mb-3">Histori Transaksi</h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal</th>
                                    <th>Total</th>
                                    <th>Produk</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksi as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ \Formatter::formatRupiah($item->total) }}</td>
                                    <td>
                                        <ol class="pl-3">
                                        @foreach ($item->detail_transaksi as $detil)
                                            <li>{{ $detil->detail_produk->nama_produk }} ({{ $detil->jumlah }}x)
                                        @endforeach
                                        </ol>
                                    </td>
                                    <td>{{ $item->status_payment == null ? 'Pending' : $item->status_payment }}</td>
                                    <td>
                                        <button class="btn">Upload Receipt</button>
                                    </td>
                                </tr>
                                @endforeach
                            </thead>
                        </table>
                    </div>
                </div>
                    
            </div>
        </div>
    </section>
    <!--/ End Blog Single -->
@endsection