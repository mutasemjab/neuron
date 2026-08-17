<?php

namespace Database\Seeders;

use App\Models\SubscriptionPlan;
use Illuminate\Database\Seeder;

class SubscriptionPlanSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            [
                'title_ar' => 'الباقة الفضية', 'title_en' => 'Silver Plan',
                'subtitle_ar' => 'متابعة أساسية لحالتك على مدار العام', 'subtitle_en' => 'Basic year-round follow-up for your condition',
                'price' => 15, 'price_suffix_ar' => 'دينار / شهرياً', 'price_suffix_en' => 'JOD / month',
                'features_ar' => "استشارة واحدة شهرياً\nخصم 10% على الفحوصات\nأولوية في حجز الموعد\nمتابعة عبر الهاتف",
                'features_en' => "One consultation per month\n10% discount on exams\nPriority appointment booking\nPhone follow-up",
                'badge_ar' => null, 'badge_en' => null,
                'button_text_ar' => 'اشترك الآن', 'button_text_en' => 'Subscribe Now',
                'is_featured' => false, 'order_index' => 1,
            ],
            [
                'title_ar' => 'الباقة الذهبية', 'title_en' => 'Gold Plan',
                'subtitle_ar' => 'الأكثر شمولاً لعناية طبية متكاملة', 'subtitle_en' => 'Our most comprehensive medical care plan',
                'price' => 30, 'price_suffix_ar' => 'دينار / شهرياً', 'price_suffix_en' => 'JOD / month',
                'features_ar' => "استشارتان شهرياً\nخصم 20% على الفحوصات والأشعة\nأولوية قصوى في الحجز\nخط طوارئ مباشر\nمتابعة عبر الهاتف والواتساب",
                'features_en' => "Two consultations per month\n20% discount on exams & imaging\nTop priority booking\nDirect emergency line\nPhone & WhatsApp follow-up",
                'badge_ar' => 'الأكثر طلباً', 'badge_en' => 'Most Popular',
                'button_text_ar' => 'اشترك الآن', 'button_text_en' => 'Subscribe Now',
                'is_featured' => true, 'order_index' => 2,
            ],
            [
                'title_ar' => 'الباقة البلاتينية', 'title_en' => 'Platinum Plan',
                'subtitle_ar' => 'رعاية VIP كاملة لك ولعائلتك', 'subtitle_en' => 'Full VIP care for you and your family',
                'price' => 55, 'price_suffix_ar' => 'دينار / شهرياً', 'price_suffix_en' => 'JOD / month',
                'features_ar' => "استشارات غير محدودة\nخصم 30% على الفحوصات والعمليات\nموعد خلال 24 ساعة\nخط طوارئ مباشر مع الطبيب المختص\nتغطية فردين من العائلة",
                'features_en' => "Unlimited consultations\n30% discount on exams & procedures\nAppointment within 24 hours\nDirect emergency line with the specialist\nCoverage for 2 family members",
                'badge_ar' => null, 'badge_en' => null,
                'button_text_ar' => 'اشترك الآن', 'button_text_en' => 'Subscribe Now',
                'is_featured' => false, 'order_index' => 3,
            ],
        ];

        foreach ($rows as $row) {
            SubscriptionPlan::updateOrCreate(['order_index' => $row['order_index']], $row + ['is_active' => true]);
        }
    }
}
