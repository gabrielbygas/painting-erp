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
        /**
         * USERS TABLE (Fusion des deux migrations)
         */
        Schema::create('users', function (Blueprint $table) {
            // UUID au lieu de bigIncrements
            $table->uuid('id')->primary();

            // Champs ERP
            $table->string('employee_number', 30)->nullable()->unique();

            $table->string('first_name');
            $table->string('last_name');

            // Auth
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();

            // Infos supplémentaires
            $table->string('phone', 30)->nullable();
            $table->string('avatar')->nullable();

            // Langue (FK vers languages)
            $table->foreignUuid('language_id')
                ->nullable()
                ->constrained('languages')
                ->nullOnDelete();

            // Auth
            $table->string('password');

            // ERP
            $table->timestamp('last_login_at')->nullable();
            $table->boolean('is_active')->default(true);

            // Laravel
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        /**
         * PASSWORD RESET TOKENS
         */
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        /**
         * SESSIONS TABLE
         */
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignUuid('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};