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
        Schema::create('company_branches', function (Blueprint $table) {

            $table->uuid('id')->primary();

            $table->foreignUuid('company_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('code', 30);

            $table->string('name');

            $table->string('email')->nullable();

            $table->string('phone', 30)->nullable();

            $table->foreignUuid('country_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->softDeletes();

            $table->unique([
                'company_id',
                'code'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_branches');
    }
};