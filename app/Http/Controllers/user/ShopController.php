<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use App\Models\Produk;
use App\Models\Promosi;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    function index(){
        $pageData = [
            "ListAllKategori" => KategoriProduk::all(),
            "listAllProduk" => Produk::all(),
        ];
        return view('user.produk',$pageData);
    }
    function showSingle($id){
        $tanggalAwalBulanIni = now()->startOfMonth()->toDateString();
        $tanggalAkhirBulanIni = now()->endOfMonth()->toDateString();
        $promosi = Promosi::whereBetween('created_at',[$tanggalAwalBulanIni, $tanggalAkhirBulanIni])->where('user_id', Auth::user()->id)->get();
        $transaksi = Transaksi::whereBetween('created_at',[$tanggalAwalBulanIni, $tanggalAkhirBulanIni])->where('user_id', Auth::user()->id)->get();
        // dd($promosi);
        // $promosiIdUsed = $transaksi->contains('promosi_id', 1);;
        $pageData =[
            'DataProduk' => Produk::where('id',$id)->first(),
            'ListKategori' => KategoriProduk::all(),
            'getDiskon' => $promosi,
            'transaksi' => $transaksi,
            'Promosi' => Transaksi::whereBetween('created_at',[$tanggalAwalBulanIni, $tanggalAkhirBulanIni])->where('user_id', Auth::user()->id)->count(),
        ];
        return view('user.single_shop.singleShop',$pageData);
    } 
    
}
