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
        Schema::create('stock_count_items', function (Blueprint $table) {

            $table->uuid('id')->primary();

            $table->foreignUuid('stock_count_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignUuid('product_variant_id')
                ->constrained()
                ->restrictOnDelete();

            $table->decimal('system_quantity', 18, 3);

            $table->decimal('counted_quantity', 18, 3);

            $table->decimal('difference_quantity', 18, 3);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_count_items');
    }
};