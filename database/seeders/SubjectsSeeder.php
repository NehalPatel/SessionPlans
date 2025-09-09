<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            ['name' => '503-01 Advance Web Designing', 'short_name' => 'AWD', 'stream_id' => 1],
            ['name' => '503-02 Advance Mobile Development', 'short_name' => 'AMD', 'stream_id' => 1],
            ['name' => '503-03 Advance Database Management System', 'short_name' => 'ADBMS', 'stream_id' => 1],
            ['name' => '503-04 Cloud Computing', 'short_name' => 'CC', 'stream_id' => 1],
            ['name' => '503-05 Software Project Management', 'short_name' => 'SPM', 'stream_id' => 1],
            ['name' => '503-06 Computer Graphics and Animation', 'short_name' => 'CGA', 'stream_id' => 1],
            ['name' => '503-07 Artificial Intelligence', 'short_name' => 'AI', 'stream_id' => 1],
            ['name' => '503-08 Internet of Things', 'short_name' => 'IOT', 'stream_id' => 1],
            ['name' => '503-09 Cyber Security', 'short_name' => 'CS', 'stream_id' => 1],
            ['name' => '503-10 Data Science and Big Data Analytics', 'short_name' => 'DSBDA', 'stream_id' => 1],
            ['name' => '503-11 Mobile Application Development', 'short_name' => 'MAD', 'stream_id' => 1],
            ['name' => '503-12 Web Application Development', 'short_name' => 'WAD', 'stream_id' => 1],
            ['name' => '503-13 Network Security and Cryptography', 'short_name' => 'NSC', 'stream_id' => 1],
            ['name' => '503-14 Software Testing and Quality Assurance', 'short_name' => 'STQA', 'stream_id' => 1],
            ['name' => '503-15 Human Computer Interaction', 'short_name' => 'HCI', 'stream_id' => 1],
            ['name' => '503-16 E-Commerce and Digital Marketing', 'short_name' => 'ECDM', 'stream_id' => 1],
            ['name' => '503-17 Cloud Infrastructure and Services', 'short_name' => 'CIS', 'stream_id' => 1]
        ];

        foreach ($subjects as $subject) {
            Subject::create($subject);
        }
    }
}
