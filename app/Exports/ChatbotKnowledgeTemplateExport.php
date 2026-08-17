<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;

class ChatbotKnowledgeTemplateExport implements FromArray
{
    public function array(): array
    {
        return [
            ['category', 'title_ar', 'title_en', 'content_ar', 'content_en', 'tags', 'order_index'],
            [
                'faq',
                'ما هي تخصصات عيادات نيورون؟',
                'What are Neuron Clinics specialties?',
                'تتخصص عيادات نيورون في جراحة الدماغ والعمود الفقري وعلاج الأعصاب.',
                'Neuron Clinics specializes in brain surgery, spine surgery, and neurology.',
                'تخصصات, جراحة دماغ, عمود فقري',
                '1',
            ],
            [
                'locations',
                'أين تقع عيادات نيورون؟',
                '',
                'توجد عيادات نيورون في عمان، الأردن.',
                '',
                'موقع, عنوان, عمان',
                '2',
            ],
        ];
    }
}
