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
        Schema::create('documents', function (Blueprint $table) {

            $table->uuid('id')->primary();

            $table->foreignUuid('document_type_id')
                ->constrained()
                ->restrictOnDelete();

            $table->foreignUuid('document_status_id')
                ->constrained()
                ->restrictOnDelete();

            $table->string('document_number')->unique();

            $table->date('document_date');

            $table->date('posting_date')->nullable();

            $table->text('remarks')->nullable();

            $table->uuidMorphs('documentable');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};