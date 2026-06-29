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
        Schema::create('customer_invoice_items', function (Blueprint $table) {

            $table->uuid('id')->primary();

            $table->foreignUuid('customer_invoice_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignUuid('product_variant_id')
                ->constrained()
                ->restrictOnDelete();

            $table->decimal('quantity', 18, 3);

            $table->decimal('unit_price', 18, 2);

            $table->decimal('line_total', 18, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_invoice_items');
    }
};