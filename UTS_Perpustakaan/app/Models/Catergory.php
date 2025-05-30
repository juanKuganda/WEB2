<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catergory extends Model
{
    protected $table = 'catergories';
    protected $fillable = [
        'name'
    ];
    public function buku()
    {
        return $this->hasMany(Buku::class, 'catergory_id');
    }

}
