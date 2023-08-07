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
    Schema::create('categories', function (Blueprint $table) {
      $table->id();
      $table->string('name')->nullable();
      $table->string('slug')->nullable();
      $table->string('views')->nullable()->default(0);
      $table->string('popularity')->nullable()->default(0);
      $table->string('clicked_today')->nullable()->default(0);
      $table->boolean('priority')->nullable()->default(false);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('categories');
  }
};
