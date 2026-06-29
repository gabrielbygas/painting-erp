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
        Schema::create('supplier_bank_accounts', function (Blueprint $table) {

            $table->uuid('id')->primary();

            $table->foreignUuid('supplier_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignUuid('financial_institution_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('account_name');

            $table->string('account_number');

            $table->string('iban')->nullable();

            $table->string('swift_code')->nullable();

            $table->string('mobile_money_number')->nullable();

            $table->boolean('is_default')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplier_bank_accounts');
    }
};