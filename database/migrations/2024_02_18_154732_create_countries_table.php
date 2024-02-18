<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('countries', function(Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('code');
      $table->timestamps();
    });
    
    Schema::table('users', function(Blueprint $table) {
      $table->foreignId('country_id')->nullable()->constrained();
    });
  }
  
  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('countries');
    
    Schema::table('users', function(Blueprint $table) {
      $table->dropForeign(['country_id']);
      $table->dropColumn('country_id');
    });
  }
};
