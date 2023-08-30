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
        Schema::create('images_product', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('products_user_id');
            $table->foreign('products_user_id')->references('id')->on('products_user')->onDelete('cascade');
            
            $table->string('url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images_product');
    }
};
