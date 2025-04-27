<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MajorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('majors')->insert([
            [
                'name' => 'Computer Science',
                'code' => 'CS101',
                'description' => 'Study of computer systems and computational processes.',
            ],
            [
                'name' => 'Information Technology',
                'code' => 'IT202',
                'description' => 'Focus on the use of technology in business and organizations.',
            ],
            [
                'name' => 'Software Engineering',
                'code' => 'SE303',
                'description' => 'Application of engineering principles to software development.',
            ],
            [
                'name' => 'Data Science',
                'code' => 'DS404',
                'description' => 'Study of data analysis, statistics, and machine learning.',
            ],
        ]);
    }
}
