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
        Schema::create('news_blog_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tag_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('news_blog_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_blog_tags');
    }
};
