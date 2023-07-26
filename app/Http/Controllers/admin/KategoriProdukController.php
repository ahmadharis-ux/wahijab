<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use Illuminate\Http\Request;

class KategoriProdukController extends Controller
{
    public function store(Request $request){
        $validasiData = $request->validate([
            'label' => 'required|unique:kategori_produks',
        ],[
            'label.unique' => 'Kategori tersebut sudah ada',
        ]);
        // dd($validasiData);

        KategoriProduk::create($validasiData);

        return back()->with('store','Kategori berhasil di tambahkan');
    }
}
