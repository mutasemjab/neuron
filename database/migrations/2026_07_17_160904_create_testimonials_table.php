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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name_ar');
            $table->string('patient_name_en');
            $table->string('role_text_ar')->nullable();
            $table->string('role_text_en')->nullable();
            $table->text('quote_ar');
            $table->text('quote_en');
            $table->unsignedTinyInteger('rating')->default(5);
            $table->string('avatar')->nullable();
            $table->integer('order_index')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('testimonials');
    }
};
