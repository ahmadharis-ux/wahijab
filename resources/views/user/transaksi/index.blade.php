@extends('admin.layouts')
@section('container')
    <div class="container">
        <div class="card m-4">
            <div class="card-header"><h3>Riwayat Transaksi</h3></div>
            <div class="card-body">
                @foreach ($ListTransaksiUser as $transaksi)    
                <div>
                    <h6>Nomor Transaksi : WA12 394349</h6>
                    <div class="row">
                        <div class="col-3"><h6>Produk : {{$transaksi->produk->name}}</h6></div>
                        <div class="col-3"><h6>Quantity : {{$transaksi->qty}} </h6></div>
                        <div class="col-3"><h6>Total Pembayaran : Rp. {{number_format($transaksi->total)}} </h6></div>
                    </div>
                    <div class="mt-2">
                        <h6>Deskripsi Pesanan</h6>
                        <p>{{$transaksi->deskripsi}}</p>
                    </div>
                    <div class="mt-2">
                        <p><h6>Status Pembayaran <span class="badge bg-danger">Belum Dibayar</span></h6></p>
                    </div>
                    <div class="mt-2">
                        <button class="btn btn-sm btn-success">Bayar</button>
                    </div>
                    <hr>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection