<?php

use App\Models\Shipment;
use App\Models\ShipmentDocument;
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
        Schema::create(ShipmentDocument::TABLE, function (Blueprint $table) {
            $table->id();
            $table->string('document_title',128);
            $table->foreignId(Shipment::TABLE."_id")->constrained(Shipment::TABLE)->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(ShipmentDocument::TABLE);
    }
};
