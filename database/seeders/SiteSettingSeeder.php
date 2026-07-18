<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            // identity
            ['identity.site_name', 'نيورون', 'Neuron', 'identity'],
            ['identity.brand_tag', 'NEURON CLINIC', 'NEURON CLINIC', 'identity'],

            // contact
            ['contact.phone', '06 500 0000', '06 500 0000', 'contact'],
            ['contact.hotline_note', 'الخط الساخن للمواعيد', 'Appointments Hotline', 'contact'],
            ['contact.email', 'info@neuronclinic.jo', 'info@neuronclinic.jo', 'contact'],
            ['contact.whatsapp_number', '96279000000', '96279000000', 'contact'],
            ['contact.address_short', 'الشميساني، عمّان', 'Shmeisani, Amman', 'contact'],
            ['contact.working_hours', 'السبت – الخميس: 9ص – 9م', 'Sat – Thu: 9am – 9pm', 'contact'],
            ['contact.branches_count', '4', '4', 'contact'],

            // social
            ['social.facebook_url', 'https://facebook.com/neuronclinic', 'https://facebook.com/neuronclinic', 'social'],
            ['social.instagram_url', 'https://instagram.com/neuronclinic', 'https://instagram.com/neuronclinic', 'social'],
            ['social.youtube_url', 'https://youtube.com/@neuronclinic', 'https://youtube.com/@neuronclinic', 'social'],
            ['social.tiktok_url', '', '', 'social'],
            ['social.x_url', '', '', 'social'],

            // hero
            ['hero.eyebrow', 'مركز متخصص بالعمود الفقري والأعصاب', 'Specialized Spine & Nerve Center', 'hero'],
            ['hero.heading_line1', 'نُعيد لك الحركة،', 'We restore your movement,', 'hero'],
            ['hero.heading_line2', 'ونمنحك حياةً', 'and give you a life', 'hero'],
            ['hero.heading_line3', 'بلا ألم', 'without pain', 'hero'],
            ['hero.lead', 'في عيادة نيورون نجمع بين الخبرة الطبية العالية وأحدث تقنيات التداخل المحدود والمنظار لعلاج آلام العمود الفقري والديسك وعرق النسا — بأمان ودقة وبأقصر فترة تعافٍ ممكنة.', 'At Neuron Clinic, we combine high medical expertise with the latest minimally-invasive and endoscopic techniques to treat spine pain, disc problems, and sciatica — safely, precisely, and with the shortest possible recovery time.', 'hero'],

            // about
            ['about.eyebrow', 'من نحن', 'About Us', 'about'],
            ['about.heading_main', 'مركزٌ وُلد ليجعل الحياة', 'A Center Born to Make Life', 'about'],
            ['about.heading_highlight', 'أخف ألماً', 'Lighter on Pain', 'about'],
            ['about.paragraph', 'تأسّست عيادة نيورون على قناعة بسيطة: أن ألم الظهر والرقبة لا يجب أن يسرق من الإنسان قدرته على الحركة والعمل والحياة. نجمع فريقاً من الاستشاريين المتخصصين في جراحة وأعصاب العمود الفقري، ونعتمد نهجاً يبدأ دائماً بأقل تدخل ممكن.', 'Neuron Clinic was founded on a simple belief: back and neck pain should never rob a person of their ability to move, work, and live. We bring together a team of consultants specialized in spine and nerve surgery, and we always start with the least invasive approach possible.', 'about'],
            ['about.vision_title', 'رؤيتنا', 'Our Vision', 'about'],
            ['about.vision_text', 'أن نكون المرجع الأول في المملكة لعلاج أمراض العمود الفقري بأقل تدخل وأعلى معايير الأمان.', 'To be the leading reference in the Kingdom for treating spine conditions with minimal intervention and the highest safety standards.', 'about'],
            ['about.mission_title', 'رسالتنا', 'Our Mission', 'about'],
            ['about.mission_text', 'تقديم رعاية إنسانية مبنية على الدليل العلمي، وخطة علاجية واضحة لكل مريض من أول زيارة حتى التعافي الكامل.', 'Providing humane, evidence-based care with a clear treatment plan for every patient from the first visit through full recovery.', 'about'],
            ['about.badge_number', '18', '18', 'about'],
            ['about.badge_text', 'عاماً في خدمة مرضى العمود الفقري', 'Years serving spine patients', 'about'],

            // stats section
            ['stats_section.eyebrow', 'أرقامٌ تصنع الثقة', 'Numbers That Build Trust', 'stats_section'],

            // services section
            ['services_section.eyebrow', 'خدماتنا العلاجية', 'Our Treatment Services', 'services_section'],
            ['services_section.heading_main', 'عناية متخصصة لكل ما يتعلّق', 'Specialized Care for Everything Related', 'services_section'],
            ['services_section.heading_highlight', 'بالعمود الفقري', 'to the Spine', 'services_section'],
            ['services_section.paragraph', 'نقدّم منظومة علاجية متكاملة تبدأ من التشخيص الدقيق وتنتهي بالتأهيل، باستخدام تقنيات حديثة تحدّ من التدخل الجراحي وتسرّع التعافي.', 'We offer a complete treatment system that starts with accurate diagnosis and ends with rehabilitation, using modern techniques that minimize surgical intervention and speed up recovery.', 'services_section'],

            // svc list section
            ['svc_list_section.eyebrow', 'التخصصات الدقيقة', 'Sub-specialties', 'svc_list_section'],
            ['svc_list_section.heading', 'ماذا نعالج في نيورون؟', 'What We Treat at Neuron', 'svc_list_section'],
            ['svc_list_section.paragraph', 'قائمة بأبرز الحالات التي نتعامل معها يومياً بخبرة عالية وتقنيات متطورة.', 'A list of the most common conditions we treat daily with high expertise and advanced technology.', 'svc_list_section'],

            // team section
            ['team_section.eyebrow', 'الكادر الطبي', 'Medical Team', 'team_section'],
            ['team_section.heading_main', 'نخبة من', 'An Elite Group of', 'team_section'],
            ['team_section.heading_highlight', 'استشاريّي العمود الفقري والأعصاب', 'Spine & Nerve Consultants', 'team_section'],
            ['team_section.paragraph', 'فريق يجمع بين الخبرة الأكاديمية والممارسة العملية الطويلة، ليضع بين يديك تشخيصاً تثق به وخطة علاج تناسبك.', 'A team combining academic expertise with long practical experience, giving you a diagnosis you can trust and a treatment plan that suits you.', 'team_section'],

            // insurance section
            ['insurance_section.eyebrow', 'شركات التأمين', 'Insurance Companies', 'insurance_section'],
            ['insurance_section.heading_main', 'تأميناتٌ معتمدة', 'Approved Insurance', 'insurance_section'],
            ['insurance_section.heading_highlight', 'لراحتك', 'For Your Convenience', 'insurance_section'],
            ['insurance_section.paragraph', 'نتعامل مع شبكة واسعة من شركات التأمين لتسهيل تلقّي العلاج دون عناء.', 'We work with a wide network of insurance companies to make receiving treatment effortless.', 'insurance_section'],

            // videos section
            ['videos_section.eyebrow', 'مكتبة الفيديو', 'Video Library', 'videos_section'],
            ['videos_section.heading_main', 'شاهد قصص التعافي', 'Watch Recovery Stories', 'videos_section'],
            ['videos_section.heading_highlight', 'من الداخل', 'From the Inside', 'videos_section'],
            ['videos_section.paragraph', 'مقاطع توعوية وتجارب مرضى وجولات داخل عياداتنا وغرف العمليات.', 'Educational clips, patient experiences, and tours inside our clinics and operating rooms.', 'videos_section'],

            // locations section
            ['locations_section.eyebrow', 'فروعنا', 'Our Branches', 'locations_section'],
            ['locations_section.heading_main', 'أينما كنت في المملكة،', 'Wherever You Are in the Kingdom,', 'locations_section'],
            ['locations_section.heading_highlight', 'نحن قريبون منك', 'We Are Close to You', 'locations_section'],
            ['locations_section.paragraph', 'أربعة فروع مجهّزة بأحدث الأجهزة وكوادر متخصصة، لتصلك الرعاية أينما كنت.', 'Four branches equipped with the latest devices and specialized staff, so care reaches you wherever you are.', 'locations_section'],

            // testimonials section
            ['testimonials_section.eyebrow', 'آراء المرضى', 'Patient Reviews', 'testimonials_section'],
            ['testimonials_section.heading', 'قصصٌ عادت فيها الحياة إلى طبيعتها', 'Stories Where Life Returned to Normal', 'testimonials_section'],

            // articles section
            ['articles_section.eyebrow', 'المدوّنة الطبية', 'Medical Blog', 'articles_section'],
            ['articles_section.heading_main', 'معرفةٌ تحمي', 'Knowledge That Protects', 'articles_section'],
            ['articles_section.heading_highlight', 'ظهرك', 'Your Back', 'articles_section'],

            // faq section
            ['faq_section.eyebrow', 'الأسئلة الشائعة', 'Frequently Asked Questions', 'faq_section'],
            ['faq_section.heading', 'إجاباتٌ لأكثر ما يشغل بالك', 'Answers to What\'s on Your Mind', 'faq_section'],
            ['faq_section.side_title', 'لم تجد إجابتك؟', 'Didn\'t Find Your Answer?', 'faq_section'],
            ['faq_section.side_text', 'فريقنا جاهز للردّ على استفساراتك ومساعدتك في تحديد الموعد المناسب.', 'Our team is ready to answer your questions and help you set the right appointment.', 'faq_section'],

            // booking section
            ['booking_section.eyebrow', 'احجز موعدك', 'Book Your Appointment', 'booking_section'],
            ['booking_section.heading', 'خطوةٌ واحدة تفصلك عن حياة بلا ألم', 'One Step Away From a Pain-Free Life', 'booking_section'],
            ['booking_section.paragraph', 'املأ النموذج وسيتواصل معك فريق المواعيد لتأكيد الحجز واختيار الطبيب المناسب لحالتك.', 'Fill out the form and our appointments team will contact you to confirm the booking and choose the right doctor for your case.', 'booking_section'],
            ['booking_section.feat1_title', 'تأكيد سريع', 'Quick Confirmation', 'booking_section'],
            ['booking_section.feat1_text', 'نتواصل معك خلال ساعات العمل لتثبيت الموعد.', 'We contact you within working hours to confirm the appointment.', 'booking_section'],
            ['booking_section.feat2_title', 'اختيار الطبيب', 'Choose Your Doctor', 'booking_section'],
            ['booking_section.feat2_text', 'يمكنك تحديد الاستشاري أو ترك الأمر لفريقنا.', 'You can select the consultant or leave it to our team.', 'booking_section'],
            ['booking_section.feat3_title', 'دفع مرن', 'Flexible Payment', 'booking_section'],
            ['booking_section.feat3_text', 'دفع إلكتروني مسبق أو عند الوصول للعيادة.', 'Pay online in advance or upon arrival at the clinic.', 'booking_section'],

            // careers section
            ['careers_section.eyebrow', 'انضم إلينا', 'Join Us', 'careers_section'],
            ['careers_section.heading_main', 'ابنِ مستقبلك المهني', 'Build Your Career', 'careers_section'],
            ['careers_section.heading_highlight', 'مع نيورون', 'With Neuron', 'careers_section'],

            // cta band
            ['cta_band.heading', 'لا تدع الألم يؤجّل حياتك أكثر', 'Don\'t Let Pain Delay Your Life Any Longer', 'cta_band'],
            ['cta_band.paragraph', 'ابدأ رحلة التعافي اليوم مع فريقٍ يضع راحتك وسلامتك أولاً.', 'Start your recovery journey today with a team that puts your comfort and safety first.', 'cta_band'],

            // seo
            ['seo.default_title', 'عيادة نيورون | مركز متخصص لعلاج العمود الفقري والأعصاب', 'Neuron Clinic | Specialized Spine & Nerve Treatment Center', 'seo'],
            ['seo.default_description', 'عيادة نيورون - مركز طبي متخصص في تشخيص وعلاج أمراض العمود الفقري والأعصاب بأحدث تقنيات المنظار والتداخل المحدود في الأردن.', 'Neuron Clinic - a specialized medical center for diagnosing and treating spine and nerve conditions using the latest endoscopic and minimally-invasive techniques in Jordan.', 'seo'],
            ['seo.default_keywords', 'عيادة نيورون, علاج العمود الفقري, جراحة الأعصاب, عرق النسا, ديسك, منظار العمود الفقري, الأردن', 'Neuron Clinic, spine treatment, neurosurgery, sciatica, disc herniation, spine endoscopy, Jordan', 'seo'],

            // footer
            ['footer.about_text', 'مركز متخصص في تشخيص وعلاج أمراض العمود الفقري والأعصاب في المملكة الأردنية الهاشمية، بأحدث التقنيات وأعلى معايير الرعاية.', 'A specialized center for diagnosing and treating spine and nerve conditions in the Hashemite Kingdom of Jordan, using the latest technology and the highest standards of care.', 'footer'],
            ['footer.copyright_brand', 'عيادة نيورون', 'Neuron Clinic', 'footer'],
            ['footer.rights_text', 'جميع الحقوق محفوظة', 'All rights reserved', 'footer'],
        ];

        foreach ($rows as [$key, $ar, $en, $group]) {
            SiteSetting::updateOrCreate(['key' => $key], [
                'value_ar' => $ar,
                'value_en' => $en,
                'group'    => $group,
            ]);
        }
    }
}
