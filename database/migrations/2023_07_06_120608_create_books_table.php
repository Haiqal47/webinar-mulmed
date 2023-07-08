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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->nullable(false)->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('title')->nullable(false);
            $table->text('description')->nullable(false);
            $table->integer('pages')->nullable(false);
            $table->string('year')->nullable(false);
            $table->string('publisher')->nullable(false);
            $table->string('language')->nullable(false);
            $table->integer('volume');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
