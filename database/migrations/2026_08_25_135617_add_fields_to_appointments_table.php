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
        Schema::table('appointments', function (Blueprint $table) {
            $table->string('email')->nullable()->after('phone');
            $table->string('phone_country_code', 6)->default('+962')->after('phone');
            $table->string('payment_method')->nullable()->after('preferred_time_slot'); // insurance | cash
            $table->boolean('visited_before')->nullable()->after('payment_method');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropColumn(['email', 'phone_country_code', 'payment_method', 'visited_before']);
        });
    }
};
