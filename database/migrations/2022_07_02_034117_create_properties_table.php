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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();

            // information
            $table->string('name');
            $table->string('street');
            $table->string('city');
            $table->string('state');
            $table->string('zip');

            // details
            $table->string('type');
            $table->string('guests');
            $table->string('beds');
            $table->string('bedrooms');
            $table->string('bathrooms');

            // rates
            $table->string('default_rate')->nullable();
            $table->string('default_tax')->nullable();

            // options
            $table->boolean('active')->default(false);
            $table->string('slug');

            /// -----

            // listing
            $table->string('headline')->nullable();
            $table->text('description')->nullable();

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
        Schema::dropIfExists('properties');
    }
};
