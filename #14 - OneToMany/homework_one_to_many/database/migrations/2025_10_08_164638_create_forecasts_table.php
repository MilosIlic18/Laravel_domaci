<?php

use App\Models\Cities;
use App\Models\Forecast;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(Forecast::TABLE, function (Blueprint $table) {
            $table->id();
            $table->foreignId(Cities::TABLE.'_id')->constrained(Cities::TABLE)->cascadeOnDelete();
            $table->integer('temperature');
            $table->string('weather_type')->default('sunny');
            $table->unsignedSmallInteger('probability')->nullable();
            $table->dateTime('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Forecast::TABLE);
    }
};
