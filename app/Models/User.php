<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    function getDiskon()
    {
        $tanggalAwalBulanIni = now()->startOfMonth()->toDateString();
        $tanggalAkhirBulanIni = now()->endOfMonth()->toDateString();

        $jumlahTransaksiBulanIni = Transaksi::whereBetween('created_at', [$tanggalAwalBulanIni, $tanggalAkhirBulanIni])
            ->where('user_id', Auth::user()->id)
            ->where('status_pembayaran', 'Sudah Dibayar')
            ->count();

        $totalPembelianBulanIni = Transaksi::whereBetween('created_at', [$tanggalAwalBulanIni, $tanggalAkhirBulanIni])
            ->where('user_id', Auth::user()->id)
            ->where('status_pembayaran', 'Sudah Dibayar')
            ->sum('qty');

        $totalHarga = Transaksi::whereBetween('created_at', [$tanggalAwalBulanIni, $tanggalAkhirBulanIni])
            ->where('user_id', Auth::user()->id)
            ->where('status_pembayaran', 'Sudah Dibayar')
            ->sum('total');

        $diskon = [
            'jumlahTransaksi' => [
                5 => 0.03,
                10 => 0.10
            ],
            'jumlahPembelian' => [
                2 => 0.03,
                3 => 0.05
            ],
            'totalHarga' => [
                200000 => 0.07,
                350000 => 0.10
            ]
        ];

        $totalDiskon = 0;

        foreach ($diskon['jumlahTransaksi'] as $batas => $diskonPersen) {
            if ($jumlahTransaksiBulanIni > $batas) {
                $totalDiskon += $diskonPersen;
            }
        }

        foreach ($diskon['jumlahPembelian'] as $batas => $diskonPersen) {
            if ($totalPembelianBulanIni > $batas) {
                $totalDiskon += $diskonPersen;
            }
        }

        foreach ($diskon['totalHarga'] as $batas => $diskonPersen) {
            if ($totalHarga > $batas) {
                $totalDiskon += $diskonPersen;
            }
        }

        return $totalDiskon * 100;
    }

    function transaksi(){
        return $this->hasMany(Transaksi::class);
    }
}
