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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('specialization_ar');
            $table->string('specialization_en');
            $table->string('title_ar');
            $table->string('title_en');
            $table->text('bio_ar')->nullable();
            $table->text('bio_en')->nullable();
            $table->text('certifications_ar')->nullable();
            $table->text('certifications_en')->nullable();
            $table->string('tags_ar')->nullable();
            $table->string('tags_en')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('doctors');
    }
};
