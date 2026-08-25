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
        Schema::table('consultations', function (Blueprint $table) {
            $table->decimal('amount', 8, 2)->nullable()->after('status');
            $table->string('currency', 6)->default('JOD')->after('amount');
            $table->text('checkout_token')->nullable()->after('currency');
            $table->string('payment_status')->default('pending')->after('checkout_token'); // pending | completed | declined | failed
            $table->text('gateway_response')->nullable()->after('payment_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consultations', function (Blueprint $table) {
            $table->dropColumn(['amount', 'currency', 'checkout_token', 'payment_status', 'gateway_response']);
        });
    }
};
