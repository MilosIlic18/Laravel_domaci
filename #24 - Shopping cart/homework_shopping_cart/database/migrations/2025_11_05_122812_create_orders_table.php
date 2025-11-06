<?php

use App\Models\User;
use App\Models\Order;
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
        Schema::create(Order::TABLE, function (Blueprint $table) {
            $table->id();
            $table->foreignId(User::TABLE."_id")->constrained(User::TABLE)->cascadeOnDelete();
            $table->string("status")->default("naruceno");
            $table->decimal("price");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Order::TABLE);
    }
};
