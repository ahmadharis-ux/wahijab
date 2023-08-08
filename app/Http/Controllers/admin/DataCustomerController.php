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
        $tanggalAwalBulanIni = now()->startOfMonth()->toDateString();
        $tanggalAkhirBulanIni = now()->endOfMonth()->toDateString();
        $data = [
            'DataCustomer' =>User::where('id', $id)->first(),
            'RiwayatTransaksi' => Transaksi::where('user_id', $id)->get(),
            'Kategori' => KategoriProduk::all(),
            'DataPembelianBulan' => Transaksi::whereBetween('created_at',[$tanggalAwalBulanIni, $tanggalAkhirBulanIni])->where('user_id', $id)->get(),
        ];
        return view('admin.detailcustomer',$data);
    }
    function updatePembayaran($id, Request $request){
        $validasiData = $request->validate([
            'status_pembayaran' => 'required',
        ]);
        Transaksi::where('id', $request['id'])->update($validasiData);
        return back()->with('success','Status pembayaran berhasil di ubah');
    }
}
