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
    Schema::create('properties', function (Blueprint $table) {
        $table->id();
        
        $table->string('title');
        $table->string('slug')->unique();
        $table->text('description')->nullable();
        $table->decimal('price', 12, 2);
        $table->string('location');
        $table->string('listing_type'); 
        $table->integer('bedrooms');
        $table->integer('bathrooms');
        $table->integer('surface');
        
        $table->string('status')->default('approved');
        $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
        $table->timestamps();
    });
}


    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
