<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KelompokTanaman extends Model
{
    protected $table = 'kelompok_tanaman';

    protected $fillable = [
        'nama_kelompok',
        'deskripsi',
    ];

    public function aksesiBenih(): HasMany
    {
        return $this->hasMany(AksesiBenih::class, 'kelompok_tanaman_id');
    }
}
