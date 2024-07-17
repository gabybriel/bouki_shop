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
            $table->string('name');
            $table->string('prenoms');
            $table->string('phone')->unique();
            $table->string('email')->unique()->nullable();

            $table->string('shopname')->nullable();
            $table->string('shopadresse')->nullable();
            $table->string('payment_mode')->nullable();
            $table->string('mobile_details')->nullable();
            $table->string('bank_details')->nullable();

            $table->boolean('is_admin')->default(false);
            $table->boolean('is_vendor')->default(false);
            $table->boolean('is_danied')->default(false);
            $table->boolean('is_visitor')->default(true);

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
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
