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
        Schema::create('product_variants', function (Blueprint $table) {

            $table->uuid('id')->primary();

            $table->foreignUuid('product_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('sku', 50)->unique();

            $table->string('barcode', 100)->nullable()->unique();

            $table->string('reference')->nullable();

            $table->decimal('capacity', 18, 3)->nullable();

            $table->foreignUuid('unit_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->decimal('weight', 18, 3)->nullable();

            $table->decimal('volume', 18, 3)->nullable();

            $table->boolean('is_default')->default(false);

            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variants');
    }
};