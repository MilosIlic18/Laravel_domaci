<?php

use App\Models\User;
use App\Models\Cities;
use App\Models\UserCities;
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
        Schema::create(UserCities::TABLE, function (Blueprint $table) {
            $table->id();
            $table->foreignId(Cities::TABLE.'_id')->constrained(Cities::TABLE)->cascadeOnDelete();
            $table->foreignId(User::TABLE.'_id')->constrained(User::TABLE)->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(UserCities::TABLE);
    }
};
