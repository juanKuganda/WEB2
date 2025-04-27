<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Pakaianseed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pakaian')->insert([
            [
                'id_pakaian' => 'A110',
                'nama_pakaian' => 'Cardinal',
                'jenis' => 'Jeans',
                'ukuran' => 'XL',
            ],
            [
                'id_pakaian' => 'A112',
                'nama_pakaian' => 'H&R',
                'jenis' => 'T-Shirt',
                'ukuran' => 'L',
            ],
            [
                'id_pakaian' => 'A113',
                'nama_pakaian' => 'Levis',
                'jenis' => 'Jeans',
                'ukuran' => 'S',
            ],
            [
                'id_pakaian' => 'A114',
                'nama_pakaian' => 'Crocodile',
                'jenis' => 'Jeans',
                'ukuran' => 'L',
            ],
        ]);
    }
}
