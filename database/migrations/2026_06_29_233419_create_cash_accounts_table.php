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
        Schema::create('cash_accounts', function (Blueprint $table) {

            $table->uuid('id')->primary();

            $table->string('code', 30)->unique();

            $table->string('name');

            $table->foreignUuid('currency_id')
                ->constrained()
                ->restrictOnDelete();

            $table->decimal('opening_balance', 18, 2)->default(0);

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
        Schema::dropIfExists('cash_accounts');
    }
};