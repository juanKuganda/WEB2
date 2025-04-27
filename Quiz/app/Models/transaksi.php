<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $fillable = [
        'id_pembeli',
        'id_pakaian'
    ];
    protected $table = 'transaksi';

    public function pembeli()
    {
        return $this->belongsTo(pembeli::class, 'id_pembeli');
    }

    public function pakaian()
    {
        return $this->belongsTo(pakaian::class, 'id_pakaian');
    }
}
