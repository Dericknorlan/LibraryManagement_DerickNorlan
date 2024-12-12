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
        Schema::create('cds', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('title'); // Title of the CD
            $table->string('artist'); // Artist or band name
            $table->string('genre'); // Genre of the CD
            $table->integer('stock')->default(0); // Number of CDs available in stock
            $table->timestamps(); // Timestamps for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cds');
    }
};
