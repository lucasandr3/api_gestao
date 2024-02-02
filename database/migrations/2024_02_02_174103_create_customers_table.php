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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('token_company_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('document')->unique();
            $table->string('mobile')->unique();
            $table->string('phone')->unique();
            $table->boolean('active')->default(1);
            $table->timestamps();

            $table->foreign('token_company_id')->references('id')->on('token_companies');
        });

        Schema::create('customers_address', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->string('zipcode');
            $table->string('street');
            $table->string('city');
            $table->string('uf');
            $table->string('number');
            $table->string('complement')->nullable();
            $table->string('neighborhood');
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers_address');
        Schema::dropIfExists('customers');
    }
};
