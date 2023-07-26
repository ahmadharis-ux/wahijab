<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DaftarController extends Controller
{
    function index(){
        return view('auth.daftar');
    }
    function daftar(Request $request){
        $validasiData = $request->validate([
            'name' => 'required',
            'email' => 'unique:users|required',
            'whatsapp' => 'unique:users|required',
            'password' => 'required',
            'confirm' => 'required|same:password',
        ]);
        $user = new User();
        $user->name = $validasiData['name'];
        $user->email = $validasiData['email'];
        $user->whatsapp = $validasiData['whatsapp'];
        $user->password = Hash::make($validasiData['password']);
        $user->save();
        // dd($user);
        return redirect('/login')->with('success','Anda berhasil daftar, silahkan lanjutkan login!!');
    }
}
