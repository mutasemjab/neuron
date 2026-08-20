<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('subscription_orders', function (Blueprint $table) {
            $table->text('checkout_token')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('subscription_orders', function (Blueprint $table) {
            $table->string('checkout_token')->nullable()->change();
        });
    }
};
