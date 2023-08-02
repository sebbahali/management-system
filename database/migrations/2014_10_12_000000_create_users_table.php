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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            // $table->string('email')->unique();
            //   $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('last_login_ip')->nullable();
            $table->tinyInteger('perm')->default(4);
            $table->string('tfa_secret')->nullable();
            $table->tinyInteger('zombie')->default(0);
            $table->rememberToken();

            $table->string('session')->default(time());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
