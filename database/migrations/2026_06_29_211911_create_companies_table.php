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
        Schema::create('companies', function (Blueprint $table) {

            $table->uuid('id')->primary();

            $table->string('code', 30)->unique();

            $table->string('legal_name');

            $table->string('trade_name')->nullable();

            $table->string('tax_number')->nullable();

            $table->string('registration_number')->nullable();

            $table->string('email')->nullable();

            $table->string('phone', 30)->nullable();

            $table->string('website')->nullable();

            $table->string('logo_path')->nullable();

            $table->foreignUuid('country_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignUuid('currency_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignUuid('language_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};