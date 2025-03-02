<?php

use App\Models\Apartment;
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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('building_id')->constrained('buildings')->cascadeOnDelete();
            $table->foreignId('tenant_id')->nullable();
            // $table->foreignId('tenant_id')->nullable()->constrained('tenants')->nullOnDelete();
            $table->string('name');
            $table->integer('floor_number');
            $table->integer('number_of_rooms');
            $table->integer('number_of_bathrooms');
            $table->integer('size_sqft');
            $table->decimal('rent_price', 10, 2);
            $table->decimal('yearly_discount', 10, 2)->nullable();
            $table->tinyInteger('status')->default(Apartment::STATUS_VACANT); // 0 = Vacant, 1 = Rented
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartments');
    }
};
