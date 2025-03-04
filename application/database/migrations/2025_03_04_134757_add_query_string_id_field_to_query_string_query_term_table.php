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
        Schema::table('query_string_query_term', function (Blueprint $table) {
            $table->bigInteger('query_string_id')->unsigned();
            $table->foreign('query_string_id')
                ->references('id')
                ->on('query_string');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('query_string_query_term', function (Blueprint $table) {
            $table->dropForeign('query_string_id');
            $table->dropColumn('query_string_id');
        });
    }
};
