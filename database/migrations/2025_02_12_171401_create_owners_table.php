<?php

use App\Models\Owner;
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
        Schema::create('owners', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->unique()->nullable();
            $table->string('password');
            $table->string('profile_picture')->nullable();
            $table->string('address')->nullable();
            $table->timestamp('aqama_expiry_date')->nullable();
            $table->string('aqama_cnic_id')->unique();
            $table->enum('status', Owner::STATUS_VALUES)->default(Owner::STATUS_PENDING);
            $table->boolean('nafath_verified')->default(false);
            $table->timestamps();
            $table->softDeletes(); // For soft delete support
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('owners');
    }
};
