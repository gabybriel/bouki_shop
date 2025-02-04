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

        Schema::create('product_variant', function (Blueprint $table) {
            $table->id();
            $table->string('size');
            $table->string('color');
            $table->integer('qunatity')->default(0);
            $table->unsignedBigInteger('article_id');
            $table->timestamps();

            // Clés étrangères et index
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
