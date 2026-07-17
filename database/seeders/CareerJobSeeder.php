<?php

namespace Database\Seeders;

use App\Models\CareerJob;
use Illuminate\Database\Seeder;

class CareerJobSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            [
                'title_ar' => 'استشاري جراحة عمود فقري', 'title_en' => 'Consultant Spine Surgeon',
                'type_ar' => 'دوام كامل', 'type_en' => 'Full-time',
                'description_ar' => 'خبرة لا تقل عن 8 سنوات في جراحات العمود الفقري والتداخل المحدود.',
                'description_en' => 'At least 8 years of experience in spine surgery and minimally-invasive procedures.',
                'location_ar' => 'عمّان', 'location_en' => 'Amman',
                'order_index' => 1,
            ],
            [
                'title_ar' => 'أخصائي علاج طبيعي', 'title_en' => 'Physical Therapy Specialist',
                'type_ar' => 'دوام كامل', 'type_en' => 'Full-time',
                'description_ar' => 'متخصص في تأهيل العمود الفقري وما بعد العمليات، بكالوريوس علاج طبيعي.',
                'description_en' => 'Specialized in spine rehabilitation and post-surgery recovery, bachelor\'s degree in physical therapy.',
                'location_ar' => 'إربد', 'location_en' => 'Irbid',
                'order_index' => 2,
            ],
            [
                'title_ar' => 'منسّق مواعيد وخدمة مرضى', 'title_en' => 'Appointments & Patient Care Coordinator',
                'type_ar' => 'دوام جزئي', 'type_en' => 'Part-time',
                'description_ar' => 'مهارات تواصل عالية وإجادة استخدام أنظمة الحجز الإلكترونية.',
                'description_en' => 'Strong communication skills and proficiency with online booking systems.',
                'location_ar' => 'الزرقاء', 'location_en' => 'Zarqa',
                'order_index' => 3,
            ],
        ];

        foreach ($rows as $row) {
            CareerJob::updateOrCreate(['order_index' => $row['order_index']], $row + ['is_active' => true]);
        }
    }
}
