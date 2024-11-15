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
        Schema::create('newspapers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('publisher');
            $table->string('editor');
            $table->string('dateOfPublication');
            $table->string('ISSN');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('newspapers');
    }
};
