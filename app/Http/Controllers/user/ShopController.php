<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use App\Models\Produk;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    function index(){
        $pageData = [
            "ListAllKategori" => KategoriProduk::all(),
            "listAllProduk" => Produk::all(),
        ];
        return view('user.produk',$pageData);
    }
    function create(){
        $pageData = [
            'ListKategori' => KategoriProduk::all(),
        ];
        return view('admin.produk.createProduk',$pageData);
    }
    function store(Request $request){
        $validasiData = $request->validate([
            'name' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'deskripsi' => 'required',
            'kategori_id' => 'required',
            'foto_produk' => 'nullable',
        ]);
        // dd($validasiData);
        Produk::create($validasiData);
        return back()->with('store','Produk Baru berhasil di tambahkan');
    }  
    function showSingle($id){
        $pageData =[
            'DataProduk' => Produk::where('id',$id)->first(),
            'ListKategori' => KategoriProduk::all(),
        ];
        return view('user.single_shop.singleShop',$pageData);
    } 
    
}
