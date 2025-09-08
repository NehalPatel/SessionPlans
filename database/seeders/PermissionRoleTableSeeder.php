<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin_permissions = Permission::all();

        $agent_permissions = Permission::whereIn('name', [
            'contact_create',
            'contact_edit',
            'contact_show',
            'contact_delete',
            'contact_access',

            'document_create',
            'document_edit',
            'document_show',
            'document_delete',
            'document_access',

            'event_create',
            'event_edit',
            'event_show',
            'event_delete',
            'event_access',

            'faculty_create',
            'faculty_edit',
            'faculty_show',
            'faculty_delete',
            'faculty_access',

            'gallery_create',
            'gallery_edit',
            'gallery_show',
            'gallery_delete',
            'gallery_access',

            'infrastructure_create',
            'infrastructure_edit',
            'infrastructure_show',
            'infrastructure_delete',
            'infrastructure_access',

            'news_create',
            'news_edit',
            'news_show',
            'news_delete',
            'news_access',

            'page_show',
            'page_access',

            'question_paper_create',
            'question_paper_edit',
            'question_paper_show',
            'question_paper_delete',
            'question_paper_access',

            'student_club_create',
            'student_club_edit',
            'student_club_show',
            'student_club_delete',
            'student_club_access',

            'student_corner_create',
            'student_corner_edit',
            'student_corner_show',
            'student_corner_delete',
            'student_corner_access',

            'testimonial_create',
            'testimonial_edit',
            'testimonial_show',
            'testimonial_delete',
            'testimonial_access',
        ])->get();

        Role::findOrFail(1)->permissions()->sync($admin_permissions);
        Role::findOrFail(2)->permissions()->sync($agent_permissions);
    }
}
