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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('titre')->nullable();
            $table->string('taille')->nullable();
            $table->string('numero')->nullable();
            $table->decimal('prix', 10, 2)->nullable(); // 10 chiffres au total, 2 chiffres après la virgule
            $table->integer('quantity')->nullable()->default(0);
            $table->string('statut')->nullable();
            $table->string('image')->nullable();
            $table->json('images')->nullable();
            $table->text('description')->nullable();
            $table->integer('commission')->nullable();
            $table->boolean('is_promo')->nullable()->default(false);
   
            $table->foreignId('user_id')->nullable()->index();
            $table->foreignId('categorie_id')->nullable()->index();
            $table->foreignId('subcategorie_id')->nullable()->index();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
