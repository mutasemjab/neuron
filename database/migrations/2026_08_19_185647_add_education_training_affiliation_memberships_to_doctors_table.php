<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->text('education_ar')->nullable()->after('certifications_en');
            $table->text('education_en')->nullable()->after('education_ar');
            $table->text('training_ar')->nullable()->after('education_en');
            $table->text('training_en')->nullable()->after('training_ar');
            $table->text('affiliation_ar')->nullable()->after('training_en');
            $table->text('affiliation_en')->nullable()->after('affiliation_ar');
            $table->text('memberships_ar')->nullable()->after('affiliation_en');
            $table->text('memberships_en')->nullable()->after('memberships_ar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->dropColumn([
                'education_ar', 'education_en',
                'training_ar', 'training_en',
                'affiliation_ar', 'affiliation_en',
                'memberships_ar', 'memberships_en',
            ]);
        });
    }
};
