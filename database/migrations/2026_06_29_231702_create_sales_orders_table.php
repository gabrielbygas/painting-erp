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
        Schema::create('sales_orders', function (Blueprint $table) {

            $table->uuid('id')->primary();

            $table->foreignUuid('document_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignUuid('customer_id')
                ->constrained()
                ->restrictOnDelete();

            $table->foreignUuid('currency_id')
                ->constrained()
                ->restrictOnDelete();

            $table->decimal('subtotal', 18, 2)->default(0);

            $table->decimal('discount_amount', 18, 2)->default(0);

            $table->decimal('tax_amount', 18, 2)->default(0);

            $table->decimal('total_amount', 18, 2)->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_orders');
    }
};