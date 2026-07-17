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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title_ar');
            $table->string('title_en');
            $table->text('excerpt_ar');
            $table->text('excerpt_en');
            $table->longText('body_ar');
            $table->longText('body_en');
            $table->string('category_ar')->nullable();
            $table->string('category_en')->nullable();
            $table->string('image')->nullable();
            $table->unsignedInteger('read_minutes')->default(5);
            $table->string('meta_title_ar')->nullable();
            $table->string('meta_title_en')->nullable();
            $table->string('meta_description_ar')->nullable();
            $table->string('meta_description_en')->nullable();
            $table->timestamp('published_at')->nullable();
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
        Schema::dropIfExists('articles');
    }
};
