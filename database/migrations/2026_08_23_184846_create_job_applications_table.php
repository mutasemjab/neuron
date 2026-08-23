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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('career_job_id')->nullable()->constrained('career_jobs')->nullOnDelete();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('cv')->nullable();
            $table->text('message')->nullable();
            $table->string('status')->default('new'); // new | reviewed | contacted | rejected
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
        Schema::dropIfExists('job_applications');
    }
};
