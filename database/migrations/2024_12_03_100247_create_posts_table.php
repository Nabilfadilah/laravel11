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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('author_id')->constrained( // pakai constrain
                table: 'users',
                indexName: 'posts_author_id'
            );
            // relasi anatar tabel
            $table->foreignId('category_id')->constrained( // pakai constrain
                table: 'categories',
                indexName: 'posts_category_id'
            );
            // $table->unsignedBigInteger('author_id');
            // $table->foreign('author_id')->references('id')->on('users'); // metode foreignId untuk membuat kolom Anda,
            $table->string('slug')->unique();
            $table->text('body');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
