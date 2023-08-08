<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index(){
        $tanggalAwalBulanIni = now()->startOfMonth()->toDateString();
        $tanggalAkhirBulanIni = now()->endOfMonth()->toDateString();
        $pageData = [
            'TotalMember' => User::count(),
            'TransaksiBulanIni' => Transaksi::whereBetween('created_at',[$tanggalAwalBulanIni,$tanggalAkhirBulanIni])->where('status_pembayaran','Sudah Dibayar')->sum('total'),
            'TotalTransaksi' => Transaksi::where('status_pembayaran','Sudah Dibayar')->count(),
            'ListTransaksi' => Transaksi::where('status_pembayaran', 'Sudah Dibayar')->get(),
        ];
        return view('admin.dashboard',$pageData);
    }
}
