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
        Schema::create('products', function (Blueprint $table) {

            $table->uuid('id')->primary();

            $table->string('sku', 50)->unique();

            $table->string('barcode', 100)->nullable()->unique();

            $table->foreignUuid('brand_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignUuid('product_type_id')
                ->constrained()
                ->restrictOnDelete();

            $table->foreignUuid('product_category_id')
                ->constrained()
                ->restrictOnDelete();

            $table->foreignUuid('unit_id')
                ->nullable()
                ->constrained('units')
                ->nullOnDelete();


            $table->foreignUuid('packaging_type_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignUuid('color_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('name_fr');

            $table->string('name_en');

            $table->text('description_fr')->nullable();

            $table->text('description_en')->nullable();

            $table->decimal('minimum_stock', 18, 3)->default(0);

            $table->decimal('maximum_stock', 18, 3)->nullable();

            $table->decimal('reorder_level', 18, 3)->default(0);

            $table->boolean('is_sellable')->default(true);

            $table->boolean('is_purchasable')->default(true);

            $table->boolean('is_manufactured')->default(false);

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
        Schema::dropIfExists('products');
    }
};