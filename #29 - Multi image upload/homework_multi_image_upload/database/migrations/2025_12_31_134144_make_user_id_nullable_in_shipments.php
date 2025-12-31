<?php

use App\Models\User;
use App\Models\Shipment;
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
        Schema::table(Shipment::TABLE, function (Blueprint $table) {
            //
            $table->foreignId(User::TABLE.'_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table(Shipment::TABLE, function (Blueprint $table) {
            //
        });
    }
};
