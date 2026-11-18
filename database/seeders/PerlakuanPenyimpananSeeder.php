<?php

namespace Database\Seeders;

use App\Models\PerlakuanPenyimpanan;
use Illuminate\Database\Seeder;

class PerlakuanPenyimpananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $data = [
            ['nama_perlakuan' => 'Penyimpanan Suhu Ruang', 'deskripsi' => 'Benih disimpan pada suhu ruang.'],
            ['nama_perlakuan' => 'Penyimpanan Dingin', 'deskripsi' => 'Benih disimpan pada suhu rendah.'],
            ['nama_perlakuan' => 'Penyimpanan Beku', 'deskripsi' => 'Benih disimpan pada suhu beku.'],
            ['nama_perlakuan' => 'Pengeringan', 'deskripsi' => 'Benih dikeringkan sebelum disimpan.'],
            ['nama_perlakuan' => 'Pengemasan Kedap Udara', 'deskripsi' => 'Benih dikemas dalam wadah kedap udara.'],
        ];

        foreach ($data as $item) {
            PerlakuanPenyimpanan::firstOrCreate(
                ['nama_perlakuan' => $item['nama_perlakuan']],
                ['deskripsi' => $item['deskripsi']]
            );
        }
    }
}
