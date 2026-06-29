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
        Schema::create('sales_order_items', function (Blueprint $table) {

            $table->uuid('id')->primary();

            $table->foreignUuid('sales_order_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignUuid('product_variant_id')
                ->constrained()
                ->restrictOnDelete();

            $table->foreignUuid('quotation_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->decimal('quantity', 18, 3);

            $table->decimal('unit_price', 18, 2);

            $table->decimal('discount_amount', 18, 2)->default(0);

            $table->decimal('line_total', 18, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_order_items');
    }
};