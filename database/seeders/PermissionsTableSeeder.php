<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['name' => 'permission_create',],
            ['name' => 'permission_edit',],
            ['name' => 'permission_delete',],
            ['name' => 'permission_show',],
            ['name' => 'permission_access',],
            ['name' => 'role_create',],
            ['name' => 'role_edit',],
            ['name' => 'role_show',],
            ['name' => 'role_delete',],
            ['name' => 'role_access',],

            ['name' => 'contact_create',],
            ['name' => 'contact_edit',],
            ['name' => 'contact_show',],
            ['name' => 'contact_delete',],
            ['name' => 'contact_access',],

            ['name' => 'document_create',],
            ['name' => 'document_edit',],
            ['name' => 'document_show',],
            ['name' => 'document_delete',],
            ['name' => 'document_access',],

            ['name' => 'event_create',],
            ['name' => 'event_edit',],
            ['name' => 'event_show',],
            ['name' => 'event_delete',],
            ['name' => 'event_access',],

            ['name' => 'faculty_create',],
            ['name' => 'faculty_edit',],
            ['name' => 'faculty_show',],
            ['name' => 'faculty_delete',],
            ['name' => 'faculty_access',],

            ['name' => 'gallery_create',],
            ['name' => 'gallery_edit',],
            ['name' => 'gallery_show',],
            ['name' => 'gallery_delete',],
            ['name' => 'gallery_access',],

            ['name' => 'infrastructure_create',],
            ['name' => 'infrastructure_edit',],
            ['name' => 'infrastructure_show',],
            ['name' => 'infrastructure_delete',],
            ['name' => 'infrastructure_access',],

            ['name' => 'news_create',],
            ['name' => 'news_edit',],
            ['name' => 'news_show',],
            ['name' => 'news_delete',],
            ['name' => 'news_access',],

            ['name' => 'page_create',],
            ['name' => 'page_edit',],
            ['name' => 'page_show',],
            ['name' => 'page_delete',],
            ['name' => 'page_access',],

            ['name' => 'question_paper_create',],
            ['name' => 'question_paper_edit',],
            ['name' => 'question_paper_show',],
            ['name' => 'question_paper_delete',],
            ['name' => 'question_paper_access',],

            ['name' => 'student_club_create',],
            ['name' => 'student_club_edit',],
            ['name' => 'student_club_show',],
            ['name' => 'student_club_delete',],
            ['name' => 'student_club_access',],

            ['name' => 'student_corner_create',],
            ['name' => 'student_corner_edit',],
            ['name' => 'student_corner_show',],
            ['name' => 'student_corner_delete',],
            ['name' => 'student_corner_access',],

            ['name' => 'testimonial_create',],
            ['name' => 'testimonial_edit',],
            ['name' => 'testimonial_show',],
            ['name' => 'testimonial_delete',],
            ['name' => 'testimonial_access',],

            ['name' => 'user_create',],
            ['name' => 'user_edit',],
            ['name' => 'user_show',],
            ['name' => 'user_delete',],
            ['name' => 'user_access',],
        ];

        Permission::insert($permissions);
    }
}
