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
        Schema::rename('service_list', 'service_lists');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_lists', function (Blueprint $table) {
            //
        });
    }
};
