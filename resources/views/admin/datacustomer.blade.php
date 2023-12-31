@extends('admin.layouts')
@section('container')
<div class="container">
   <div class="card m-4">
    <div class="card-header">List Customer</div>
    <div class="card-body">
        <table id="example" class="cell-border" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Customer</th>
                    <th>Email</th>
                    <th>Whatsapp</th>
                    <th>Since</th>
                    <th>Total Transaksi</th>
                    <th>Gatau</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataSemuaCustomer as $ListCustomer)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><a href="/admin/customer/{{$ListCustomer->id}}" style="color: green">{{$ListCustomer->name}}</a></td>
                    <td>{{$ListCustomer->email}}</td>
                    <td>{{$ListCustomer->whatsapp}}</td>
                    <td>{{\Carbon\Carbon::parse($ListCustomer->created_at)->format('Y')}}</td>
                    <td>Rp. {{number_format($ListCustomer->transaksi->where('status_pembayaran', 'Sudah Dibayar')->sum('total'))}}</td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
   </div>
</div>

@endsection