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
        Schema::create('document_sequences', function (Blueprint $table) {

            $table->uuid('id')->primary();

            $table->foreignUuid('document_type_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('prefix', 20)->nullable();

            $table->integer('next_number')->default(1);

            $table->integer('padding')->default(6);

            $table->string('suffix', 20)->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_sequences');
    }
};