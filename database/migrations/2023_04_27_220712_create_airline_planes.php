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
        Schema::create('airline_planes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('airline_id');
            $table->string('airplane_type');
            $table->integer('economy_seats')->nullable();
            $table->integer('business_seats')->nullable();
            $table->integer('first_class_seats')->nullable();
            $table->integer('all_seats_capacity');
            $table->string('airplane_weight_in_kg');
            $table->foreign('airline_id')->references('id')->on('airline_companies');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('airline_planes');
    }
};
