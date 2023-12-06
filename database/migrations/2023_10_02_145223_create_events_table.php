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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->dateTime('date_time');
            $table->dateTime('end_time');
            $table->string('venue');
            $table->bigInteger('category_id')->nullable();
            $table->float('price');
            $table->text('description');
            $table->bigInteger('user_id')->comment("Organizer");
            $table->unsignedInteger('seats')->comment("Seats count");
            $table->text('image');
            $table->string('status')->default('Soon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
