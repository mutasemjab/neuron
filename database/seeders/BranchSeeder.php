<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            [
                'name_ar' => 'فرع عمّان – الشميساني', 'name_en' => 'Amman – Shmeisani Branch',
                'badge_ar' => 'الفرع الرئيسي', 'badge_en' => 'Main Branch',
                'address_ar' => 'شارع عبد الحميد شرف، مجمّع نيورون الطبي، الشميساني، عمّان',
                'address_en' => 'Abdel Hamid Sharaf St, Neuron Medical Complex, Shmeisani, Amman',
                'working_hours_ar' => 'السبت – الخميس 9ص – 9م', 'working_hours_en' => 'Sat – Thu 9am – 9pm',
                'phone' => '06 500 0000', 'map_query' => 'Shmeisani Amman Jordan',
                'is_main' => true, 'order_index' => 1,
            ],
            [
                'name_ar' => 'فرع إربد', 'name_en' => 'Irbid Branch',
                'badge_ar' => 'مفتوح', 'badge_en' => 'Open',
                'address_ar' => 'شارع الجامعة، مقابل مستشفى الملك المؤسس، إربد',
                'address_en' => 'University St, opposite King Al-Mouasher Hospital, Irbid',
                'working_hours_ar' => 'السبت – الخميس 9ص – 8م', 'working_hours_en' => 'Sat – Thu 9am – 8pm',
                'phone' => '02 700 0000', 'map_query' => 'Irbid Jordan',
                'is_main' => false, 'order_index' => 2,
            ],
            [
                'name_ar' => 'فرع الزرقاء', 'name_en' => 'Zarqa Branch',
                'badge_ar' => 'مفتوح', 'badge_en' => 'Open',
                'address_ar' => 'شارع الملك عبدالله الثاني، مجمّع الحياة الطبي، الزرقاء',
                'address_en' => 'King Abdullah II St, Al-Hayat Medical Complex, Zarqa',
                'working_hours_ar' => 'السبت – الخميس 9ص – 8م', 'working_hours_en' => 'Sat – Thu 9am – 8pm',
                'phone' => '05 300 0000', 'map_query' => 'Zarqa Jordan',
                'is_main' => false, 'order_index' => 3,
            ],
            [
                'name_ar' => 'فرع العقبة', 'name_en' => 'Aqaba Branch',
                'badge_ar' => 'مفتوح', 'badge_en' => 'Open',
                'address_ar' => 'شارع الكورنيش، مجمّع البحر الطبي، العقبة',
                'address_en' => 'Corniche St, Al-Bahr Medical Complex, Aqaba',
                'working_hours_ar' => 'السبت – الخميس 10ص – 7م', 'working_hours_en' => 'Sat – Thu 10am – 7pm',
                'phone' => '03 200 0000', 'map_query' => 'Aqaba Jordan',
                'is_main' => false, 'order_index' => 4,
            ],
        ];

        foreach ($rows as $row) {
            Branch::updateOrCreate(['order_index' => $row['order_index']], $row + ['is_active' => true]);
        }
    }
}
