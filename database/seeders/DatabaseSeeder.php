<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            PermissionSeeder::class,
            SiteSettingSeeder::class,
            StatSeeder::class,
            ServiceSeeder::class,
            DoctorSeeder::class,
            BranchSeeder::class,
            FaqSeeder::class,
            InsuranceCompanySeeder::class,
            VideoSeeder::class,
            TestimonialSeeder::class,
            CareerJobSeeder::class,
            ArticleSeeder::class,
        ]);
    }
}
