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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone_country_code', 6)->default('+962');
            $table->string('phone');
            $table->string('country_of_residence');
            $table->date('date_of_birth');
            $table->json('preferred_days');
            $table->json('preferred_periods');
            $table->text('condition_description');
            $table->json('attachments')->nullable();
            $table->boolean('privacy_consent')->default(false);
            $table->string('status')->default('new'); // new | contacted | scheduled | closed
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
        Schema::dropIfExists('consultations');
    }
};
