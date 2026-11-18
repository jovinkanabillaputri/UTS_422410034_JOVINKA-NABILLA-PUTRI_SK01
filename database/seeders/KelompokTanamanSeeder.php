<?php

namespace Database\Seeders;

use App\Models\KelompokTanaman;
use Illuminate\Database\Seeder;

class KelompokTanamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama_kelompok' => 'Pangan', 'deskripsi' => 'Tanaman penghasil bahan pangan.'],
            ['nama_kelompok' => 'Hortikultura', 'deskripsi' => 'Tanaman buah, sayur, dan tanaman hias.'],
            ['nama_kelompok' => 'Perkebunan', 'deskripsi' => 'Tanaman untuk kebutuhan perkebunan.'],
            ['nama_kelompok' => 'Obat', 'deskripsi' => 'Tanaman yang dimanfaatkan sebagai obat.'],
            ['nama_kelompok' => 'Rempah', 'deskripsi' => 'Tanaman penghasil rempah-rempah.'],
        ];

        foreach ($data as $item) {
            KelompokTanaman::firstOrCreate(
                ['nama_kelompok' => $item['nama_kelompok']],
                ['deskripsi' => $item['deskripsi']]
            );
        }
    }
}
