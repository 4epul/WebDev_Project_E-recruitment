<?php
// FILE: database/migrations/2024_01_03_000003_create_companies_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('company_name');
            $table->string('company_email');
            $table->string('company_phone', 20);
            $table->string('company_website')->nullable();
            $table->text('company_address');
            $table->string('company_logo')->nullable();
            $table->text('company_description');
            $table->string('industry', 100);
            $table->string('company_size', 50);
            $table->boolean('is_verified')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
