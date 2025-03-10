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
        Schema::create('query_strings', function (Blueprint $table) {
            $table->id();
            $table->string("term");
            $table->bigInteger("api_id")->unsigned();
            $table->timestamps();
            $table->foreign("api_id")
                ->references("id")
                ->on("apis");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('query_strings');
    }
};
