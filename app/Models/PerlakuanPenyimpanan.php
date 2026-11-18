<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerlakuanPenyimpanan extends Model
{
    protected $table = 'perlakuan_penyimpanan';

    protected $fillable = [
        'nama_perlakuan',
        'deskripsi',
    ];

    public function aksesiBenih(): BelongsToMany
    {
        return $this->belongsToMany(
            AksesiBenih::class,
            'aksesi_perlakuan',
            'perlakuan_penyimpanan_id',
            'aksesi_benih_id'
        )->withTimestamps();
    }
}
