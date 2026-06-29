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
        Schema::create('supplier_payments', function (Blueprint $table) {

            $table->uuid('id')->primary();

            $table->foreignUuid('supplier_id')
                ->constrained()
                ->restrictOnDelete();

            $table->foreignUuid('supplier_invoice_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignUuid('payment_method_id')
                ->constrained()
                ->restrictOnDelete();

            $table->foreignUuid('currency_id')
                ->constrained()
                ->restrictOnDelete();

            $table->decimal('amount', 18, 2);

            $table->date('payment_date');

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
        Schema::dropIfExists('supplier_payments');
    }
};