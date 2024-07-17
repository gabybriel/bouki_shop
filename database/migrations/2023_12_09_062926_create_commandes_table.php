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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->string('num_commande')->nullable();
            $table->string('adresse')->nullable();
            $table->string('ville')->nullable();
            $table->string('modepaiement')->nullable();
            $table->string('num_momo')->nullable();
            $table->decimal('total', 10, 2)->nullable();
            $table->string('statut')->nullable()->default('En attente de paiement');

            $table->foreignId('user_id')->nullable()->index();
            $table->foreignId('article_id')->nullable()->index();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
