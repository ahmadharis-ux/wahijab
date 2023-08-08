<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    function index(){
        $pageData = [
            "ListAllKategori" => KategoriProduk::all(),
            "listAllProduk" => Produk::all(),
        ];
        return view('admin.produk',$pageData);
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
            'foto_produk' => 'required|image|file',
        ]);
        $validasiData['foto_produk'] = $request->file('foto_produk')->store('post-foto_produk');
        dd($validasiData);
        // Produk::create($validasiData);
        return back()->with('store','Produk Baru berhasil di tambahkan');
    }  
    function showSingle($id){
        $pageData =[
            'DataProduk' => Produk::where('id',$id)->first(),
            'ListKategori' => KategoriProduk::all(),
        ];
        return view('admin.produk.editProduk',$pageData);
    } 
    
}
