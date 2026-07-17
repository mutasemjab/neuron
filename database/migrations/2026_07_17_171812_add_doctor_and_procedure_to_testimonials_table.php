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
        Schema::table('testimonials', function (Blueprint $table) {
            $table->foreignId('doctor_id')->nullable()->after('rating')->constrained('doctors')->nullOnDelete();
            $table->string('procedure_ar')->nullable()->after('doctor_id');
            $table->string('procedure_en')->nullable()->after('procedure_ar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('testimonials', function (Blueprint $table) {
            $table->dropConstrainedForeignId('doctor_id');
            $table->dropColumn(['procedure_ar', 'procedure_en']);
        });
    }
};
