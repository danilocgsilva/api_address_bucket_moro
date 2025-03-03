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
        Schema::dropIfExists('terms_listing');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('terms_listing', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }
};
