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
    Schema::create('tag_video', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('tag_id');
      $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
      $table->unsignedBigInteger('video_id');
      $table->foreign('video_id')->references('id')->on('videos')->onDelete('cascade');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('tag_video');
  }
};
