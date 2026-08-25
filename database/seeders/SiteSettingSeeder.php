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

            // plans section
            ['plans_section.eyebrow', 'باقات الاشتراك', 'Subscription Plans', 'plans_section'],
            ['plans_section.heading_main', 'اختر الباقة', 'Choose the Plan', 'plans_section'],
            ['plans_section.heading_highlight', 'الأنسب لك', 'That Suits You', 'plans_section'],
            ['plans_section.paragraph', 'باقات متابعة وعناية طبية مرنة تمنحك أولوية في الحجز وخصومات على الفحوصات والاستشارات.', 'Flexible medical follow-up and care plans that give you booking priority and discounts on exams and consultations.', 'plans_section'],

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

            // booking page (general, no doctor selection)
            ['booking_page.eyebrow', 'احجز موعدك', 'Book Your Appointment', 'booking_page'],
            ['booking_page.heading', 'احجز موعد طبي مع الدكتور', 'Book a Medical Appointment', 'booking_page'],
            ['booking_page.subtext', 'املأ بياناتك وسيتواصل معك فريق المواعيد لتأكيد الحجز وتحديد الطبيب المناسب لحالتك.', 'Fill in your details and our appointments team will contact you to confirm the booking and assign the right doctor for your case.', 'booking_page'],
            ['booking_page.price', '20 دينار أردني', '20 JOD', 'booking_page'],
            ['booking_page.price_note', 'قابل للخصم من شركات التأمين المعتمدة', 'Deductible through approved insurance providers', 'booking_page'],
            ['booking_page.price_amount', '20.00', '20.00', 'booking_page'],

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

            // legal pages
            ['legal.privacy_title', 'سياسة الخصوصية', 'Privacy Policy', 'legal_pages'],
            ['legal.privacy_content',
                "## مقدمة\n"
                ."تحترم عيادات نيورون خصوصية زوارها ومرضاها، وتلتزم بحماية بياناتهم الشخصية والطبية. توضّح هذه السياسة كيف نجمع بياناتك ونستخدمها ونحميها عند استخدامك لموقعنا الإلكتروني أو خدماتنا، بما في ذلك حجز المواعيد وطلبات الاستشارة الأونلاين.\n"
                ."## البيانات التي نجمعها\n"
                ."بيانات التعريف الأساسية: الاسم، رقم الهاتف، البريد الإلكتروني، بلد الإقامة، تاريخ الميلاد.\n"
                ."البيانات الطبية التي تزوّدنا بها طواعية: وصف الحالة، التقارير والصور الطبية المرفقة.\n"
                ."تفاصيل الحجز أو طلب الاستشارة: الفرع، التاريخ والوقت المفضّل، طريقة الدفع.\n"
                ."## كيف نستخدم بياناتك\n"
                ."التواصل معك لتأكيد المواعيد أو تنسيق الاستشارات الأونلاين.\n"
                ."مراجعة المعلومات الطبية المرفقة من قبل الطاقم الطبي المختص لأغراض تقديم الاستشارة أو الرعاية الطبية.\n"
                ."تحسين خدماتنا وتجربة المستخدم على الموقع.\n"
                ."## حماية البيانات\n"
                ."نتّخذ إجراءات تقنية وتنظيمية معقولة لحماية بياناتك من الوصول أو الاستخدام أو الإفصاح غير المصرّح به. لا نشارك بياناتك الطبية أو الشخصية مع أي جهة خارجية إلا بالقدر اللازم لتقديم الخدمة الطبية المطلوبة أو عند وجود التزام قانوني بذلك.\n"
                ."## حقوقك\n"
                ."يحق لك الاستفسار عن البيانات التي نحتفظ بها بخصوصك، أو طلب تصحيحها أو حذفها، من خلال التواصل معنا عبر بيانات الاتصال المتوفرة على الموقع.\n"
                ."## التواصل معنا\n"
                ."لأي استفسار يتعلق بهذه السياسة أو بياناتك، يمكنك التواصل معنا عبر معلومات الاتصال الموضحة في صفحة \"تواصل معنا\" على الموقع.",
                "## Introduction\n"
                ."Neuron Clinics respects the privacy of our visitors and patients and is committed to protecting their personal and medical data. This policy explains how we collect, use, and protect your information when you use our website or services, including appointment booking and online consultation requests.\n"
                ."## Information We Collect\n"
                ."Basic identification details: name, phone number, email address, country of residence, date of birth.\n"
                ."Medical information you voluntarily provide: description of your condition, attached medical reports and imaging.\n"
                ."Booking or consultation details: branch, preferred date and time, payment method.\n"
                ."## How We Use Your Information\n"
                ."To contact you to confirm appointments or arrange online consultations.\n"
                ."To allow our medical staff to review attached medical information for the purpose of providing consultation or care.\n"
                ."To improve our services and website experience.\n"
                ."## Data Protection\n"
                ."We take reasonable technical and organizational measures to protect your data from unauthorized access, use, or disclosure. We do not share your personal or medical information with third parties except as necessary to provide the requested medical service or where required by law.\n"
                ."## Your Rights\n"
                ."You may request information about the data we hold about you, or request its correction or deletion, by contacting us through the contact details available on the website.\n"
                ."## Contact Us\n"
                ."For any questions regarding this policy or your data, please contact us via the contact information on our \"Contact Us\" page.",
                'legal_pages'],

            ['legal.terms_title', 'الشروط والأحكام', 'Terms & Conditions', 'legal_pages'],
            ['legal.terms_content',
                "## مقدمة\n"
                ."يُعتبر استخدامك لموقع عيادات نيورون الإلكتروني وخدماته موافقةً منك على الشروط والأحكام الموضحة أدناه. يرجى قراءتها بعناية قبل استخدام الموقع أو تقديم طلب حجز أو استشارة.\n"
                ."## استخدام الموقع\n"
                ."الموقع مخصص لتقديم معلومات عامة عن خدمات عيادات نيورون، وتمكين المرضى من حجز المواعيد وتقديم طلبات الاستشارة الأونلاين. يلتزم المستخدم بتقديم معلومات صحيحة ودقيقة عند تعبئة أي نموذج على الموقع.\n"
                ."## طبيعة طلبات الحجز والاستشارة\n"
                ."إرسال طلب حجز موعد أو طلب استشارة أونلاين عبر الموقع لا يعني تأكيد الموعد تلقائيًا. سيقوم فريق عيادات نيورون بالتواصل مع مقدّم الطلب لتأكيد الموعد أو الاستشارة واستكمال التفاصيل اللازمة.\n"
                ."## إخلاء المسؤولية الطبية\n"
                ."المحتوى المنشور على الموقع لأغراض تعريفية وتثقيفية عامة، ولا يُعتبر بديلاً عن الاستشارة الطبية المباشرة مع طبيب مختص. يجب على المريض دائمًا مراجعة الطبيب المعالج للحصول على تشخيص أو خطة علاج دقيقة لحالته.\n"
                ."## الملكية الفكرية\n"
                ."جميع المحتويات المنشورة على الموقع، بما في ذلك النصوص والشعارات والصور، هي ملك لعيادات نيورون ولا يجوز نسخها أو إعادة استخدامها دون إذن خطي مسبق.\n"
                ."## التعديلات على الشروط\n"
                ."تحتفظ عيادات نيورون بحقها في تعديل هذه الشروط والأحكام في أي وقت، ويُعتبر استمرار استخدامك للموقع بعد نشر أي تعديل موافقةً ضمنية على الشروط المعدّلة.\n"
                ."## التواصل معنا\n"
                ."لأي استفسار يتعلق بهذه الشروط، يمكنك التواصل معنا عبر معلومات الاتصال الموضحة في صفحة \"تواصل معنا\" على الموقع.",
                "## Introduction\n"
                ."By using the Neuron Clinics website and its services, you agree to the terms and conditions outlined below. Please read them carefully before using the website or submitting a booking or consultation request.\n"
                ."## Use of the Website\n"
                ."This website is intended to provide general information about Neuron Clinics' services and to enable patients to book appointments and submit online consultation requests. Users agree to provide accurate and truthful information when filling out any form on the website.\n"
                ."## Nature of Booking and Consultation Requests\n"
                ."Submitting an appointment booking or online consultation request through the website does not automatically confirm the appointment. The Neuron Clinics team will contact the requester to confirm the appointment or consultation and complete the necessary details.\n"
                ."## Medical Disclaimer\n"
                ."Content published on the website is for general informational and educational purposes only and is not a substitute for direct medical consultation with a qualified physician. Patients should always consult their treating physician for an accurate diagnosis or treatment plan.\n"
                ."## Intellectual Property\n"
                ."All content published on the website, including text, logos, and images, is the property of Neuron Clinics and may not be copied or reused without prior written permission.\n"
                ."## Changes to These Terms\n"
                ."Neuron Clinics reserves the right to modify these terms and conditions at any time. Continued use of the website after any changes are published constitutes acceptance of the revised terms.\n"
                ."## Contact Us\n"
                ."For any questions regarding these terms, please contact us via the contact information on our \"Contact Us\" page.",
                'legal_pages'],
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
