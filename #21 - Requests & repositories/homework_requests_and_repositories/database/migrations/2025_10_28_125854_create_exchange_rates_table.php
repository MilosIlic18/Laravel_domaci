<?php

use App\Models\ExchangeRate;
use App\Models\ExchangeRates;
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
        Schema::create(ExchangeRate::TABLE, function (Blueprint $table) {
            $table->id();
            $table->string("currency",10);
            $table->decimal("value");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(ExchangeRate::TABLE);
    }
};
