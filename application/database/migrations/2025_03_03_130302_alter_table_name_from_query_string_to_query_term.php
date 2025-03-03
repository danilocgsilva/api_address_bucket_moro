<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::rename('query_strings', 'query_term');
    }

    public function down(): void
    {
        Schema::rename('query_term', 'query_strings');
    }
};
