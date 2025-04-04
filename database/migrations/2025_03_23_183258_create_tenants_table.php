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
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('address')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('password');
            $table->string('nationality')->nullable();
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('aqama_cnic_id')->unique();
            $table->date('aqama_expiry_date')->nullable();
            $table->tinyInteger('nafath_verified')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};
