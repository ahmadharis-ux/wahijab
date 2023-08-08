@extends('admin.layouts')
@section('container')
<div class="container">
    <div class="row m-4">
        <div class="col">
            <div class="card p-3"><p><b>Member</b> : <u>{{$TotalMember}}</u></p></div>
        </div>
        <div class="col">
            <div class="card p-3"><p><b>Transaksi Bulan Ini</b> : <u>Rp. {{number_format($TransaksiBulanIni)}}</u></p></div>
        </div>
        <div class="col">
            <div class="card p-3"><p><b>Total Transaksi</b> :  <u>{{$TotalTransaksi}}</u></p></div>
        </div>
    </div>
    <div class="row m-4">
        <div class="card p-3">
            <table id="example" class="cell-border" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama Customer</th>
                        <th>Id Transaksi</th>
                        <th>Tanggal Transaksi</th>
                        <th>Nominal Transaksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ListTransaksi as $transaksi)
                    <tr>
                        <td>{{$transaksi->user->name}}</td>
                        <td>{{$transaksi->id}}</td>
                        <td>{{\Carbon\Carbon::parse($transaksi->created_at)->format('d-M-Y')}}</td>
                        <td>Rp. {{number_format($transaksi->total)}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection