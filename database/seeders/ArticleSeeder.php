<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            [
                'slug' => 'when-is-back-pain-a-warning-sign',
                'title_ar' => 'متى يكون ألم الظهر إشارة تستدعي زيارة الطبيب؟',
                'title_en' => 'When Is Back Pain a Sign You Should See a Doctor?',
                'category_ar' => 'آلام الظهر', 'category_en' => 'Back Pain',
                'excerpt_ar' => 'ليست كل آلام الظهر متشابهة. تعرّف على العلامات التحذيرية التي لا يجب تجاهلها.',
                'excerpt_en' => 'Not all back pain is the same. Learn about the warning signs you should never ignore.',
                'body_ar' => "يُعتبر ألم الظهر من أكثر الشكاوى الطبية شيوعاً، وغالباً ما يتحسّن من تلقاء نفسه خلال أيام إلى أسابيع قليلة بالراحة النسبية والعلاج التحفّظي. لكن هناك علامات تحذيرية يجب ألا تُهمَل، مثل الألم الذي يمتد إلى الساق مصحوباً بخدر أو ضعف، أو فقدان السيطرة على المثانة أو الأمعاء، أو الألم المصحوب بحمى أو فقدان وزن غير مبرر.\n\nإذا استمر الألم أكثر من ستة أسابيع رغم العلاج المنزلي، أو ازداد سوءاً بشكل تدريجي، فمن الضروري مراجعة استشاري متخصص لتحديد السبب الجذري ووضع خطة علاجية مناسبة، تبدأ غالباً بالعلاج الطبيعي والأدوية قبل التفكير بأي تدخل جراحي.",
                'body_en' => "Back pain is one of the most common medical complaints, and it often improves on its own within days to a few weeks with relative rest and conservative treatment. However, there are warning signs that should never be ignored, such as pain radiating down the leg accompanied by numbness or weakness, loss of bladder or bowel control, or pain accompanied by fever or unexplained weight loss.\n\nIf pain persists for more than six weeks despite home treatment, or gradually worsens, it is essential to consult a specialist to determine the root cause and set an appropriate treatment plan — usually starting with physical therapy and medication before considering any surgical intervention.",
                'image' => null, 'read_minutes' => 5,
                'meta_title_ar' => 'متى يكون ألم الظهر خطيراً؟ | عيادة نيورون',
                'meta_title_en' => 'When Is Back Pain Serious? | Neuron Clinic',
                'meta_description_ar' => 'تعرّف على العلامات التحذيرية لألم الظهر التي تستدعي زيارة طبيب مختص في عيادة نيورون.',
                'meta_description_en' => 'Learn the warning signs of back pain that require seeing a specialist at Neuron Clinic.',
                'published_at' => '2026-06-15',
            ],
            [
                'slug' => 'endoscopic-disc-surgery-recovery',
                'title_ar' => 'جراحة المنظار للديسك: ما الذي تغيّر في التعافي؟',
                'title_en' => 'Endoscopic Disc Surgery: What Changed About Recovery?',
                'category_ar' => 'العمود الفقري', 'category_en' => 'Spine',
                'excerpt_ar' => 'كيف قلّصت تقنيات التداخل المحدود فترة التعافي من أسابيع إلى أيام.',
                'excerpt_en' => 'How minimally-invasive techniques shortened recovery time from weeks to days.',
                'body_ar' => "لطالما ارتبطت جراحة الديسك التقليدية بفترة تعافٍ طويلة وألم ما بعد العملية. مع تطور تقنيات المنظار والتداخل المحدود، أصبح بالإمكان إجراء العملية عبر فتحة صغيرة لا تتجاوز بضعة ملليمترات، ما يقلّل من تلف الأنسجة المحيطة ويسرّع التعافي بشكل ملحوظ.\n\nيتمكن معظم المرضى من المشي في نفس يوم العملية تقريباً، والعودة إلى نشاطهم اليومي المعتاد خلال أيام قليلة بدلاً من أسابيع. ورغم هذه المزايا، تبقى الجراحة خياراً أخيراً بعد استنفاد وسائل العلاج التحفّظي، ويحدد الطبيب المختص مدى ملاءمتها لكل حالة على حدة.",
                'body_en' => "Traditional disc surgery has long been associated with a lengthy recovery period and post-operative pain. With the advancement of endoscopic and minimally-invasive techniques, it is now possible to perform the procedure through an incision just a few millimeters wide, reducing damage to surrounding tissue and significantly speeding up recovery.\n\nMost patients are able to walk almost the same day as the surgery and return to their normal daily activity within a few days instead of weeks. Despite these advantages, surgery remains a last resort after conservative treatment options have been exhausted, and the specialist determines its suitability for each individual case.",
                'image' => null, 'read_minutes' => 7,
                'meta_title_ar' => 'جراحة المنظار للديسك والتعافي السريع | عيادة نيورون',
                'meta_title_en' => 'Endoscopic Disc Surgery & Fast Recovery | Neuron Clinic',
                'meta_description_ar' => 'كيف غيّرت تقنيات المنظار والتداخل المحدود مفهوم التعافي بعد جراحة الديسك.',
                'meta_description_en' => 'How endoscopic and minimally-invasive techniques changed recovery after disc surgery.',
                'published_at' => '2026-06-08',
            ],
            [
                'slug' => 'protect-your-neck-from-screen-time',
                'title_ar' => 'الجلوس الطويل أمام الشاشة: كيف تحمي رقبتك؟',
                'title_en' => 'Long Screen Time: How to Protect Your Neck',
                'category_ar' => 'نصائح طبية', 'category_en' => 'Medical Tips',
                'excerpt_ar' => 'تمارين وتعديلات بسيطة على بيئة العمل تقيك من آلام الرقبة المزمنة.',
                'excerpt_en' => 'Simple exercises and workspace adjustments to protect you from chronic neck pain.',
                'body_ar' => "أدّى ازدياد ساعات العمل أمام الشاشات إلى ارتفاع ملحوظ في حالات آلام الرقبة وتيبّسها، خاصة مع أوضاع الجلوس الخاطئة وانحناء الرأس المستمر للأمام. لحماية رقبتك، احرص على أن يكون أعلى الشاشة في مستوى نظرك، وخذ استراحة قصيرة كل 30-40 دقيقة لتمديد الرقبة والكتفين.\n\nتساعد تمارين بسيطة مثل إمالة الرأس ببطء يميناً ويساراً، وشدّ عضلات الكتف للخلف، على تخفيف التوتر المتراكم. وإذا استمر الألم أو ترافق مع صداع متكرر أو خدر في اليدين، فمن الأفضل استشارة أخصائي لتقييم الحالة ووضع برنامج علاجي مناسب.",
                'body_en' => "The increase in screen time has led to a noticeable rise in neck pain and stiffness, especially with poor sitting posture and constant forward head tilt. To protect your neck, make sure the top of your screen is at eye level, and take a short break every 30-40 minutes to stretch your neck and shoulders.\n\nSimple exercises such as slowly tilting the head side to side, and pulling the shoulder blades back, help relieve accumulated tension. If pain persists or is accompanied by recurring headaches or numbness in the hands, it is best to consult a specialist to evaluate the condition and set an appropriate treatment program.",
                'image' => null, 'read_minutes' => 4,
                'meta_title_ar' => 'كيف تحمي رقبتك من آلام الجلوس الطويل | عيادة نيورون',
                'meta_title_en' => 'How to Protect Your Neck from Long Sitting | Neuron Clinic',
                'meta_description_ar' => 'نصائح طبية وتمارين بسيطة لحماية رقبتك من آلام الجلوس الطويل أمام الشاشة.',
                'meta_description_en' => 'Medical tips and simple exercises to protect your neck from long screen time.',
                'published_at' => '2026-06-01',
            ],
        ];

        foreach ($rows as $row) {
            Article::updateOrCreate(['slug' => $row['slug']], $row + ['is_active' => true]);
        }
    }
}
