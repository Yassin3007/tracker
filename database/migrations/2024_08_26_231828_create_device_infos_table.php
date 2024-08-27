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
        Schema::create('device_infos', function (Blueprint $table) {
            $table->id();
            $table->string('ip')->nullable();
            $table->string('device')->nullable();
            $table->string('platform')->nullable();
            $table->string('platform_version')->nullable();
            $table->string('browser')->nullable();
            $table->string('browser_version')->nullable();
            $table->boolean('is_desktop')->default(false);
            $table->boolean('is_mobile')->default(false);
            $table->boolean('is_tablet')->default(false);
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->integer('count')->default(1); // Default count is 1
            $table->float('latitude', 10, 6)->nullable();
            $table->float('longitude', 10, 6)->nullable();
            $table->string('google_maps_url')->nullable(); // New column for Google Maps URL
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('device_infos');
    }
};
