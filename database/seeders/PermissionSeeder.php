<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            // Administration
            'role-table', 'role-add', 'role-edit', 'role-delete',
            'employee-table', 'employee-add', 'employee-edit', 'employee-delete',

            // Clinic content
            'doctor-table', 'doctor-add', 'doctor-edit', 'doctor-delete',
            'service-table', 'service-add', 'service-edit', 'service-delete',
            'branch-table', 'branch-add', 'branch-edit', 'branch-delete',
            'faq-table', 'faq-add', 'faq-edit', 'faq-delete',
            'insurance-company-table', 'insurance-company-add', 'insurance-company-edit', 'insurance-company-delete',
            'video-table', 'video-add', 'video-edit', 'video-delete',
            'testimonial-table', 'testimonial-add', 'testimonial-edit', 'testimonial-delete',
            'career-job-table', 'career-job-add', 'career-job-edit', 'career-job-delete',
            'stat-table', 'stat-add', 'stat-edit', 'stat-delete',
            'article-table', 'article-add', 'article-edit', 'article-delete',
            'chatbot-table', 'chatbot-add', 'chatbot-edit', 'chatbot-delete',

            // Banners
            'banner-table', 'banner-add', 'banner-edit', 'banner-delete',

            // Subscriptions
            'subscription-plan-table', 'subscription-plan-add', 'subscription-plan-edit', 'subscription-plan-delete',
            'subscription-order-table', 'subscription-order-delete',

            // Forms / leads received from the website
            'appointment-table', 'appointment-status', 'appointment-delete',
            'job-application-table', 'job-application-status', 'job-application-delete',
            'contact-message-table', 'contact-message-reply', 'contact-message-delete',
            'consultation-table', 'consultation-status', 'consultation-delete',
            'closed-date-table', 'closed-date-add', 'closed-date-delete',

            // Settings
            'setting-edit',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'admin']);
        }
    }
}
