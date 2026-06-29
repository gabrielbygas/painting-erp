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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('employee_number', 30)->nullable()->unique();

            $table->string('first_name');
            $table->string('last_name');

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();

            $table->string('phone', 30)->nullable();
            $table->string('avatar')->nullable();

            $table->foreignUuid('language_id')
                ->nullable()
                ->constrained('languages')
                ->nullOnDelete();

            $table->foreignUuid('company_branch_id')
                ->nullable()
                ->constrained('company_branches')
                ->nullOnDelete();

            $table->string('password');

            $table->timestamp('last_login_at')->nullable();

            $table->boolean('is_active')->default(true);

            $table->rememberToken();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};