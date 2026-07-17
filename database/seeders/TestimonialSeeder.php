<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $spineSurgeon  = Doctor::where('order_index', 1)->first(); // د. سامر النعيمي
        $neuroSurgeon  = Doctor::where('order_index', 2)->first(); // د. رنا الخطيب
        $physioTherapy = Doctor::where('order_index', 4)->first(); // د. لينا القضاة

        $rows = [
            [
                'patient_name_ar' => 'محمود العزام', 'patient_name_en' => 'Mahmoud Al-Azzam',
                'role_text_ar' => 'مريض – فرع عمّان', 'role_text_en' => 'Patient – Amman Branch',
                'quote_ar' => 'عانيت من عرق النسا سنتين كاملتين قبل أن أزور نيورون. اليوم أمشي وأعمل دون ألم بفضل خطة علاج واضحة وفريق يفهم ما يفعل.',
                'quote_en' => 'I suffered from sciatica for two full years before visiting Neuron. Today I walk and work without pain thanks to a clear treatment plan and a team that knows what they are doing.',
                'doctor_id' => $neuroSurgeon?->id,
                'procedure_ar' => 'علاج عرق النسا بالحقن الموجّه', 'procedure_en' => 'Sciatica treatment with targeted injections',
                'rating' => 5, 'order_index' => 1,
            ],
            [
                'patient_name_ar' => 'سميرة حدّاد', 'patient_name_en' => 'Samira Haddad',
                'role_text_ar' => 'مريضة – فرع إربد', 'role_text_en' => 'Patient – Irbid Branch',
                'quote_ar' => 'أجريت عملية ديسك بالمنظار وخرجت من المستشفى في نفس اليوم تقريباً. لم أتخيّل أن التعافي يكون بهذه السرعة والاحترافية.',
                'quote_en' => 'I had endoscopic disc surgery and left the hospital almost the same day. I never imagined recovery could be this fast and professional.',
                'doctor_id' => $spineSurgeon?->id,
                'procedure_ar' => 'جراحة الديسك بالمنظار', 'procedure_en' => 'Endoscopic disc surgery',
                'rating' => 5, 'order_index' => 2,
            ],
            [
                'patient_name_ar' => 'خالد القيسي', 'patient_name_en' => 'Khaled Al-Qaisi',
                'role_text_ar' => 'مريض – فرع الزرقاء', 'role_text_en' => 'Patient – Zarqa Branch',
                'quote_ar' => 'ما أعجبني أن الطبيب لم يستعجل الجراحة، بدأنا بالعلاج التحفّظي وتحسّنت حالتي كثيراً. صدق ومهنية نادرة هذه الأيام.',
                'quote_en' => 'What impressed me was that the doctor did not rush to surgery. We started with conservative treatment and my condition improved a lot. Rare honesty and professionalism these days.',
                'doctor_id' => $physioTherapy?->id,
                'procedure_ar' => 'العلاج التحفّظي والتأهيل الحركي', 'procedure_en' => 'Conservative treatment and physical rehabilitation',
                'rating' => 5, 'order_index' => 3,
            ],
        ];

        foreach ($rows as $row) {
            Testimonial::updateOrCreate(['order_index' => $row['order_index']], $row + ['is_active' => true]);
        }
    }
}
