<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class DataCustomerController extends Controller
{
    public function index(){
        $data = [
            'dataSemuaCustomer' => User::where('role','Member')->get(),
        ];
        return view('admin.datacustomer',$data);
    }
    function show($id){
        $data = [
            'DataCustomer' =>User::where('id', $id)->first(),
            'RiwayatTransaksi' => Transaksi::where('user_id', $id)->get(),
            'Kategori' => KategoriProduk::all(),
        ];
        return view('admin.detailcustomer',$data);
    }
}
