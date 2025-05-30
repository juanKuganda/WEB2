<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjaga extends Model
{

    protected $table = 'penjaga';

    protected $fillable = [
        'nama',
        'email',
        'no_telepon',
    ];
}
