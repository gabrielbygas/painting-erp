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
        Schema::create('document_attachments', function (Blueprint $table) {

            $table->uuid('id')->primary();

            $table->foreignUuid('document_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('original_name');

            $table->string('file_name');

            $table->string('mime_type');

            $table->unsignedBigInteger('file_size');

            $table->string('disk')->default('public');

            $table->string('path');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_attachments');
    }
};