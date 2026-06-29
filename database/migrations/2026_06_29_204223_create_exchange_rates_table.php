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
        Schema::create('exchange_rates', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('source_currency_id')
                ->constrained('currencies')
                ->restrictOnDelete();

            $table->foreignUuid('target_currency_id')
                ->constrained('currencies')
                ->restrictOnDelete();

            $table->decimal('exchange_rate', 18, 8);

            $table->date('effective_date');

            $table->timestamps();

            $table->unique([
                'source_currency_id',
                'target_currency_id',
                'effective_date'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exchange_rates');
    }
};