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
    Schema::create('videos', function (Blueprint $table) {
      $table->id();
      $table->string('title');
      $table->string('link');
      $table->string('thumbnail');
      $table->string('slug')->nullable();
      $table->string('video_length')->nullable();
      $table->string('source')->nullable();
      $table->string('views')->nullable()->default(0);
      $table->string('clicked_today')->nullable()->default(0);
      $table->unsignedBigInteger('category_id')->nullable();
      $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
      $table->unsignedBigInteger('country_id')->nullable();
      $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
      $table->unsignedBigInteger('user_id')->nullable();
      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('videos');
  }
};
