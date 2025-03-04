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
        Schema::table('query_string', function (Blueprint $table) {
            $table->foreign("query_term_query_string_id", "query_term_query_string_id_2")
                ->references("id")
                ->on("query_string_query_term");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('query_string', function (Blueprint $table) {
            $table->dropForeign("query_term_query_string_id");
        });
    }
};
