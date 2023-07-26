<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    function index(){
        $user = auth()->user()->id;
        $pageData =[
            'ListTransaksiUser' => Transaksi::where('user_id',$user)->orderBy('created_at', 'desc')->get(),
        ];
        // dd($pageData);
        return view('user.transaksi.index',$pageData);
    }
    function buy(Request $request){
        $validasiData = $request->validate([
            'user_id' => 'required',
            'produk_id' => 'required',
            'harga' => 'required',
            'qty' => 'required',
            'deskripsi' => 'required',
            'diskon' => 'nullable',
            'subtotal' => 'required',
            'potongan' => 'nullable',
            'total' => 'required',
        ]);
        Transaksi::create($validasiData);
        return redirect('/transaksi/list')->with('store','Transaksi Berhasil');
    }

    function update(Request $request, $id){
        $request->validate([
            'status_pembayaran' => 'required',
        ]);
        $model = Transaksi::findOrFail($id);

        $model->update([
            'status_pembayaran' => $request->input('status_pembayaran')
        ]);
        return back()->with('store','Berhasil di ubah');
        

        
    }
}
