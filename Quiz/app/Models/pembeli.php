<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class pembeli extends Model
{
    public function transaksi(): HasMany
    {
        return $this->hasMany(transaksi::class);
    }
    protected $fillable = [
        'id_pembeli',
        'nama',
        'gender',
        'alamat'
    ];
    protected $table = 'pembeli';

}
