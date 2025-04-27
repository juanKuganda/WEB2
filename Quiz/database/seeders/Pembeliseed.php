<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Pembeliseed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pembeli')->insert([
            [
                'id_pembeli' => '212',
                'nama' => 'Wiro Sableng',
                'alamat' => 'sigi',
                'gender' => 'Male',
            ],
            [
                'id_pembeli' => '007',
                'nama' => 'James Bond',
                'alamat' => 'palu',
                'gender' => 'Male',
            ],
            [
                'id_pembeli' => '911',
                'nama' => 'WonderWoman',
                'alamat' => 'donggala',
                'gender' => 'Female',
            ],
            [
                'id_pembeli' => '511',
                'nama' => 'Spedermen',
                'alamat' => 'palu',
                'gender' => 'Male',
            ],      
        ]);
    }
}
