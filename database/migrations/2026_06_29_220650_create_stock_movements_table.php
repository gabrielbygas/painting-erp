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
        Schema::create('stock_movements', function (Blueprint $table) {

            $table->uuid('id')->primary();

            $table->foreignUuid('stock_movement_type_id')
                ->constrained()
                ->restrictOnDelete();

            $table->foreignUuid('warehouse_id')
                ->constrained()
                ->restrictOnDelete();

            $table->foreignUuid('product_variant_id')
                ->constrained()
                ->restrictOnDelete();

            $table->uuidMorphs('movementable');

            $table->decimal('quantity', 18, 3);

            $table->decimal('stock_before', 18, 3);

            $table->decimal('stock_after', 18, 3);

            $table->decimal('unit_cost', 18, 2)->nullable();

            $table->decimal('total_cost', 18, 2)->nullable();

            $table->text('remarks')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_movements');
    }
};