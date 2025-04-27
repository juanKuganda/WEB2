<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Transaksiseed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
           DB::table('transaksi')->insert([
            [
                'id_pembeli' => '212',
                'id_pakaian' => 'A110',
            ],
            [
                'id_pembeli' => '007',
                'id_pakaian' => 'A112',
            ],
            [
                'id_pembeli' => '911',
                'id_pakaian' => 'A113',
            ],
            [
                'id_pembeli' => '511',
                'id_pakaian' => 'A114',
            ],
        ]);
    }
}
