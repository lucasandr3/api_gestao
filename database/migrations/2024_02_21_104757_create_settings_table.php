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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('config');
            $table->timestamps();
        });

        Schema::create('preferences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('settings_id');
            $table->string('resource');
            $table->string('value');
            $table->string('description');
            $table->timestamps();

            $table->foreign('settings_id')->references('id')->on('settings');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preferences');
        Schema::dropIfExists('settings');
    }
};
