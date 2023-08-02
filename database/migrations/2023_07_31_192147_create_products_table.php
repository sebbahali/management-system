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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('affilate_commision');
            $table->integer('min_Quantity');
            $table->integer('min_price');
            $table->integer('max_price');
            $table->integer('average_price');
            $table->integer('product_id');
            $table->string('image_path');
            $table->text('description');
            $table->text('description_ad');
            $table->text('product_name');

            $table->string('filenames');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
