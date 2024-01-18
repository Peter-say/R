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
        Schema::create('property_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
            $table->string('street_address');
            $table->string('state_county');
            $table->string('area');
            $table->string('city');
            $table->string('zip');
            $table->string('country');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_addresses');
    }
};
