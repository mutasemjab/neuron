<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            [
                'name_ar' => 'د. سامر النعيمي', 'name_en' => 'Dr. Samer Al-Naimi',
                'specialization_ar' => 'جراحة العمود الفقري', 'specialization_en' => 'Spine Surgery',
                'title_ar' => 'استشاري جراحة العمود الفقري والتداخل المحدود',
                'title_en' => 'Consultant Spine Surgeon & Minimally-Invasive Surgery',
                'bio_ar' => 'استشاري بخبرة تتجاوز 15 عاماً في جراحات العمود الفقري، متخصص في تقنيات المنظار والتداخل المحدود التي تقلّل الألم وتسرّع التعافي.',
                'bio_en' => 'A consultant with over 15 years of experience in spine surgery, specialized in endoscopic and minimally-invasive techniques that reduce pain and speed up recovery.',
                'certifications_ar' => "بورد أوروبي في جراحة العمود الفقري\nزمالة في التداخل المحدود – ألمانيا\nعضو الجمعية الدولية لجراحة العمود الفقري",
                'certifications_en' => "European Board in Spine Surgery\nFellowship in Minimally-Invasive Surgery – Germany\nMember of the International Society for Spine Surgery",
                'tags_ar' => 'الديسك، تثبيت الفقرات، المنظار، عرق النسا',
                'tags_en' => 'Disc Herniation, Spinal Fusion, Endoscopy, Sciatica',
                'order_index' => 1,
            ],
            [
                'name_ar' => 'د. رنا الخطيب', 'name_en' => 'Dr. Rana Al-Khatib',
                'specialization_ar' => 'جراحة الأعصاب', 'specialization_en' => 'Neurosurgery',
                'title_ar' => 'استشارية جراحة الدماغ والأعصاب والعمود الفقري',
                'title_en' => 'Consultant Brain, Nerve & Spine Surgeon',
                'bio_ar' => 'استشارية جراحة أعصاب بخبرة واسعة في علاج ضغط الأعصاب وأورام العمود الفقري، تجمع بين الدقة الجراحية والنهج التحفّظي.',
                'bio_en' => 'A neurosurgery consultant with extensive experience treating nerve compression and spinal tumors, combining surgical precision with a conservative approach.',
                'certifications_ar' => "بورد أردني وعربي في جراحة الأعصاب\nزمالة جراحة العمود الفقري – فرنسا\nأبحاث منشورة في ضغط الأعصاب",
                'certifications_en' => "Jordanian & Arab Board in Neurosurgery\nSpine Surgery Fellowship – France\nPublished research on nerve compression",
                'tags_ar' => 'ضغط الأعصاب، الانزلاق العنقي، أورام العمود الفقري',
                'tags_en' => 'Nerve Compression, Cervical Herniation, Spinal Tumors',
                'order_index' => 2,
            ],
            [
                'name_ar' => 'د. ماجد الشوبكي', 'name_en' => 'Dr. Majed Al-Shoubaki',
                'specialization_ar' => 'جراحة عظام', 'specialization_en' => 'Orthopedic Surgery',
                'title_ar' => 'استشاري جراحة العظام وإصابات العمود الفقري',
                'title_en' => 'Consultant Orthopedic & Spinal Trauma Surgeon',
                'bio_ar' => 'متخصص في علاج كسور وإصابات العمود الفقري الناتجة عن الحوادث، وتصحيح التشوهات مثل الجنف لدى مختلف الأعمار.',
                'bio_en' => 'Specialized in treating accident-related spinal fractures and injuries, and correcting deformities such as scoliosis across all age groups.',
                'certifications_ar' => "بورد بريطاني في جراحة العظام\nزمالة جراحة العمود الفقري – المملكة المتحدة\nخبرة 12 عاماً في إصابات الحوادث",
                'certifications_en' => "British Board in Orthopedic Surgery\nSpine Surgery Fellowship – United Kingdom\n12 years of experience in trauma injuries",
                'tags_ar' => 'الكسور، الجنف، التثبيت، إصابات الحوادث',
                'tags_en' => 'Fractures, Scoliosis, Fixation, Trauma Injuries',
                'order_index' => 3,
            ],
            [
                'name_ar' => 'د. لينا القضاة', 'name_en' => 'Dr. Lina Al-Qudah',
                'specialization_ar' => 'العلاج الطبيعي', 'specialization_en' => 'Physical Therapy',
                'title_ar' => 'أخصائية العلاج الطبيعي والتأهيل الحركي',
                'title_en' => 'Physical Therapy & Rehabilitation Specialist',
                'bio_ar' => 'تقود برامج التأهيل بعد العمليات والعلاج التحفّظي لآلام الظهر والرقبة، بخطط فردية تعيد المريض إلى نشاطه بأمان.',
                'bio_en' => 'Leads post-surgical rehabilitation programs and conservative treatment for back and neck pain, with individual plans that safely restore patients to their activity.',
                'certifications_ar' => "ماجستير علاج طبيعي – العمود الفقري\nشهادة في العلاج اليدوي (Manual Therapy)\nخبرة في تأهيل ما بعد الجراحة",
                'certifications_en' => "Master's in Physical Therapy – Spine\nCertificate in Manual Therapy\nExperience in post-surgical rehabilitation",
                'tags_ar' => 'التأهيل، العلاج اليدوي، تمارين الظهر، الوقاية',
                'tags_en' => 'Rehabilitation, Manual Therapy, Back Exercises, Prevention',
                'order_index' => 4,
            ],
        ];

        foreach ($rows as $row) {
            Doctor::updateOrCreate(['order_index' => $row['order_index']], $row + ['is_active' => true]);
        }
    }
}
