<?php

namespace App\Http\Controllers;

use App\Models\Promosi;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PromosiController extends Controller
{
    function index(){
        $tanggalAwalBulanIni = now()->startOfMonth()->toDateString();
        $tanggalAkhirBulanIni = now()->endOfMonth()->toDateString();
        $user = auth()->user()->id;
        // $diskon = getDiskon();
        $pageData = [
            'jumlahTransaksiBulanIni' =>  Transaksi::whereBetween('created_at', [$tanggalAwalBulanIni, $tanggalAkhirBulanIni])
            ->where('user_id', Auth::user()->id)
            ->where('status_pembayaran', 'Sudah Dibayar')
            ->count(),
            'totalPembelianBulanIni' => Transaksi::whereBetween('created_at', [$tanggalAwalBulanIni, $tanggalAkhirBulanIni])
            ->where('user_id', Auth::user()->id)
            ->where('status_pembayaran', 'Sudah Dibayar')
            ->sum('qty'),
            'totalHarga' => Transaksi::whereBetween('created_at', [$tanggalAwalBulanIni, $tanggalAkhirBulanIni])
            ->where('user_id', Auth::user()->id)
            ->where('status_pembayaran', 'Sudah Dibayar')
            ->sum('subtotal'),
            'RekapTransaksi' => Transaksi::where('user_id',$user)->get(),
            'user' => User::find(Auth::user()->id),
            'Promosi' => Promosi::whereBetween('created_at',[$tanggalAwalBulanIni, $tanggalAkhirBulanIni])->where('user_id', Auth::user()->id)->count(),
        ];
        return view('user.promosi.index',$pageData);
    }
    function apply(Request $request){
        $validasiData = $request->validate([
            'diskon' => 'required',
            'user_id' => 'required',
        ]);
        Promosi::create($validasiData);
        return back();
    }
}
