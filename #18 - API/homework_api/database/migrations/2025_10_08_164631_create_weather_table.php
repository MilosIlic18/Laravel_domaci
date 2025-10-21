<?php

use App\Models\Cities;
use App\Models\Weather;
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
        Schema::create(Weather::TABLE, function (Blueprint $table) {
            $table->id();
            
            $table->foreignId(Cities::TABLE.'_id')->constrained(Cities::TABLE)->cascadeOnDelete();
            $table->integer('temperature');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Weather::TABLE);
    }
};
