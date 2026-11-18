<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AksesiBenih extends Model
{
    protected $table = 'aksesi_benih';

    protected $fillable = [
        'kode_aksesi',
        'nama_aksesi',
        'kelompok_tanaman_id',
        'catatan',
    ];

    public function kelompokTanaman(): BelongsTo
    {
        return $this->belongsTo(KelompokTanaman::class, 'kelompok_tanaman_id');
    }

    public function asalPengumpulan(): HasOne
    {
        return $this->hasOne(AsalPengumpulan::class, 'aksesi_benih_id');
    }

    public function perlakuanPenyimpanan(): BelongsToMany
    {
        return $this->belongsToMany(
            PerlakuanPenyimpanan::class,
            'aksesi_perlakuan',
            'aksesi_benih_id',
            'perlakuan_penyimpanan_id'
        )->withTimestamps();
    }
}
