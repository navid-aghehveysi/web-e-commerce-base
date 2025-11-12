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
            $table->id();
            $table->string('user_name')->nullable();
            $table->string('email')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('main_cellphone')->nullable()->unique();
            $table->timestamp('main_cellphone_verified_at')->nullable();
            $table->string('alternate_cellphone')->nullable()->unique();
            $table->text('otp',6)->nullable();
            $table->timestamp('opt_expires_at')->nullable();
            $table->string('otp_token')->nullable();
            $table->string('login_ip')->nullable();
            $table->timestamp('last_login_at')->nullable();
            $table->string('registered_ip')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
