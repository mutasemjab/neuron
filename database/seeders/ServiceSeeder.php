<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            [
                'title_ar' => 'علاج آلام الظهر', 'title_en' => 'Back Pain Treatment',
                'description_ar' => 'تشخيص دقيق لأسباب آلام أسفل الظهر ووضع خطة علاجية تحفّظية أو تداخلية حسب الحالة.',
                'description_en' => 'Accurate diagnosis of lower back pain causes and a conservative or interventional treatment plan based on your condition.',
                'is_featured' => true, 'order_index' => 1,
            ],
            [
                'title_ar' => 'علاج عرق النسا', 'title_en' => 'Sciatica Treatment',
                'description_ar' => 'معالجة الألم الممتد من أسفل الظهر إلى الساق الناتج عن ضغط العصب الوركي بأحدث الوسائل.',
                'description_en' => 'Treating pain radiating from the lower back to the leg caused by sciatic nerve compression, using the latest methods.',
                'is_featured' => true, 'order_index' => 2,
            ],
            [
                'title_ar' => 'علاج آلام الرقبة', 'title_en' => 'Neck Pain Treatment',
                'description_ar' => 'حلول للانزلاق الغضروفي العنقي وتيبّس الرقبة والصداع المرتبط بمشاكل الفقرات العنقية.',
                'description_en' => 'Solutions for cervical disc herniation, neck stiffness, and headaches related to cervical spine issues.',
                'is_featured' => true, 'order_index' => 3,
            ],
            [
                'title_ar' => 'المنظار والتداخل المحدود للديسك', 'title_en' => 'Endoscopy & Minimally-Invasive Disc Surgery',
                'description_ar' => 'عمليات دقيقة عبر فتحة صغيرة، بأقل ألم وأسرع عودة للحياة اليومية.',
                'description_en' => 'Precise procedures through a small incision, with minimal pain and a faster return to daily life.',
                'is_featured' => false, 'order_index' => 4,
            ],
            [
                'title_ar' => 'إصابات وكسور العمود الفقري', 'title_en' => 'Spinal Injuries & Fractures',
                'description_ar' => 'تثبيت الكسور وعلاج الإصابات الحادّة والناتجة عن الحوادث بدقة عالية.',
                'description_en' => 'Fracture stabilization and treatment of acute, accident-related injuries with high precision.',
                'is_featured' => false, 'order_index' => 5,
            ],
            [
                'title_ar' => 'تشوهات العمود الفقري (الجنف)', 'title_en' => 'Spinal Deformities (Scoliosis)',
                'description_ar' => 'تشخيص وتصحيح انحرافات العمود الفقري لدى الأطفال والبالغين.',
                'description_en' => 'Diagnosis and correction of spinal curvature in children and adults.',
                'is_featured' => false, 'order_index' => 6,
            ],
        ];

        foreach ($rows as $row) {
            Service::updateOrCreate(['order_index' => $row['order_index']], $row + ['is_active' => true]);
        }
    }
}
