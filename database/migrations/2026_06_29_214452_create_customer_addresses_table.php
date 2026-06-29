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
        Schema::create('customer_addresses', function (Blueprint $table) {

            $table->uuid('id')->primary();

            $table->foreignUuid('customer_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignUuid('address_type_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('address_line_1');

            $table->string('address_line_2')->nullable();

            $table->string('city')->nullable();

            $table->string('state')->nullable();

            $table->string('postal_code')->nullable();

            $table->foreignUuid('country_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->boolean('is_default')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_addresses');
    }
};