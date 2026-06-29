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
        Schema::create('customer_contacts', function (Blueprint $table) {

            $table->uuid('id')->primary();

            $table->foreignUuid('customer_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('first_name');

            $table->string('last_name');

            $table->foreignUuid('job_title_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('email')->nullable();

            $table->string('phone', 30)->nullable();

            $table->string('mobile', 30)->nullable();

            $table->boolean('is_primary')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_contacts');
    }
};