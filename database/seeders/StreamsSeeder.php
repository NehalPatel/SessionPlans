<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StreamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $streams = [
            ['name' => 'BCA', 'department' => 'Computer Science', 'hod' => 'Nainesh Gathiyawala'],
            ['name' => 'BBA', 'department' => 'Business Administration', 'hod' => 'Milind Parekh'],
            ['name' => 'BCom', 'department' => 'Commerce', 'hod' => 'Isha Jaiswal'],

            ['name' => 'MScCA', 'department' => 'Computer Science', 'hod' => 'Nainesh Gathiyawala'],
            ['name' => 'MSc IT', 'department' => 'Computer Science', 'hod' => 'Akansha Shrivastava'],
            ['name' => 'MCom', 'department' => 'Commerce', 'hod' => 'Chinmay Modi'],
            ['name' => 'MMS', 'department' => 'Business Administration', 'hod' => 'Milind Parekh'],
        ];

        foreach ($streams as $stream) {
            \App\Models\Stream::create($stream);
        }
    }
}
