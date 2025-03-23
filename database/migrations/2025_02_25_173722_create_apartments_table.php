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
            $table->unsignedBigInteger('building_id'); // Relationship to Buildings
            $table->integer('floor_number'); // Helps in categorizing per floor
            $table->string('apartment_number'); // Unique per floor
            $table->integer('rooms')->nullable(); // Can be different per apartment
            $table->integer('bathrooms')->nullable();
            $table->decimal('rent', 10, 2); // Monthly Rent
            $table->integer('size_sqft');
            $table->decimal('yearly_discount', 10, 2)->nullable();
            $table->tinyInteger('is_available')->default(Apartment::STATUS_VACANT)->comment('1: Vacant, 0: Rented'); // 0 = Vacant, 1 = Rented
            $table->tinyInteger('status')->default(Apartment::STATUS_ACTIVE)->comment('0: inactive, 1: active'); // 0 = Inactive, 1 = Active
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('building_id')->references('id')->on('buildings')->onDelete('cascade');

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
