<?php

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
        Schema::create('eatings', function (Blueprint $table) {
            $table->id();
            $table->foreignId("event_id")->constrained();
            $table->double("calories_morning");
            $table->double("calories_evening");
            $table->double("calories_noon");
            $table->string("medicine", 25)->nullable();
            $table->integer("amount_of_liquid");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eatings');
    }
};
