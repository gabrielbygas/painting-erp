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
        Schema::create('suppliers', function (Blueprint $table) {

            $table->uuid('id')->primary();

            $table->string('code', 30)->unique();

            $table->string('company_name')->nullable();

            $table->string('trade_name')->nullable();

            $table->string('first_name')->nullable();

            $table->string('last_name')->nullable();

            $table->string('email')->nullable();

            $table->string('phone', 30)->nullable();

            $table->string('mobile', 30)->nullable();

            $table->string('website')->nullable();

            $table->string('tax_number')->nullable();

            $table->string('registration_number')->nullable();

            $table->foreignUuid('country_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->text('notes')->nullable();

            $table->decimal('credit_limit', 18, 2)->default(0);

            $table->integer('payment_term_days')->default(0);

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
        Schema::dropIfExists('suppliers');
    }
};