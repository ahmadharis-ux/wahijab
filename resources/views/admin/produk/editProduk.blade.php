@extends('admin.layouts')
@section('container')
<div class="container mt-3 mb-3">
    <u><p><i><a href="/admin/produk" style="color:green; text-decoration:none"> Produk </a> > Edit Produk</i> </p></u>
</div>
<div class="container mb-3">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">Form Store Produk</div>
                <form action="/admin/produk/create" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <input value="{{$DataProduk->name}}" placeholder="Nama Produk.." type="text" class="form-control form-control-sm mb-3" name="name" required>
                            <div class="row">
                                <input value="{{$DataProduk->harga}}" placeholder="Harga Produk.." type="number" class="col form-control form-control-sm mx-3" name="harga" required>
                                <input value="{{$DataProduk->stok}}" placeholder="Stok Produk.." type="number" class="col form-control form-control-sm mx-3" name="stok" required>
                            </div>
                            <textarea class="form-control mt-3" name="deskripsi" placeholder="Deskripsi Produk..." rows="12">
                                {{$DataProduk->deskripsi}}
                            </textarea>
                            <div class="row mt-3">
                                <div class="col">
                                    <select name="kategori_id" id=""class="form-select" required>
                                        <option value="">{{$DataProduk->kategori->label}}</option>
                                        @foreach ($ListKategori as $kategori)
                                        <option value="{{$kategori->id}}">{{$kategori->label}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <input type="file" name="foto_produk" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">Slide Foto</div>
                <form action="/admin/produk/create" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <img class="card-img img-fluid" src="{{asset('assets/img/product_single_01.jpg')}}" alt="">
                            </div>
                            <div class="col-4">
                                <img class="card-img img-fluid" src="{{asset('assets/img/product_single_01.jpg')}}" alt="">
                            </div>
                            <div class="col-4">
                                <img class="card-img img-fluid" src="{{asset('assets/img/product_single_01.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection