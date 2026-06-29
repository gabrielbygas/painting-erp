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
        Schema::create('purchase_receipt_items', function (Blueprint $table) {

            $table->uuid('id')->primary();

            $table->foreignUuid('purchase_receipt_id')->constrained()->cascadeOnDelete();

            $table->foreignUuid('purchase_order_item_id')->constrained()->restrictOnDelete();

            $table->decimal('received_quantity', 18, 3);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_receipt_items');
    }
};