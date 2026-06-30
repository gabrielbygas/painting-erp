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
        Schema::create('cash_transactions', function (Blueprint $table) {

            $table->uuid('id')->primary();

            $table->foreignUuid('financial_account_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignUuid('payment_method_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->decimal('amount', 18, 2);

            $table->enum('type', [
                'IN',
                'OUT'
            ]);

            $table->date('transaction_date');

            $table->string('reference')->nullable();

            $table->text('remarks')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cash_transactions');
    }
};