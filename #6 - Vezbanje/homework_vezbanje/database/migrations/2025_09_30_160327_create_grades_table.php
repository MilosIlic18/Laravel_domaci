<?php

use App\Models\User;
use App\Models\Grade;
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
        Schema::create(Grade::TABLE, function (Blueprint $table) {
            $table->id();
            $table->string('subject',64);
            $table->unsignedInteger('grade');
            $table->string('profesor',64);
            $table->foreignId(User::TABLE.'_id')->constrained(User::TABLE)->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Grade::TABLE);
    }
};
