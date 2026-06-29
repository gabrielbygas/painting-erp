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
        Schema::create('sales_return_items', function (Blueprint $table) {

            $table->uuid('id')->primary();

            $table->foreignUuid('sales_return_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignUuid('product_variant_id')
                ->constrained()
                ->restrictOnDelete();

            $table->decimal('quantity', 18, 3);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_return_items');
    }
};