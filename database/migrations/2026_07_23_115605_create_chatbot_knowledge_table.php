<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chatbot_knowledge', function (Blueprint $table) {
            $table->id();
            $table->string('category')->default('general');
            $table->string('title_ar');
            $table->string('title_en')->nullable();
            $table->text('content_ar');
            $table->text('content_en')->nullable();
            $table->string('tags')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedSmallInteger('order_index')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chatbot_knowledge');
    }
};
