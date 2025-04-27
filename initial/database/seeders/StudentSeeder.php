<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            [
                'name' => 'John Doe',
                'student_id_number' => 'S123456',
                'email' => 'John@gmail.com',
                'phone_number' => '1234567890',
                'birth_date' => '2000-01-01',
                'gender' => 'Male',
                'status' => 'Active',
                'major_id' => 1,
            ],
            [
                'name' => 'juan',
                'student_id_number' => 'S123461',
                'email' => 'Juan@gmail.com',
                'phone_number' => '123458888',
                'birth_date' => '2004-06-01',
                'gender' => 'Male',
                'status' => 'Active',
                'major_id' => 2,
            ],
        ]);
    }
}
