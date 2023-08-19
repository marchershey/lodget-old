<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();

            // Overview
            $table->string('name');
            $table->text('summary');
            $table->string('type');
            $table->integer('capacity');

            // Location
            $table->string('address_street');
            $table->string('address_city');
            $table->string('address_state');
            $table->string('address_zip');

            $table->integer('base_rate');
            $table->integer('minimum_nights');

            // Options
            $table->string('slug');

            // Backend data
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rental_models');
    }
};
