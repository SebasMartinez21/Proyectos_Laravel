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
        Schema::create('author_books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_book');
            $table->foreign('id_book')->references('id')->on('books');
            $table->unsignedBigInteger('id_author');
            $table->foreign('id_author')->references('id')->on('authors');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('author_books');
    }
};
