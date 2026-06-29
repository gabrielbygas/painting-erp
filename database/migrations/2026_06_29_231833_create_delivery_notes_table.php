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
        Schema::create('delivery_notes', function (Blueprint $table) {

            $table->uuid('id')->primary();

            $table->foreignUuid('document_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignUuid('sales_order_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignUuid('warehouse_id')
                ->constrained()
                ->restrictOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_notes');
    }
};