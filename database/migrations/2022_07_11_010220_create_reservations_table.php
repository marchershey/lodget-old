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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->integer('user_id')->nullable();
            $table->integer('property_id');
            $table->string('checkin');
            $table->string('checkout');
            $table->string('nights');
            $table->integer('guests');
            $table->string('status')->default('nopayment'); // nopayment, pending, cancelled, rejected, approved, active, completed
            $table->string('status_by')->nullable(); // who caused the status change
            $table->string('status_reason')->nullable(); // desc on why status was changed.
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
        Schema::dropIfExists('reservations');
    }
};
