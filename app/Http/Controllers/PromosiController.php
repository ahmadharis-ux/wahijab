<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class PromosiController extends Controller
{
    function index(){
        $user = auth()->user()->id;
        $pageData = [
            'RekapTransaksi' => Transaksi::where('user_id',$user)->get(),
        ];
        return view('user.promosi.index',$pageData);
    }
}
