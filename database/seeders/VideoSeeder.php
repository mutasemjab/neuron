<?php

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            [
                'title_ar' => 'تعرّف على عيادة نيورون في 3 دقائق', 'title_en' => 'Get to Know Neuron Clinic in 3 Minutes',
                'tag_ar' => 'جولة افتراضية', 'tag_en' => 'Virtual Tour',
                'is_main' => true, 'order_index' => 1,
            ],
            [
                'title_ar' => 'كيف تخلّص أحمد من ألم الديسك', 'title_en' => "How Ahmad Got Rid of His Disc Pain",
                'tag_ar' => 'قصة تعافٍ', 'tag_en' => 'Recovery Story',
                'is_main' => false, 'order_index' => 2,
            ],
            [
                'title_ar' => '5 عادات تحمي ظهرك يومياً', 'title_en' => '5 Daily Habits That Protect Your Back',
                'tag_ar' => 'نصيحة الطبيب', 'tag_en' => "Doctor's Advice",
                'is_main' => false, 'order_index' => 3,
            ],
        ];

        foreach ($rows as $row) {
            Video::updateOrCreate(['order_index' => $row['order_index']], $row + ['is_active' => true]);
        }
    }
}
