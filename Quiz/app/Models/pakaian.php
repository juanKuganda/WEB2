<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class pakaian extends Model
{
    public function transaksi(): BelongsTo
    {
        return $this->belongsTo(transaksi::class);
    }
    protected $fillable = [
        'id_pakaian',
        'nama_pakaian',
        'jenis',
        'ukuran'
    ];
    protected $table = 'pakaian';
}
