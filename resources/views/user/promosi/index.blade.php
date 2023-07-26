@extends('admin.layouts')
@section('container')
    <div class="container">
        <div class="card m-2 p-2">
            <label for="">Transaksi Bulan Ini</label>
            <p>
                <h6>Jumlah Transaksi : {{$RekapTransaksi->count()}}</h6>
                <h6>Jumlah Produk : {{$RekapTransaksi->sum('qty')}}</h6>
                <h6>Jumlah Nominal Pembelian : Rp. {{number_format($RekapTransaksi->sum('total'))}} </h6>
                <hr>
                <label for="">Total Diskon:</label>
                @if ($RekapTransaksi->count() > 5)
                    <h6>Diskon Transaksi : 3%</h6>
                @elseif($RekapTransaksi->count() > 10)
                    <h6>Diskon Transaksi : 10%</h6>
                @endif
                @if ($RekapTransaksi->sum('qty') > 2)
                    <h6>Diskon Produk : 3%</h6>
                @elseif($RekapTransaksi->sum('qty') > 3)
                    <h6>Diskon Produk : 5%</h6>
                @endif
                @if ($RekapTransaksi->sum('total') > 200000)
                    <h6>Diskon Nominal Pembelian : 7%</h6>
                @elseif($RekapTransaksi->sum('total') > 350000)
                    <h6>Diskon Nominal Pembelian : 10%</h6>
                @endif

                
            </p>
        </div>
    </div>
@endsection