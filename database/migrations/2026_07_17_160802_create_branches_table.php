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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('badge_ar')->nullable();
            $table->string('badge_en')->nullable();
            $table->text('address_ar');
            $table->text('address_en');
            $table->string('working_hours_ar')->nullable();
            $table->string('working_hours_en')->nullable();
            $table->string('phone')->nullable();
            $table->string('map_query')->nullable();
            $table->boolean('is_main')->default(false);
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
        Schema::dropIfExists('branches');
    }
};
