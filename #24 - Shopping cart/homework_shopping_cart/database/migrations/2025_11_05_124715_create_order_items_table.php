<?php

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
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
        Schema::create(OrderItem::TABLE, function (Blueprint $table) {
            $table->id();
            $table->foreignId(Order::TABLE."_id")->constrained(Order::TABLE)->cascadeOnDelete();
            $table->foreignId(Product::TABLE."_id")->constrained(Product::TABLE)->cascadeOnDelete();
            $table->integer('amount');
            $table->decimal('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(OrderItem::TABLE);
    }
};
