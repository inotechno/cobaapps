<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {




        Schema::create('service_lists', function (Blueprint $table) {
            $table->id()->nullable();
            $table->text('service_id')->nullable();
            $table->text('service_name');
            $table->text('service_endpoint_esb');
            $table->text('service_endpoint_msr');
            $table->text('service_desc');
            $table->text('service_postman');
            $table->foreignIdFor(User::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_lists');
    }
};
