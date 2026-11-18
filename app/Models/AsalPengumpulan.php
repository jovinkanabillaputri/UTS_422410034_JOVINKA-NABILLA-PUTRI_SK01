<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AsalPengumpulan extends Model
{
    protected $table = 'asal_pengumpulan';

    protected $fillable = [
        'aksesi_benih_id',
        'provinsi',
        'kabupaten_kota',
        'kecamatan',
        'desa',
        'tanggal_pengumpulan',
        'nama_pengumpul',
        'keterangan',
    ];

    protected $casts = [
        'tanggal_pengumpulan' => 'date',
    ];

    public function aksesiBenih(): BelongsTo
    {
        return $this->belongsTo(AksesiBenih::class, 'aksesi_benih_id');
    }
}
