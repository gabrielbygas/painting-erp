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
        Schema::create('purchase_receipts', function (Blueprint $table) {

            $table->uuid('id')->primary();

            $table->foreignUuid('document_id')->constrained()->cascadeOnDelete();

            $table->foreignUuid('purchase_order_id')->constrained()->restrictOnDelete();

            $table->foreignUuid('warehouse_id')->constrained()->restrictOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_receipts');
    }
};