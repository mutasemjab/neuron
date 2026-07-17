<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            [
                'question_ar' => 'هل كل حالات الديسك تحتاج إلى جراحة؟',
                'question_en' => 'Does every disc case need surgery?',
                'answer_ar' => 'لا. الغالبية العظمى من حالات الديسك تتحسّن بالعلاج التحفّظي مثل العلاج الطبيعي والأدوية والحقن الموجّه. نلجأ للجراحة فقط عند فشل هذه الوسائل أو وجود ضغط شديد على الأعصاب، ونبدأ دائماً بأقل تدخل ممكن.',
                'answer_en' => 'No. The vast majority of disc cases improve with conservative treatment such as physical therapy, medication, and targeted injections. We only resort to surgery when these methods fail or there is severe nerve compression, and we always start with the least invasive option possible.',
                'order_index' => 1,
            ],
            [
                'question_ar' => 'كم تستغرق فترة التعافي بعد عملية المنظار؟',
                'question_en' => 'How long is the recovery period after endoscopic surgery?',
                'answer_ar' => 'بفضل التداخل المحدود، يعود معظم المرضى إلى المشي في نفس اليوم، وإلى نشاطهم اليومي المعتاد خلال أيام قليلة. تختلف المدة حسب الحالة، ويحدّدها الطبيب في زيارة المتابعة.',
                'answer_en' => 'Thanks to minimally-invasive techniques, most patients return to walking the same day, and to their usual daily activity within a few days. The duration varies by case and is determined by the doctor during the follow-up visit.',
                'order_index' => 2,
            ],
            [
                'question_ar' => 'هل تقبلون التأمين الصحي؟',
                'question_en' => 'Do you accept health insurance?',
                'answer_ar' => 'نعم، نتعامل مع أكثر من 30 شركة تأمين محلية وعالمية مثل NatHealth والمتحدة وGIG وGlobeMed. ننصحك بالتواصل مع خدمة العملاء للتأكد من تغطية حالتك قبل الموعد.',
                'answer_en' => 'Yes, we work with more than 30 local and international insurance companies such as NatHealth, United, GIG, and GlobeMed. We recommend contacting customer service to confirm your coverage before your appointment.',
                'order_index' => 3,
            ],
            [
                'question_ar' => 'كيف أحجز موعداً في أقرب فرع؟',
                'question_en' => 'How do I book an appointment at the nearest branch?',
                'answer_ar' => 'يمكنك الحجز إلكترونياً عبر نموذج «احجز موعدك» في هذا الموقع باختيار الفرع والتاريخ والوقت المناسب، أو الاتصال بالخط الساخن. سيتواصل معك فريقنا لتأكيد الموعد.',
                'answer_en' => 'You can book online via the "Book Appointment" form on this site by selecting the branch, date, and preferred time, or by calling the hotline. Our team will contact you to confirm the appointment.',
                'order_index' => 4,
            ],
            [
                'question_ar' => 'هل يمكن علاج تشوهات العمود الفقري لدى الأطفال؟',
                'question_en' => 'Can spinal deformities in children be treated?',
                'answer_ar' => 'نعم، لدينا برنامج متخصص لتشخيص ومتابعة الجنف (انحراف العمود الفقري) عند الأطفال واليافعين، يشمل المراقبة والدعامات والتدخل الجراحي عند الضرورة، وفق خطة يضعها الاستشاري المختص.',
                'answer_en' => 'Yes, we have a specialized program for diagnosing and monitoring scoliosis (spinal curvature) in children and adolescents, including observation, bracing, and surgical intervention when necessary, according to a plan set by the specialist consultant.',
                'order_index' => 5,
            ],
        ];

        foreach ($rows as $row) {
            Faq::updateOrCreate(['order_index' => $row['order_index']], $row + ['is_active' => true]);
        }
    }
}
