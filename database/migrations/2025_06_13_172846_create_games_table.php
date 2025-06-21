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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');           // New: from form
            $table->string('image');               // New: detail image URL
            $table->string('poster');              // New: poster image URL
            $table->float('price')->default(0);    // New: game price
            $table->string('genre');               // Comma-separated genres
            $table->string('class');               // Comma-separated features
            $table->string('website')->nullable(); // Game website

            $table->foreignId('developer_id')->constrained()->onDelete('cascade');
            $table->foreignId('publisher_id')->constrained()->onDelete('cascade');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
