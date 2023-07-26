<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\KategoriProduk;
use App\Models\Produk;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(100)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $data_user =[
            ['name' => 'Admin','email' => 'Admin@gmail.com','whatsapp'=>'12','role'=>'Admin','password' => Hash::make("password")],
            ['name' => 'Ahmad haris','email' => 'Ahmad@gmail.com','whatsapp'=>'085943133886','role'=>'Member','password' => Hash::make("password")],
        ];
        foreach ($data_user as $user) {
            User::insert([
                "name" => $user["name"],
                "email" => $user["email"],
                "whatsapp" => $user["whatsapp"],
                "role" => $user["role"],
                "password" => $user["password"],
                "created_at" => Carbon::now(), "updated_at" => Carbon::now(),
            ]);
        }
        $data_kategori =[
            ['label' => 'Hijab'],
            ['label' => 'Kemeja'],
            ['label' => 'Dompet'],
        ];
        foreach ($data_kategori as $kategori) {
            KategoriProduk::insert([
                "label" => $kategori["label"],
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ]);
        }
        $sampel_produk =[
            ['name' => 'Hijab','foto_produk' => 'a','harga'=>'70000', 'stok' => '50','deskripsi'=>'lkasjdflkjsadf','kategori_id' => '1'],
            ['name' => 'Kemeja Flanel','foto_produk' => 'a','harga'=>'150000', 'stok' => '50','deskripsi'=>'lkasjdflkjsadf','kategori_id' => '2'],
        ];
        foreach ($sampel_produk as $produk) {
            Produk::insert([
                "name" => $produk["name"],
                "foto_produk" => $produk["foto_produk"],
                "harga" => $produk["harga"],
                "stok" => $produk["stok"],
                "deskripsi" => $produk["deskripsi"],
                "kategori_id" => $produk["kategori_id"],
                "created_at" => Carbon::now(), "updated_at" => Carbon::now(),
            ]);
        }
    }
}
