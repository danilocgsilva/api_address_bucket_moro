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
        Schema::create('query_string_query_term', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("query_term_id")->unsigned();
            $table->timestamps();
            $table->foreign("query_term_id")
                ->references("id")
                ->on("query_term");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('query_string_query_term');
    }
};
