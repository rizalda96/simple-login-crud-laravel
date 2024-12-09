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
    Schema::create('menu', function (Blueprint $table) {
      $table->id();
      $table->string('menu_name')->comment('nama menu');
      $table->string('menu_url')->comment('url menu');
      $table->integer('menu_order')->comment('urutan menu');
      $table->integer('menu_parent')->nullable()->comment('parent menu');
      $table->string('menu_icon')->nullable()->comment('ikon menu');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('menu');
  }
};
