@extends('admin.layouts')
@section('container')
<div class="container mt-3 mb-3">
    <u><p><i><a href="/admin/customer" style="color:green; text-decoration:none">Data Customer </a> > {{$DataCustomer->name}}</i> </p></u>
</div>
<div class="container mb-3">
    {{-- <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">Transaksi Bulan ini</div>
                <div class="card-body"></div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">Promosi</div>
                <div class="card-body"></div>
            </div>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Riwayat Transaksi </div>
                <div class="card-body">
                    <table id="example" class="cell-border" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor Transaksi</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($RiwayatTransaksi as $riwayat)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$riwayat->id}}</td>
                                <td>{{\Carbon\Carbon::parse($riwayat->created_at)->format('d-M-Y')}}</td>
                                <td>
                                    @if ($riwayat->status_pembayaran == 'Belum Dibayar')
                                    <span class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#status{{$riwayat->id}}" style="cursor: pointer"><i class="fa fa-money-bill"></i></span>
                                    <!-- Modal -->
                                    <div class="modal fade" id="status{{$riwayat->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal Status Pembayaran</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <label for="">Status Pemabayaran</label>
                                                <select name="" id="" class="form-select">
                                                    <option value="{{$riwayat->status_pembayaran}}">{{$riwayat->status_pembayaran}}</option>
                                                    <option value="Sudah Dibayar">Sudah Dibayar</option>
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success">Save Change</button>
                                            </div>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                    @else
                                    <span class="badge bg-success"><i class="fa fa-money-bill"></i></span>
                                    @endif
                                </td>
                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection