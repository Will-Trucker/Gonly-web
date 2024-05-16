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
        Schema::table('products',function (Blueprint $table){
            $table->dropColumn('compare_price');
            $table->dropColumn('is_featured');
            $table->dropColumn('sku');
            $table->dropColumn('barcode');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
