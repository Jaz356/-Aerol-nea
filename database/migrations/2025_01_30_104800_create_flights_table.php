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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('flight_no');
            $table->date('date');
            $table->timestamp('departure_time');
            $table->timestamp('arrival_time');
            $table->string('departure');
            $table->string('arrival');
            $table->integer('booked_seats')->default(0);
            $table->foreignId('plane_id')->constrained('planes');
            $table->boolean('available')->default(true);
            $table->string('airline');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};