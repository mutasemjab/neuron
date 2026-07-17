<?php

namespace Database\Seeders;

use App\Models\Stat;
use Illuminate\Database\Seeder;

class StatSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            ['section' => 'hero', 'number' => 18,    'suffix' => null, 'label_ar' => 'عاماً من الخبرة',        'label_en' => 'Years of Experience',            'order_index' => 1],
            ['section' => 'hero', 'number' => 12000, 'suffix' => '+',  'label_ar' => 'مريض تلقّى العلاج',       'label_en' => 'Patients Treated',               'order_index' => 2],
            ['section' => 'hero', 'number' => 9,      'suffix' => null, 'label_ar' => 'أطباء واستشاريون',       'label_en' => 'Doctors & Consultants',          'order_index' => 3],
            ['section' => 'hero', 'number' => 4,      'suffix' => null, 'label_ar' => 'فروع في المملكة',        'label_en' => 'Branches in the Kingdom',        'order_index' => 4],

            ['section' => 'main', 'number' => 18,    'suffix' => null, 'label_ar' => 'عاماً من الخبرة',        'label_en' => 'Years of Experience',            'order_index' => 1],
            ['section' => 'main', 'number' => 12000, 'suffix' => '+',  'label_ar' => 'مريض تلقّى العلاج',       'label_en' => 'Patients Treated',               'order_index' => 2],
            ['section' => 'main', 'number' => 96,     'suffix' => '%',  'label_ar' => 'نسبة رضا المرضى',        'label_en' => 'Patient Satisfaction Rate',      'order_index' => 3],
            ['section' => 'main', 'number' => 30,     'suffix' => '+',  'label_ar' => 'شركة تأمين معتمدة',      'label_en' => 'Approved Insurance Companies',   'order_index' => 4],
        ];

        foreach ($rows as $row) {
            Stat::updateOrCreate(
                ['section' => $row['section'], 'order_index' => $row['order_index']],
                $row + ['is_active' => true]
            );
        }
    }
}
