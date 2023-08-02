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
        Schema::create('stores_affiliates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->string('affiliate_first_name')->nullable();
            $table->string('affiliate_last_name')->nullable();
            $table->string('affiliate_email')->nullable();
            $table->string('affiliate_address')->nullable();
            $table->tinyText('preferred_payment_method')->nullable();
            $table->string('sender_name');
            $table->string('phone_number')->nullable();
            $table->integer('send_orders_whatsapp')->default(0);
            $table->integer('delete_orders')->default(0);
            $table->string('logo_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores_affiliates');
    }
};
