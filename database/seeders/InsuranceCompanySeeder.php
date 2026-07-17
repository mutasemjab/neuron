<?php

namespace Database\Seeders;

use App\Models\InsuranceCompany;
use Illuminate\Database\Seeder;

class InsuranceCompanySeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            ['name_ar' => 'NatHealth', 'name_en' => 'NatHealth', 'subtitle_ar' => 'ناتهيلث', 'subtitle_en' => 'NatHealth Insurance'],
            ['name_ar' => 'المتحدة', 'name_en' => 'United Insurance', 'subtitle_ar' => 'United Insurance', 'subtitle_en' => 'United Insurance'],
            ['name_ar' => 'GIG', 'name_en' => 'GIG', 'subtitle_ar' => 'Gulf Insurance', 'subtitle_en' => 'Gulf Insurance'],
            ['name_ar' => 'GlobeMed', 'name_en' => 'GlobeMed', 'subtitle_ar' => 'غلوب ميد', 'subtitle_en' => 'GlobeMed'],
            ['name_ar' => 'MedNet', 'name_en' => 'MedNet', 'subtitle_ar' => 'ميدنت', 'subtitle_en' => 'MedNet'],
            ['name_ar' => 'Aetna', 'name_en' => 'Aetna', 'subtitle_ar' => 'إيتنا', 'subtitle_en' => 'Aetna'],
            ['name_ar' => 'Bupa', 'name_en' => 'Bupa', 'subtitle_ar' => 'بوبا', 'subtitle_en' => 'Bupa'],
            ['name_ar' => 'AXA', 'name_en' => 'AXA', 'subtitle_ar' => 'أكسا', 'subtitle_en' => 'AXA'],
            ['name_ar' => 'Allianz', 'name_en' => 'Allianz', 'subtitle_ar' => 'أليانز', 'subtitle_en' => 'Allianz'],
            ['name_ar' => 'NEXtCARE', 'name_en' => 'NEXtCARE', 'subtitle_ar' => 'نكست كير', 'subtitle_en' => 'NEXtCARE'],
            ['name_ar' => 'الأردنية', 'name_en' => 'Jordan Insurance', 'subtitle_ar' => 'Jordan Insurance', 'subtitle_en' => 'Jordan Insurance'],
            ['name_ar' => '+20', 'name_en' => '+20', 'subtitle_ar' => 'شركة أخرى', 'subtitle_en' => 'Other Companies'],
        ];

        foreach ($rows as $i => $row) {
            InsuranceCompany::updateOrCreate(
                ['order_index' => $i + 1],
                $row + ['is_active' => true]
            );
        }
    }
}
