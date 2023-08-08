@extends('admin.layouts')
@section('container')
    <div class="container">
        <div class="card m-2 p-2">
            <label for="">Transaksi Bulan Ini</label>

            @if ($Promosi != null)
                <p>Tidak Ada Diskon Untuk BUlan Ini
                </p>
            @else
            <p>
                <h6>Jumlah Transaksi : {{$jumlahTransaksiBulanIni}}</h6>
                <h6>Jumlah Produk : {{$totalPembelianBulanIni}}</h6>
                <h6>Jumlah Nominal Pembelian : Rp. {{number_format($totalHarga)}} </h6>
                <hr>
                @php
                    $diskonBulanIni = $user->getDiskon();
                @endphp
                @if ($diskonBulanIni == 13 || $diskonBulanIni == 18 || $diskonBulanIni == 16 ||$diskonBulanIni == 15 ||$diskonBulanIni == 25 ||$diskonBulanIni == 20 || $diskonBulanIni == 22 || $diskonBulanIni == 23 )
                Total Diskon: {{ $diskonBulanIni }}%
                <form action="/diskon/apply" method="POST">
                    @csrf
                    <input type="hidden" value="{{$diskonBulanIni}}" name="diskon" class="form-control">
                    <input type="hidden" value="{{auth()->user()->id}}" name="user_id" class="form-control">
                    <button class="btn btn-sm btn-success col-2" type="submit">Pakai</button>
                </form>
                @elseif($diskonBulanIni >= 25)
                Total Diskon: 25%
                <form action="/diskon/apply" method="POST">
                    @csrf
                    <input type="hidden" value="25" name="diskon" class="form-control">
                    <input type="hidden" value="{{auth()->user()->id}}" name="user_id" class="form-control">
                    <button class="btn btn-sm btn-success col-2" type="submit">Pakai</button>
                </form>
                @endif
                <!-- Menampilkan hasil diskon -->
            </p>
            @endif
           
        </div>
    </div>
@endsection