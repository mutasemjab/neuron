<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    /**
     * Definition of every manageable setting, grouped into admin-form tabs.
     * type: text | textarea | image
     * translatable: whether it has separate ar/en values, or a single raw value.
     */
    public static function fields(): array
    {
        return [
            'identity' => [
                'label'  => 'الهوية',
                'fields' => [
                    'identity.site_name' => ['label' => 'اسم الموقع', 'type' => 'text', 'translatable' => true],
                    'identity.brand_tag' => ['label' => 'شعار العلامة (تحت الاسم)', 'type' => 'text', 'translatable' => true],
                ],
            ],
            'contact' => [
                'label'  => 'التواصل',
                'fields' => [
                    'contact.phone'          => ['label' => 'رقم الهاتف', 'type' => 'text', 'translatable' => false],
                    'contact.hotline_note'   => ['label' => 'وصف الخط الساخن', 'type' => 'text', 'translatable' => true],
                    'contact.email'          => ['label' => 'البريد الإلكتروني', 'type' => 'text', 'translatable' => false],
                    'contact.whatsapp_number'=> ['label' => 'رقم واتساب (بدون +)', 'type' => 'text', 'translatable' => false],
                    'contact.address_short'  => ['label' => 'العنوان المختصر', 'type' => 'text', 'translatable' => true],
                    'contact.working_hours'  => ['label' => 'ساعات العمل', 'type' => 'text', 'translatable' => true],
                    'contact.branches_count' => ['label' => 'عدد الفروع', 'type' => 'text', 'translatable' => false],
                ],
            ],
            'social' => [
                'label'  => 'التواصل الاجتماعي',
                'fields' => [
                    'social.facebook_url'  => ['label' => 'فيسبوك', 'type' => 'text', 'translatable' => false],
                    'social.instagram_url' => ['label' => 'إنستغرام', 'type' => 'text', 'translatable' => false],
                    'social.youtube_url'   => ['label' => 'يوتيوب', 'type' => 'text', 'translatable' => false],
                    'social.tiktok_url'    => ['label' => 'تيك توك', 'type' => 'text', 'translatable' => false],
                    'social.x_url'         => ['label' => 'X (تويتر)', 'type' => 'text', 'translatable' => false],
                ],
            ],
            'hero' => [
                'label'  => 'الواجهة الرئيسية (Hero)',
                'fields' => [
                    'hero.eyebrow'       => ['label' => 'العنوان الفرعي الصغير', 'type' => 'text', 'translatable' => true],
                    'hero.heading_line1' => ['label' => 'العنوان - سطر 1', 'type' => 'text', 'translatable' => true],
                    'hero.heading_line2' => ['label' => 'العنوان - سطر 2', 'type' => 'text', 'translatable' => true],
                    'hero.heading_line3' => ['label' => 'العنوان - سطر 3', 'type' => 'text', 'translatable' => true],
                    'hero.lead'          => ['label' => 'الوصف', 'type' => 'textarea', 'translatable' => true],
                    'hero.bg_image'      => ['label' => 'صورة الخلفية', 'type' => 'image', 'translatable' => false],
                ],
            ],
            'about' => [
                'label'  => 'من نحن',
                'fields' => [
                    'about.eyebrow'          => ['label' => 'العنوان الفرعي الصغير', 'type' => 'text', 'translatable' => true],
                    'about.heading_main'     => ['label' => 'العنوان الرئيسي', 'type' => 'text', 'translatable' => true],
                    'about.heading_highlight'=> ['label' => 'الجزء المميز من العنوان', 'type' => 'text', 'translatable' => true],
                    'about.paragraph'        => ['label' => 'الفقرة', 'type' => 'textarea', 'translatable' => true],
                    'about.vision_title'     => ['label' => 'عنوان الرؤية', 'type' => 'text', 'translatable' => true],
                    'about.vision_text'      => ['label' => 'نص الرؤية', 'type' => 'textarea', 'translatable' => true],
                    'about.mission_title'    => ['label' => 'عنوان الرسالة', 'type' => 'text', 'translatable' => true],
                    'about.mission_text'     => ['label' => 'نص الرسالة', 'type' => 'textarea', 'translatable' => true],
                    'about.badge_number'     => ['label' => 'رقم الشارة', 'type' => 'text', 'translatable' => false],
                    'about.badge_text'       => ['label' => 'نص الشارة', 'type' => 'text', 'translatable' => true],
                    'about.image_main'       => ['label' => 'الصورة الرئيسية', 'type' => 'image', 'translatable' => false],
                    'about.image_sub'        => ['label' => 'الصورة الفرعية', 'type' => 'image', 'translatable' => false],
                ],
            ],
            'services_section' => [
                'label'  => 'عنوان قسم الخدمات',
                'fields' => [
                    'services_section.eyebrow'         => ['label' => 'العنوان الفرعي الصغير', 'type' => 'text', 'translatable' => true],
                    'services_section.heading_main'     => ['label' => 'العنوان الرئيسي', 'type' => 'text', 'translatable' => true],
                    'services_section.heading_highlight'=> ['label' => 'الجزء المميز من العنوان', 'type' => 'text', 'translatable' => true],
                    'services_section.paragraph'        => ['label' => 'الفقرة', 'type' => 'textarea', 'translatable' => true],
                ],
            ],
            'svc_list_section' => [
                'label'  => 'عنوان قائمة التخصصات',
                'fields' => [
                    'svc_list_section.eyebrow'   => ['label' => 'العنوان الفرعي الصغير', 'type' => 'text', 'translatable' => true],
                    'svc_list_section.heading'   => ['label' => 'العنوان', 'type' => 'text', 'translatable' => true],
                    'svc_list_section.paragraph' => ['label' => 'الفقرة', 'type' => 'textarea', 'translatable' => true],
                ],
            ],
            'team_section' => [
                'label'  => 'عنوان قسم الكادر الطبي',
                'fields' => [
                    'team_section.eyebrow'         => ['label' => 'العنوان الفرعي الصغير', 'type' => 'text', 'translatable' => true],
                    'team_section.heading_main'     => ['label' => 'العنوان الرئيسي', 'type' => 'text', 'translatable' => true],
                    'team_section.heading_highlight'=> ['label' => 'الجزء المميز من العنوان', 'type' => 'text', 'translatable' => true],
                    'team_section.paragraph'        => ['label' => 'الفقرة', 'type' => 'textarea', 'translatable' => true],
                ],
            ],
            'insurance_section' => [
                'label'  => 'عنوان قسم التأمين',
                'fields' => [
                    'insurance_section.eyebrow'         => ['label' => 'العنوان الفرعي الصغير', 'type' => 'text', 'translatable' => true],
                    'insurance_section.heading_main'     => ['label' => 'العنوان الرئيسي', 'type' => 'text', 'translatable' => true],
                    'insurance_section.heading_highlight'=> ['label' => 'الجزء المميز من العنوان', 'type' => 'text', 'translatable' => true],
                    'insurance_section.paragraph'        => ['label' => 'الفقرة', 'type' => 'textarea', 'translatable' => true],
                ],
            ],
            'videos_section' => [
                'label'  => 'عنوان قسم الفيديوهات',
                'fields' => [
                    'videos_section.eyebrow'         => ['label' => 'العنوان الفرعي الصغير', 'type' => 'text', 'translatable' => true],
                    'videos_section.heading_main'     => ['label' => 'العنوان الرئيسي', 'type' => 'text', 'translatable' => true],
                    'videos_section.heading_highlight'=> ['label' => 'الجزء المميز من العنوان', 'type' => 'text', 'translatable' => true],
                    'videos_section.paragraph'        => ['label' => 'الفقرة', 'type' => 'textarea', 'translatable' => true],
                ],
            ],
            'locations_section' => [
                'label'  => 'عنوان قسم الفروع',
                'fields' => [
                    'locations_section.eyebrow'         => ['label' => 'العنوان الفرعي الصغير', 'type' => 'text', 'translatable' => true],
                    'locations_section.heading_main'     => ['label' => 'العنوان الرئيسي', 'type' => 'text', 'translatable' => true],
                    'locations_section.heading_highlight'=> ['label' => 'الجزء المميز من العنوان', 'type' => 'text', 'translatable' => true],
                    'locations_section.paragraph'        => ['label' => 'الفقرة', 'type' => 'textarea', 'translatable' => true],
                ],
            ],
            'testimonials_section' => [
                'label'  => 'عنوان قسم آراء المرضى',
                'fields' => [
                    'testimonials_section.eyebrow' => ['label' => 'العنوان الفرعي الصغير', 'type' => 'text', 'translatable' => true],
                    'testimonials_section.heading' => ['label' => 'العنوان', 'type' => 'text', 'translatable' => true],
                ],
            ],
            'articles_section' => [
                'label'  => 'عنوان قسم المدونة',
                'fields' => [
                    'articles_section.eyebrow'         => ['label' => 'العنوان الفرعي الصغير', 'type' => 'text', 'translatable' => true],
                    'articles_section.heading_main'     => ['label' => 'العنوان الرئيسي', 'type' => 'text', 'translatable' => true],
                    'articles_section.heading_highlight'=> ['label' => 'الجزء المميز من العنوان', 'type' => 'text', 'translatable' => true],
                ],
            ],
            'faq_section' => [
                'label'  => 'الأسئلة الشائعة',
                'fields' => [
                    'faq_section.eyebrow'    => ['label' => 'العنوان الفرعي الصغير', 'type' => 'text', 'translatable' => true],
                    'faq_section.heading'    => ['label' => 'العنوان', 'type' => 'text', 'translatable' => true],
                    'faq_section.side_title' => ['label' => 'عنوان الشريط الجانبي', 'type' => 'text', 'translatable' => true],
                    'faq_section.side_text'  => ['label' => 'نص الشريط الجانبي', 'type' => 'textarea', 'translatable' => true],
                ],
            ],
            'booking_section' => [
                'label'  => 'قسم الحجز',
                'fields' => [
                    'booking_section.eyebrow'     => ['label' => 'العنوان الفرعي الصغير', 'type' => 'text', 'translatable' => true],
                    'booking_section.heading'     => ['label' => 'العنوان', 'type' => 'text', 'translatable' => true],
                    'booking_section.paragraph'   => ['label' => 'الفقرة', 'type' => 'textarea', 'translatable' => true],
                    'booking_section.feat1_title' => ['label' => 'ميزة 1 - عنوان', 'type' => 'text', 'translatable' => true],
                    'booking_section.feat1_text'  => ['label' => 'ميزة 1 - نص', 'type' => 'text', 'translatable' => true],
                    'booking_section.feat2_title' => ['label' => 'ميزة 2 - عنوان', 'type' => 'text', 'translatable' => true],
                    'booking_section.feat2_text'  => ['label' => 'ميزة 2 - نص', 'type' => 'text', 'translatable' => true],
                    'booking_section.feat3_title' => ['label' => 'ميزة 3 - عنوان', 'type' => 'text', 'translatable' => true],
                    'booking_section.feat3_text'  => ['label' => 'ميزة 3 - نص', 'type' => 'text', 'translatable' => true],
                ],
            ],
            'careers_section' => [
                'label'  => 'عنوان قسم التوظيف',
                'fields' => [
                    'careers_section.eyebrow'         => ['label' => 'العنوان الفرعي الصغير', 'type' => 'text', 'translatable' => true],
                    'careers_section.heading_main'     => ['label' => 'العنوان الرئيسي', 'type' => 'text', 'translatable' => true],
                    'careers_section.heading_highlight'=> ['label' => 'الجزء المميز من العنوان', 'type' => 'text', 'translatable' => true],
                ],
            ],
            'cta_band' => [
                'label'  => 'شريط الدعوة لإجراء',
                'fields' => [
                    'cta_band.heading'   => ['label' => 'العنوان', 'type' => 'text', 'translatable' => true],
                    'cta_band.paragraph' => ['label' => 'الفقرة', 'type' => 'text', 'translatable' => true],
                ],
            ],
            'seo' => [
                'label'  => 'SEO',
                'fields' => [
                    'seo.default_title'       => ['label' => 'العنوان الافتراضي (Meta Title)', 'type' => 'text', 'translatable' => true],
                    'seo.default_description' => ['label' => 'الوصف الافتراضي (Meta Description)', 'type' => 'textarea', 'translatable' => true],
                    'seo.default_keywords'    => ['label' => 'الكلمات المفتاحية', 'type' => 'text', 'translatable' => true],
                    'seo.og_image'            => ['label' => 'صورة المشاركة (OG Image)', 'type' => 'image', 'translatable' => false],
                ],
            ],
            'footer' => [
                'label'  => 'الفوتر',
                'fields' => [
                    'footer.about_text'      => ['label' => 'نص عن العيادة', 'type' => 'textarea', 'translatable' => true],
                    'footer.copyright_brand' => ['label' => 'اسم العلامة في حقوق النشر', 'type' => 'text', 'translatable' => true],
                    'footer.rights_text'     => ['label' => 'نص جميع الحقوق محفوظة', 'type' => 'text', 'translatable' => true],
                ],
            ],
        ];
    }

    public function edit()
    {
        $groups = self::fields();
        $settings = SiteSetting::all()->keyBy('key');

        return view('admin.site_settings.edit', compact('groups', 'settings'));
    }

    public function update(Request $request)
    {
        foreach (self::fields() as $group) {
            foreach ($group['fields'] as $key => $def) {
                if ($def['type'] === 'image') {
                    if ($request->hasFile(str_replace('.', '_', $key))) {
                        $filename = uploadImage('assets/uploads/site', $request->file(str_replace('.', '_', $key)));
                        SiteSetting::set($key, $filename, $filename, explode('.', $key)[0]);
                    }
                    continue;
                }

                if ($def['translatable']) {
                    SiteSetting::set(
                        $key,
                        $request->input("settings.{$key}.ar"),
                        $request->input("settings.{$key}.en"),
                        explode('.', $key)[0]
                    );
                } else {
                    $raw = $request->input("settings.{$key}.raw");
                    SiteSetting::set($key, $raw, $raw, explode('.', $key)[0]);
                }
            }
        }

        return back()->with('success', 'تم تحديث إعدادات الموقع بنجاح.');
    }
}
