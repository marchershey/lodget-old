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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('reservation_id');
            $table->string('user_id');
            $table->string('status')->default('hold');
            // hold (placed hold on)
            // captured (funds captured)
            // released (funds released from hold)
            // refunded (funds that have been captured have been refunded)
            $table->string('stripe_payment_id');
            $table->integer('base_rate');
            $table->integer('average_rate');
            $table->integer('tax_rate');
            $table->integer('total');

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
        Schema::dropIfExists('payments');
    }
};
