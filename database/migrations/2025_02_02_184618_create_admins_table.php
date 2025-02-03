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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');                        // Full name of the admin
            $table->string('email')->unique();             // Unique email for login and notifications
            $table->string('password');                    // Hashed password
            $table->string('phone')->nullable();           // Optional phone number
            $table->string('profile_picture')->nullable(); // Optional path/URL for profile image
            $table->string('status')->default(0);   // Account status: active, suspended, etc.
            $table->timestamp('email_verified_at')->nullable(); // Email verification timestamp
            $table->unsignedBigInteger('created_by')->nullable(); // ID of the Super Admin who created this admin
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
