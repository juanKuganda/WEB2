<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';
    protected $primaryKey = 'id_buku';

    protected $fillable = [
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'jumlah_tersedia',
        'catergory_id'
    ];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'id_buku');
    }
    public function catergories()
    {
        return $this->belongsTo(Catergory::class, 'catergory_id');
    }
}
