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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author')->default('Umair Tufail');
            $table->text('excerpt');
            $table->longText('content');
            $table->string('category')->default('Git & GitHub');
            $table->string('tags')->nullable();
            $table->integer('likes_count')->default(0);
            $table->string('difficulty_level')->default('Beginner'); // Beginner, Intermediate, Advanced
            $table->integer('read_time')->default(5); // in minutes
            $table->string('featured_image')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_published')->default(true);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
